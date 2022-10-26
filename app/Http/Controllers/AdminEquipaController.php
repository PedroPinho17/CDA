<?php

namespace App\Http\Controllers;

use App\Models\Equipa;
use App\Models\EquipaTecnica;
use App\Models\Escalao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use Alert;
use App\Exports\equipaExport;
use Excel;
use PDF;

class AdminEquipaController extends Controller
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
            $equipas = Equipa::where('nome', 'like', '%'.$verification.'%')->orWhere('tipo_Equipa','like', '%'.$verification.'%')->orWhere('id_escalao','=',$verification )->orWhere('id_equipaTecnica','=',$verification )->paginate(5);
            return view('admin.equipa.index', ['equipas' => $equipas, 'verification' => $verification]);
        }
        if($verification == null){
            $verification = '';
            $equipas = Equipa::with(['escalao','equipaTec'])->paginate(3);
            return view('admin.equipa.index', ['equipas' => $equipas, 'verification' => $verification]);
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
        $equipaTec = EquipaTecnica::all();
        return view('admin.equipa.create', [ 'escaloes' => $escaloes, 'equipaTec' => $equipaTec]);
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
            'nome'  =>  'required|min:3',
            'tipo_Equipa' => 'required',
            'imagemEquipa' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_escalao' => 'required',
            'id_equipaTecnica_' => 'required'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        if($request->hasFile('imagemEquipa')){
            //Get filename with the extension
            $filenameWithExt = $request->file('imagemEquipa')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('imagemEquipa')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('imagemEquipa')->storeAs('public/equipa', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }
        //$id_equipaTec = $request->get('id_equipaTecnica');
        $form_data = array(
            'nome' => $request->get('nome'),
            'tipo_Equipa' => $request->get('tipo_Equipa'),
            'imagemEquipa' => $fileNameToStore,
            'id_escalao' => $request->get('id_escalao'),
            'id_equipaTecnica' => $request->get('id_equipaTecnica_')
        );
        //dd($form_data);
        //Equipa::create($form_data);
        //verificar inserção de dados
        if( Equipa::create($form_data)){
            //Alert::success('Equipa criada com sucesso!', 'Sucesso!');
            return redirect()->route('equipa.index')->with('success', 'Equipa criada com sucesso!');
        }else{
            return response()->json(['error' => 'Erro ao criar a equipa!']);
        }
        //return redirect()->route('equipa.index')->with('success', 'Equipa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Equipa  $equipa
     * @return \Illuminate\Http\Response
     */
    public function show(Equipa  $equipa)
    {
        //
        return view('admin.equipa.show', ['equipa' => $equipa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   Equipa  $equipa
     * @return \Illuminate\Http\Response
     */
    public function edit( Equipa  $equipa)
    {
        //
        $escaloes = Escalao::all();
        $equipaTec = EquipaTecnica::all();
        return view('admin.equipa.edit', ['equipa' => $equipa, 'escaloes' => $escaloes, 'equipaTec' => $equipaTec]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Equipa  $equipa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipa  $equipa)
    {
        //
        //dd($request->all());
        $query = 'SELECT * FROM `equipa` WHERE id_equipa = '.$request->id_equipa_;
        $auxfoto = DB::select($query);


        if($request->hasFile('imagemEquipa')){
            //Get filename with the extension
            $filenameWithExt = $request->file('imagemEquipa')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('imagemEquipa')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('imagemEquipa')->storeAs('public/equipa', $fileNameToStore);
        }

        if($request->hasFile('imagemEquipa')){
            if($auxfoto[0]->imagemEquipa != 'noimage.png'){
                Storage::delete('public/equipa/'.$auxfoto[0]->imagemEquipa);
            }
            $equipa->imagemEquipa = $fileNameToStore;
        }
        $form_data = array(
            'nome' => $request->get('nome'),
            'tipo_Equipa' => $request->get('tipo_Equipa'),
            'imagemEquipa' => $fileNameToStore,
            'id_escalao' => $request->get('id_escalao'),
            'id_equipaTecnica' => $request->get('id_equipaTecnica')
        );

        if($equipa->update($form_data)){
            return redirect()->route('equipa.show', ['equipa' => $equipa->id_equipa])->with('success', 'Equipa atualizada com sucesso!');
        }
        else{
            return response()->json(['error' => 'Erro ao atualizar a equipa!']);
        }
        //$equipa->update($form_data);
        //return redirect()->route('equipa.show', ['equipa' => $equipa->id_equipa]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Equipa  $equipa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipa  $equipa)
    {
        //
        if($equipa->imagemEquipa != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/equipa/'.$equipa->imagemEquipa);
        }
        if($equipa->delete()){
            return redirect()->route('equipa.index')->with('success', 'Equipa removida com sucesso!');
        }else{
            return response()->json(['error' => 'Erro ao remover a equipa!']);
        }
    }
    public function exportacao($extensao){
        //return 'teste';
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new equipaExport, 'lista_equipas.'.$extensao);
        }
    }
    public function exportar(){
        //return 'teste';
        $equipas = Equipa::all();
        $pdf = PDF::loadView('admin.equipa.pdf',['equipas' => $equipas]);
        return $pdf->download('lista_equipas.pdf');
    }
}
