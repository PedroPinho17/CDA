<?php

namespace App\Http\Controllers;

use App\Models\Detalhe_Membro;
use App\Models\Membro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use App\Exports\detalheMembroExport;
use PDF; // ou use Barryvdh\DomPDF\Facade\Pdf;
use Excel; // ou use Maatwebsite\Excel\Facades\Excel;

class AdminDetalhesMembrosController extends Controller
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
            $detalhes = Detalhe_Membro::where('id', '=', $verification)->orWhere('nome', 'like', '%'.$verification.'%')->paginate(10);
            return view('admin.detalhes_membros.index', compact('detalhes', 'verification'));
        }if($verification == null){
            $verification = '';
            $detalhes_membros = Detalhe_Membro::with('membro')->paginate(10);
            return view('admin.detalhes_membros.index', ['detalhes_membros' => $detalhes_membros, 'verification' => $verification]);
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
        $membros = Membro::all();
        return view('admin.detalhes_membros.create', ['membros' => $membros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->get('membro_id'));
        //
        $rules = array(
            'nome_membro'  =>  'required|min:3|max:40',
            'cargo' => 'required',
            'foto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'membro_id' => 'required'
        );
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
            //Upload image
            $path = $request->file('foto')->storeAs('public/Membros', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }

            $form_data = array(
                'nome_membro' => $request->get('nome_membro'),
                'cargo' => $request->get('cargo'),
                'foto' => $fileNameToStore,
                'membro_id' => $request->get('membro_id')
            );

            if(Detalhe_Membro::create($form_data)){
                return redirect()->route('detalhe-membro.index')->with('success', 'Membro adicionado com sucesso!');
            }else{
                return back()->withInput()->with('error', 'Falha ao adicionar membro!');
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  Detalhe_Membro  $detalhe_membro
     * @return \Illuminate\Http\Response
     */
    public function show(Detalhe_Membro  $detalhe_membro)
    {
        //
        return view('admin.detalhes_membros.show', ['detalhe_membro' => $detalhe_membro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Detalhe_Membro  $detalhe_membro
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalhe_Membro  $detalhe_membro)
    {
        //
        $membros = Membro::all();
        return view('admin.detalhes_membros.edit', ['detalhe_membro' => $detalhe_membro, 'membros' => $membros]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Detalhe_Membro  $detalhe_membro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detalhe_Membro  $detalhe_membro)
    {
        //
        $query = 'SELECT * FROM `detalhes_membros` WHERE id_detalhe_membro = '.$request->id_detalhe_membro;
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
            $path = $request->file('foto')->storeAs('public/Membros', $fileNameToStore);
        }

        if($request->hasFile('foto')){
            if($auxfoto[0]->foto != 'noimage.png'){
                Storage::delete('public/Membros/'.$auxfoto[0]->foto);
            }
            $detalhe_membro->foto = $fileNameToStore;
        }

        $form_data = array(
            'nome_membro' => $request->get('nome_membro'),
            'cargo' => $request->get('cargo'),
            'foto' => $fileNameToStore,
            'membro_id' => $request->get('membro_id')
        );

        if($detalhe_membro->update($form_data)){
            return redirect()->route('detalhe-membro.show', ['detalhe_membro' => $detalhe_membro->id_detalhe_membro])->with('success', 'Membro atualizado com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao atualizar membro!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Detalhe_Membro  $detalhe_membro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detalhe_Membro  $detalhe_membro)
    {
        //
        if($detalhe_membro->foto != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/Membros/'.$detalhe_membro->foto);
        }
        if($detalhe_membro->delete()){
            return redirect()->route('detalhe-membro.index')->with('success', 'Membro eliminado com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao eliminar membro!');
        }

    }
    public function exportacao($extensao){
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new detalheMembroExport, 'lista_membros.'.$extensao);
        }
    }
    public function exportar(){
        $detalhes_membros = Detalhe_Membro::all();
        $pdf = PDF::loadView('admin.detalhes_membros.pdf',['detalhes_membros' => $detalhes_membros]);
        return $pdf->download('lista_membros.pdf');
    }
}
