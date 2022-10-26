<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tpFuncao;
use App\Models\EquipaTecnica;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use App\Exports\tpFuncaoTreinadorExport;
use Excel;
use PDF;

class AdmintpFuncaoEquipaTecController extends Controller
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
            $tpFuncoes  = tpFuncao::where('nome_treinador', 'like', '%'.$verification.'%')->orWhere('funcao', 'like', '%'.$verification.'%')->orWhere('id_equipaTec','=', $verification)->paginate(10);
            return view('admin.tpFuncao.index', ['tpFuncoes' => $tpFuncoes, 'verification' => $verification]);
        }
        if($verification == null){
            $verification = '';
            $tpFuncoes = tpFuncao::with('equipaTecnica')->paginate(6);
            return view('admin.tpFuncao.index', ['tpFuncoes' => $tpFuncoes, 'verification' => $verification]);
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
        $equipaTecnicas = EquipaTecnica::all();
        return view('admin.tpFuncao.create', ['equipaTecnicas' => $equipaTecnicas]);
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
        //dd($request->all());
        $rules = array(
            'nome_treinador' => 'required|min:3|max:255',
            'funcao' => 'required|min:3|max:255',
            'foto_treinador' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_equipaTec' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        if($request->hasFile('foto_treinador')){
            //Get filename with the extension
            $filenameWithExt = $request->file('foto_treinador')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('foto_treinador')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            if($request->get('id_equipaTec') == 1 ){
                $path = $request->file('foto_treinador')->storeAs('public/treinadores/seniores', $fileNameToStore);
            }else if( $request->get('id_equipaTec') == 2){
                $path = $request->file('foto_treinador')->storeAs('public/treinadores/juniores', $fileNameToStore);
            }else if($request->get('id_equipaTec') == 3){
                $path = $request->file('foto_treinador')->storeAs('public/treinadores/juvenis', $fileNameToStore);
            }

        }else{
            $fileNameToStore = 'noimage.png';
        }
        $form_data = array(
            'nome_treinador' => $request->get('nome_treinador'),
            'funcao' => $request->get('funcao'),
            'foto_treinador' => $fileNameToStore,
            'id_equipaTec' => $request->get('id_equipaTec'),
            );
        //dd($form_data);
        if(tpFuncao::create($form_data)){
            return redirect()->route('tpFuncao-equipaTec.index')->with('success', 'Treinador adicionado com sucesso!');
        }else{
            return response()->json(['error' => 'Erro ao adicionar treinador!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  tpFuncao  $tpFuncao_equipaTec
     * @return \Illuminate\Http\Response
     */
    public function show(tpFuncao  $tpFuncao_equipaTec)
    {
        //
        return view('admin.tpFuncao.show', ['tpFuncao_equipaTec' => $tpFuncao_equipaTec]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  tpFuncao  $tpFuncao_equipaTec
     * @return \Illuminate\Http\Response
     */
    public function edit(tpFuncao  $tpFuncao_equipaTec)
    {
        //
        $equipaTecnicas = EquipaTecnica::all();
        return view('admin.tpFuncao.edit', ['tpFuncao_equipaTec' => $tpFuncao_equipaTec, 'equipaTecnicas' => $equipaTecnicas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  tpFuncao  $tpFuncao_equipaTec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,tpFuncao  $tpFuncao_equipaTec)
    {
        //
        //dd($request->all());

        $query = 'SELECT * FROM tpfuncao WHERE id = '.$request->id;
        $auxfoto = DB::select($query);

        if($request->hasFile('foto_treinador')){
            //Get filename with the extension
            $filenameWithExt = $request->file('foto_treinador')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('foto_treinador')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            if( $request->get('id_equipaTec') == 1 ){
                $path = $request->file('foto_treinador')->storeAs('public/treinadores/seniores', $fileNameToStore);
            }else if( $request->get('id_equipaTec') == 2){
                $path = $request->file('foto_treinador')->storeAs('public/treinadores/juniores', $fileNameToStore);
            }
        }

        if($request->hasFile('foto_treinador')){
            if(($request->get('id_equipaTec') == 1) && ($auxfoto[0]->foto_treinador != 'noimage.png')){
                Storage::delete('public/treinadores/seniores/'.$auxfoto[0]->foto_treinador);
            }

            if(($request->get('id_equipaTec') == 2)  && ($auxfoto[0]->foto_treinador != 'noimage.png')){
                Storage::delete('public/treinadores/juniores/'.$auxfoto[0]->foto_treinador);
            }
            $tpFuncao_equipaTec->foto_treinador = $fileNameToStore;
        }
            $form_data = array(
            'id' => $request->get('id'),
            'nome_treinador' => $request->get('nome_treinador'),
            'funcao' => $request->get('funcao'),
            'foto_treinador' => $fileNameToStore,
            'id_equipaTec' => $request->get('id_equipaTec'),
            );
        //dd($form_data);

        if($tpFuncao_equipaTec->update($form_data)){
            return redirect()->route('tpFuncao-equipaTec.show', ['tpFuncao_equipaTec' => $tpFuncao_equipaTec->id])->with('success', 'treinador atualizado com sucesso!');
        }
        else{
            return response()->json(['error' => 'Erro ao atualizar o treinador!']);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  tpFuncao  $tpFuncao_equipaTec
     * @return \Illuminate\Http\Response
     */
    public function destroy(tpFuncao  $tpFuncao_equipaTec)
    {
        //
        if($tpFuncao_equipaTec->foto != 'noimage.jpg'){
            //Delete Image
            if($tpFuncao_equipaTec->id_equipaTec == 1){
                Storage::delete('public/treinadores/seniores/'.$tpFuncao_equipaTec->foto_treinador);
            }else if($tpFuncao_equipaTec->id_equipaTec == 2){
                Storage::delete('public/treinadores/juniores/'.$tpFuncao_equipaTec->foto_treinador);
            }else if($tpFuncao_equipaTec->id_equipaTec == 3){
                Storage::delete('public/treinadores/juvenis/'.$tpFuncao_equipaTec->foto_treinador);
            }
        }
        if($tpFuncao_equipaTec->delete()){
            return redirect()->route('tpFuncao-equipaTec.index')->with('success', 'Treinador removido com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Erro ao eliminar treinador!');
        }
    }
    public function exportacao($extensao){
        //return 'teste';
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new tpFuncaoTreinadorExport, 'lista_treinadores.'.$extensao);
        }
    }
    public function exportar(){
        //return 'teste';
        $tpFuncao = tpFuncao::all();
        $pdf = PDF::loadView('admin.tpFuncao.pdf',['tpFuncao' => $tpFuncao]);
        return $pdf->download('lista_treinadores.pdf');
    }
}
