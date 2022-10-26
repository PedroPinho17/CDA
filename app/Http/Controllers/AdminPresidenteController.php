<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presidente;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use App\Exports\presidenteExport;
use PDF; // ou use Barryvdh\DomPDF\Facade\Pdf;
use Excel; // ou use Maatwebsite\Excel\Facades\Excel;

class AdminPresidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $verification = $request->get('query');

        if($verification != null){
            $presidentes = Presidente::where('nome', 'like', '%'.$verification.'%')->orWhere('ano_inicio', 'like', '%'.$verification.'%')->orWhere('ano_final','like', '%'.$verification.'%')->paginate(10);
            return view('admin.presidente.index', ['presidentes' => $presidentes, 'verification' => $verification]);
        }
        if($verification == null){
            $verification = '';
            $presidentes = Presidente::paginate(10);
            return view('admin.presidente.index', ['presidentes' => $presidentes, 'verification' => $verification]);
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
        return view('admin.presidente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        //
        //realizar a validação dos dados do formulário recebidos no request
        $rules =[
            'nome' => 'required|min:3|max:40',
            'ano_inicio' => 'required',
            'ano_final' => 'required',
            'foto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ];

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

        if($request->hasFile('foto')){
            //Get filename with the extension
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('foto')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('foto')->storeAs('public/foto_presidente', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

            $form_data = array(
                'nome' => $request->get('nome'),
                'ano_inicio' => $request->get('ano_inicio'),
                'ano_final' => $request->get('ano_final'),
                'foto' => $fileNameToStore
            );

            if(Presidente::create($form_data)){
                return redirect()->route('presidente.index')->with('success', 'Presidente adicionado com sucesso!');
            }else{
                return back()->with('error', 'Erro ao adicionar Presidente!');
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Presidente  $presidente
     * @return \Illuminate\Http\Response
     */
    public function show(Presidente $presidente)
    {
        //
        return view('admin.presidente.show', ['presidente' => $presidente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Presidente  $presidente
     * @return \Illuminate\Http\Response
     */
    public function edit(Presidente $presidente)
    {
        //
        return view('admin.presidente.edit', ['presidente' => $presidente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Presidente  $presidente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presidente $presidente)
    {
        //
        $query = 'SELECT * FROM presidente WHERE id='.$request->id;
        $auxfoto = DB::select($query);

        if($request->hasFile('foto')){
            //Get filename with the extension
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('foto')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('foto')->storeAs('public/foto_presidente', $fileNameToStore);
        }

        if($request->hasFile('foto')){
            if($auxfoto[0]->foto != 'noimage.png'){
                Storage::delete('public/foto_presidente/'.$auxfoto[0]->foto);
            }
            $presidente->foto = $fileNameToStore;
        }

        $form_data = array(
            'nome' => $request->get('nome'),
            'ano_inicio' => $request->get('ano_inicio'),
            'ano_final' => $request->get('ano_final'),
            'foto' => $fileNameToStore
        );
        if($presidente->update($form_data)){
            return redirect()->route('presidente.show', ['presidente' => $presidente->id])->with('success', 'Presidente atualizado com sucesso!');
        }else{
            return back()->with('error', 'Erro ao atualizar presidente!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Presidente  $presidente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presidente $presidente)
    {
        //
        if($presidente->foto != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/foto_presidente/'.$presidente->foto);
        }
        if($presidente->delete()){
            return redirect()->route('presidente.index')->with('success', 'Presidente eliminado com sucesso!');
        }else{
            return back()->with('error', 'Erro ao eliminar presidente!');
        }
    }
    public function exportacao($extensao){
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new presidenteExport, 'lista_presidentes.'.$extensao);
        }
    }
    public function exportar(){
        $presidentes = Presidente::all();
        $pdf = PDF::loadView('admin.presidente.pdf',['presidentes' => $presidentes]);
        return $pdf->download('lista_presidentes.pdf');
    }
}
