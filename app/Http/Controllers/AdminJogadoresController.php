<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogadores;
use App\Models\Escalao;
use App\Models\Equipa;
use App\Exports\jogadoresExport;
use PDF; // ou use Barryvdh\DomPDF\Facade\Pdf;
use Excel; // ou use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use Alert;

class AdminJogadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $verification = $request->get('query');

        if ($verification != null) {
            $jogadores = Jogadores::where('nome', 'like', '%' . $verification . '%')->orWhere('numero_camisola', 'like', '%' . $verification . '%')->orWhere('posicao', 'like', '%' . $verification . '%')->orWhere('id_escalao', '=', $verification)->orWhere('id_equipa', '=', $verification)->paginate(5);
            return view('admin.jogadores.index', ['jogadores' => $jogadores, 'verification' => $verification]);
        }
        if ($verification == null) {
            $verification = '';
            $jogadores = Jogadores::with(['escalao', 'equipa'])->paginate(5);
            return view('admin.jogadores.index', ['jogadores' => $jogadores, 'verification' => $verification]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $escaloes = Escalao::all();
        $equipas = Equipa::all();
        return view('admin.jogadores.create', ['escaloes' => $escaloes, 'equipas' => $equipas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = array(
            'nome'  =>  'required|min:3',
            'peso' => 'required',
            'altura' => 'required',
            'numero_camisola' => 'required',
            'posicao' => 'required',
            'foto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_escalao' => 'required',
            'id_equipa' => 'required'
        );
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        if ($request->hasFile('foto')) {
            //Get filename with the extension
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('foto')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload image
            if ($request->get('id_escalao') == 8 && $request->get('id_equipa') == 1) {
                $path = $request->file('foto')->storeAs('public/jogadores/seniores', $fileNameToStore);
            } else if ($request->get('id_escalao') == 7 && $request->get('id_equipa') == 2) {
                $path = $request->file('foto')->storeAs('public/jogadores/juniores', $fileNameToStore);
            }
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $form_data = array(
            'nome' => $request->get('nome'),
            'peso' => $request->get('peso'),
            'altura' => $request->get('altura'),
            'numero_camisola' => $request->get('numero_camisola'),
            'posicao' => $request->get('posicao'),
            'foto' => $fileNameToStore,
            'id_escalao' => $request->get('id_escalao'),
            'id_equipa' => $request->get('id_equipa')
        );
        //dd($form_data);
        if (Jogadores::create($form_data)) {
            return redirect()->route('jogadores.index')->with('success', 'Jogador adicionado com sucesso!');
        } else {
            return response()->json(['error' => 'Erro ao adicionar jogador!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Jogadores $jogadore
     * @return \Illuminate\Http\Response
     */
    public function show(Jogadores $jogadore)
    {
        //
        return view('admin.jogadores.show', ['jogadore' => $jogadore]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Jogadores $jogadore
     * @return \Illuminate\Http\Response
     */
    public function edit(Jogadores $jogadore)
    {
        //

        $escaloes = Escalao::all();
        $equipas = Equipa::all();
        return view('admin.jogadores.edit', ['jogadore' => $jogadore, 'escaloes' => $escaloes, 'equipas' => $equipas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Jogadores $jogadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jogadores $jogadore)
    {
        //dd($request->all());

        $query = 'SELECT * FROM jogadores WHERE id_jogador = ' . $request->id_jogador_;
        $auxfoto = DB::select($query);


        if ($request->hasFile('foto')) {
            //Get filename with the extension
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('foto')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload image
            if ($request->get('id_escalao') == 8 && $request->get('id_equipa') == 1) {
                $path = $request->file('foto')->storeAs('public/jogadores/seniores', $fileNameToStore);
            } else if ($request->get('id_escalao') == 7 && $request->get('id_equipa') == 2) {
                $path = $request->file('foto')->storeAs('public/jogadores/juniores', $fileNameToStore);
            }
        }
        if ($request->hasFile('foto')) {
            if (($request->get('id_escalao') == 8) && ($request->get('id_equipa') == 1) && ($auxfoto[0]->foto != 'noimage.png')) {
                Storage::delete('public/jogadores/seniores/' . $auxfoto[0]->foto);
            }

            if (($request->get('id_escalao') == 7) && ($request->get('id_equipa') == 2) && ($auxfoto[0]->foto != 'noimage.png')) {
                Storage::delete('public/jogadores/juniores/' . $auxfoto[0]->foto);
            }
            $jogadore->foto = $fileNameToStore;
        }
        $form_data = array(
            'id_jogador' => $request->get('id_jogador_'),
            'nome' => $request->get('nome'),
            'peso' => $request->get('peso'),
            'altura' => $request->get('altura'),
            'numero_camisola' => $request->get('numero_camisola'),
            'posicao' => $request->get('posicao'),
            'foto' => $fileNameToStore,
            'id_escalao' => $request->get('id_escalao'),
            'id_equipa' => $request->get('id_equipa')
        );
        //dd($form_data);

        if ($jogadore->update($form_data)) {
            return redirect()->route('jogadores.show', ['jogadore' => $jogadore->id_jogador])->with('success', 'Jogador atualizada com sucesso!');
        } else {
            return response()->json(['error' => 'Erro ao atualizar o jogador!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Jogadores $jogadore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jogadores $jogadore)
    {
        //
        //dd($jogadore->foto);
        if ($jogadore->foto != 'noimage.jpg') {
            //Delete Image
            if ($jogadore->id_escalao == 8 && $jogadore->id_equipa == 1) {
                Storage::delete('public/jogadores/seniores/' . $jogadore->foto);
            } else if ($jogadore->id_escalao == 7 && $jogadore->id_equipa == 2) {
                Storage::delete('public/jogadores/juniores/' . $jogadore->foto);
            }
        }
        if ($jogadore->delete()) {
            return redirect()->route('jogadores.index')->with('success', 'Jogador removido com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao eliminar jogador!');
        }
    }
    public function exportacao($extensao)
    {
        //return 'teste';
        if (in_array($extensao, ['xlsx', 'pdf'])) {
            return Excel::download(new jogadoresExport, 'lista_jogadores.' . $extensao);
        }
    }
    public function exportar()
    {
        //return 'teste';
        $jogadores = Jogadores::all();
        $pdf = PDF::loadView('admin.jogadores.pdf', ['jogadores' => $jogadores]);
        return $pdf->download('lista_jogadores.pdf');
    }
}
