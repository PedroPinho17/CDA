<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use Illuminate\Http\Request;
use Validator;
use App\Exports\membroExport;
use PDF; // ou use Barryvdh\DomPDF\Facade\Pdf;
use Excel; // ou use Maatwebsite\Excel\Facades\Excel;

class AdminMembrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $verification = $request->get('query');

        if($verification != null){
            $membros = Membro::where('id', '=', $verification)->orWhere('nome', 'like', '%'.$verification.'%')->paginate(10);
            return view('admin.membro.index', compact('membros', 'verification'));
        }if($verification == null){
            $verification = '';
            $membros = Membro::paginate(10);
            return view('admin.membro.index', ['membros' => $membros, 'verification' => $verification]);
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
        return view('admin.membro.create');
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
        $rules = array(
            'nome'  =>  'required|min:3|max:40',
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        if(Membro::create($request->all())){
            return redirect()->route('membro.index')->with('success', 'Cargo adicionado com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao adicionar cargo!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  Membro  $membro
     * @return \Illuminate\Http\Response
     */
    public function show(Membro  $membro)
    {
        //
        return view('admin.membro.show', ['membro' => $membro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Membro  $membro
     * @return \Illuminate\Http\Response
     */
    public function edit(Membro  $membro)
    {
        //
        return view('admin.membro.edit', ['membro' => $membro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Membro  $membro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membro  $membro)
    {
        //
        if($membro->update($request->all())){
            return redirect()->route('membro.show', ['membro' => $membro->id])->with('success', 'Cargo atualizado com sucesso.');
        }else{
            return back()->withInput()->with('error', 'Falha ao atualizar cargo!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Membro  $membro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membro  $membro)
    {
        //
        if($membro->delete()){
            return redirect()->route('membro.index')->with('success', 'Cargo eliminado com sucesso.');
        }else{
            return back()->withInput()->with('error', 'Falha ao eliminar cargo!');
        }

    }
    public function exportacao($extensao){
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new membroExport, 'lista_cargos.'.$extensao);
        }
    }
    public function exportar(){
        $membros = Membro::all();
        $pdf = PDF::loadView('admin.membro.pdf',['membros' => $membros]);
        return $pdf->download('lista_cargos.pdf');
    }

}
