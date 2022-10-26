<?php

namespace App\Http\Controllers;

use App\Models\Jogos;
use App\Models\Equipa;
use Validator;
use Illuminate\Http\Request;
use App\Exports\jogosExport;
use Excel;
use PDF;

class AdminJogosController extends Controller
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
            $jogos = Jogos::where('equipa_visitante', 'like', '%'.$verification.'%')->orWhere('data','like','%'.$verification.'%')->orWhere('equipa_id', '=', $verification)->paginate(5);
            return view('admin.jogos.index', ['jogos' => $jogos], ['verification' => $verification]);
        }
        if($verification == null){
            $verification = '';
            $jogos = Jogos::paginate(3);
            return view('admin.jogos.index', ['jogos' => $jogos], ['verification' => $verification]);
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
        date_default_timezone_set('Europe/Lisbon');
        $data = date('d-m-Y H:i:s');
        $equipas = Equipa::all();
        return view('admin.jogos.create', ['equipas' => $equipas , 'data' => $data]);
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
            'equipa_visitante'  =>  'required|min:3|max:40',
            'resultado'  =>  'required',
            'data'  =>  'required',
            'link'  =>  'required',
            'equipa_id'  =>  'required',
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $date = date('Y-m-d H:i:s', strtotime($request->get('data')));
        $form_data = array(
            'equipa_visitante' => $request->get('equipa_visitante'),
            'resultado' => $request->get('resultado'),
            'data' => $date,
            'link' => $request->get('link'),
            'equipa_id' => $request->get('equipa_id')
        );
        //dd($form_data);
        if(Jogos::create($form_data)){
            return redirect()->route('jogos.index')->with('success', 'Jogo adicionado com sucesso!');
        }else{
            return back()->with('error', 'Falha ao adicionar jogo!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  Jogos $jogo
     * @return \Illuminate\Http\Response
     */
    public function show(Jogos $jogo)
    {
        //
        return view('admin.jogos.show', ['jogo' => $jogo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Jogos $jogo
     * @return \Illuminate\Http\Response
     */
    public function edit(Jogos $jogo)
    {
        //
        $equipas = Equipa::all();
        return view('admin.jogos.edit', ['jogo' => $jogo, 'equipas' => $equipas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Jogos $jogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jogos $jogo)
    {
        //
        //dd($request->all());
        $rules = array(
            'equipa_visitante' =>  'required|min:3|max:40',
            'resultado' =>  'required',
            'data' =>  'required',
            'link' =>  'required',
            'equipa_id' =>  'required'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $date = date('Y/m/d H:i:s', strtotime($request->get('data')));

        $form_data = array(
            'equipa_visitante' => $request->get('equipa_visitante'),
            'resultado' => $request->get('resultado'),
            'data' => $date,
            'link' => $request->get('link'),
            'equipa_id' => $request->get('equipa_id')
        );

        if($jogo->update($form_data)){
            return redirect()->route('jogos.show', ['jogo' => $jogo->id_jogo])->with('success', 'Jogo atualizado com sucesso!');
        }else{
            return back()->with('error', 'Erro ao atualizar o jogo!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Jogos $jogo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jogos $jogo)
    {
        //
        if($jogo->delete()){
            return redirect()->route('jogos.index')->with('success', 'Jogo removido com sucesso!');
        }else{
            return back()->with('error', 'Erro ao remover o jogo!');
        }
    }
    public function exportacao($extensao){
        //return 'teste';
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new jogosExport, 'lista_jogos.'.$extensao);
        }
    }
    public function exportar(){
        //return 'teste';
        $jogos = Jogos::all();
        $pdf = PDF::loadView('admin.jogos.pdf',['jogos' => $jogos]);
        return $pdf->download('lista_jogos.pdf');
    }
}
