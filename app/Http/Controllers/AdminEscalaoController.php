<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escalao;
use DB;
use Validator;
use App\Exports\escaloesExport;
use PDF; // ou use Barryvdh\DomPDF\Facade\Pdf;
use Excel; // ou use Maatwebsite\Excel\Facades\Excel;

class AdminEscalaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $verification = $request->get('query');

        if($verification != null){
            $escaloes = Escalao::where('nome_escalao', 'like', '%'.$verification.'%')->paginate(5);
            return view('admin.escalao.index', compact('escaloes', 'verification'));
        }if($verification == null){
            $verification = '';
            $escaloes = Escalao::paginate(4);
            return view('admin.escalao.index', ['escaloes' => $escaloes, 'verification' => $verification]);
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
        return view('admin.escalao.create');
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
        //dd($request->get('nome_escalao'));
        $regras = [
            'nome_escalao' => 'required|min:3|max:40'
        ];

        $error = Validator::make($request->all(), $regras);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        //dd($request->all());
            if(Escalao::create($request->all())){
                return redirect()->route('escalao.index')->with('success', 'Escalão adicionado com sucesso!');
            }else{
                return redirect()->back()->with('error', 'Erro ao adicionar escalão!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  Escalao $escalao
     * @return \Illuminate\Http\Response
     */
    public function show(Escalao $escalao)
    {
        //
        return view('admin.escalao.show', ['escalao' => $escalao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Escalao $escalao
     * @return \Illuminate\Http\Response
     */
    public function edit( Escalao $escalao)
    {
        //
        return view('admin.escalao.edit', ['escalao' => $escalao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Escalao $escalao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escalao $escalao)
    {
        //
        //dd($request->all());
        if($escalao->update($request->all())){
            return redirect()->route('escalao.show', ['escalao' => $escalao->id_escalao])->with('success', 'Escalão atualizado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Falha ao atualizar o escalão!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Escalao $escalao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escalao $escalao)
    {
        //
        if($escalao->delete()){
            return redirect()->route('escalao.index')->with('success', 'Escalao removido com sucesso');
        }else{
            return redirect()->back()->with('error', 'Erro ao remover escalao');
        }

    }

    public function exportacao($extensao){
        //return 'teste';
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new escaloesExport, 'lista_escaloes.'.$extensao);
        }
    }
    public function exportar(){
        //return 'teste';
        $escaloes = Escalao::all();
        $pdf = PDF::loadView('admin.escalao.pdf',['escaloes' => $escaloes]);
        return $pdf->download('lista_escalao.pdf');
    }
}
