<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Equipa;
use Validator;
use App\Exports\afaExport;
use Excel;
use PDF;

class AdminAfaController extends Controller
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
            $afas = Link::where('equipa_id', '=', $verification)->paginate(5);
            return view('admin.afa.index', ['afas' => $afas, 'verification' => $verification]);
        }
        if($verification == null){
            $verification = '';
            $afas = Link::with('equipa')->paginate(5);
            return view('admin.afa.index', ['afas' => $afas, 'verification' => $verification]);
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
        $equipas = Equipa::all();
        return view('admin.afa.create', ['equipas' => $equipas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'link' => 'required',
            'equipa_id' => 'required'
        ];

        $error = Validator::make($request->all(), $regras);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        if(Link::create($request->all())){
            return redirect()->route('afa.index')->with('success', 'Link adicionado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Erro ao adicionar link!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Link  $afa
     * @return \Illuminate\Http\Response
     */
    public function show(Link  $afa)
    {
        //
        return view('admin.afa.show', ['afa' => $afa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Link  $afa
     * @return \Illuminate\Http\Response
     */
    public function edit(Link  $afa)
    {
        //
        $equipas = Equipa::all();
        return view('admin.afa.edit', ['afa' => $afa, 'equipas' => $equipas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Link  $afa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link  $afa)
    {
        //
        if($afa->update($request->all())){
            return redirect()->route('afa.show', ['afa' => $afa->id])->with('success', 'Link atualizado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao atualizar o link!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Link  $afa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link  $afa)
    {
        //
        if($afa->delete()){
            return redirect()->route('afa.index')->with('success', 'Link removido com sucesso');
        }else{
            return redirect()->back()->with('error', 'Erro ao remover Link');
        }
    }
    public function exportacao($extensao){
        //return 'teste';
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new afaExport, 'lista_links.'.$extensao);
        }
    }
    public function exportar(){
        //return 'teste';
        $afas = Link::all();
        $pdf = PDF::loadView('admin.afa.pdf',['afas' => $afas]);
        return $pdf->download('lista_links.pdf');
    }
}
