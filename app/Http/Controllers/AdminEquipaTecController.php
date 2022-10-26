<?php

namespace App\Http\Controllers;

use App\Models\EquipaTecnica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\equipaTecExport;
use PDF; // ou use Barryvdh\DomPDF\Facade\Pdf;
use Excel; // ou use Maatwebsite\Excel\Facades\Excel;

class AdminEquipaTecController extends Controller
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
            $equipaTecs = EquipaTecnica::where('nome', 'like', '%'.$verification.'%')->paginate(5);
            return view('admin.equipa_tecnica.index', ['equipaTecs' => $equipaTecs, 'verification' => $verification]);
        }if($verification == null){
            $verification = '';
            $equipaTecs = EquipaTecnica::paginate(4);
            return view('admin.equipa_tecnica.index', ['equipaTecs' => $equipaTecs, 'verification' => $verification]);
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
        return view('admin.equipa_tecnica.create');
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
            'nome'  =>  'required|min:3|max:40',
            'foto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        //
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
            $path = $request->file('foto')->storeAs('public/fotos_equipa_tecnica', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }
            $form_data = array(
                'nome' => $request->get('nome'),
                'foto' => $fileNameToStore
            );
            //dd($form_data);

                if(EquipaTecnica::create($form_data)){
                    return redirect()->route('equipaTec.index')->with('success', 'Equipa Técnica criada com sucesso!');
                }else{
                    return back()->with('error', 'Erro ao criar Equipa Técnica!');
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  EquipaTecnica  $equipaTec
     * @return \Illuminate\Http\Response
     */
    public function show(EquipaTecnica  $equipaTec)
    {
        //
        return view('admin.equipa_tecnica.show', ['equipaTec' => $equipaTec]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EquipaTecnica  $equipaTec
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipaTecnica  $equipaTec)
    {
        //
        return view('admin.equipa_tecnica.edit', ['equipaTec' => $equipaTec]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  EquipaTecnica  $equipaTec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipaTecnica  $equipaTec)
    {

        $query = 'SELECT * FROM `equipa_tecnica` WHERE id_equipaTec = '.$request->id_equipaTec_;
        $auxfoto = DB::select($query);

        if($request->hasFile('foto')){
            //Get filename with the extension
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('foto')->getClientOriginalExtension();
            //Filename to store
            //dd($filename.'.'.$extension);
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('foto')->storeAs('public/fotos_equipa_tecnica', $fileNameToStore);
        }

        if($request->hasFile('foto')){
            if($auxfoto[0]->foto != 'noimage.png'){
                Storage::delete('public/fotos_equipa_tecnica/'.$auxfoto[0]->foto);
            }
            $equipaTec->foto = $fileNameToStore;
        }
        $form_data = array(
            'nome' => $request->get('nome'),
            'foto' => $fileNameToStore
        );
        if($equipaTec->update($form_data)){
            return redirect()->route('equipaTec.index', ['equipaTec' => $equipaTec])->with('success', 'Registo atualizado com sucesso.');
        }else{
            return response()->json(['error' => 'Erro ao atualizar a equipa Tecnica!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EquipaTecnica  $equipaTec
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipaTecnica  $equipaTec)
    {
        //
        if($equipaTec->foto != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/fotos_equipa_tecnica/'.$equipaTec->foto);
        }
        if($equipaTec->delete()){
            return redirect()->route('equipaTec.index')->with('success', 'Registo eliminado com sucesso.');
        }else{
            return back()->with('error', 'Erro ao eliminar o registo!');
        }
    }
    public function exportacao($extensao){
        //return 'teste';
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new equipaTecExport, 'lista_equipaTecnica.'.$extensao);
        }
    }
    public function exportar(){
        //return 'teste';
        $equipaTecs = EquipaTecnica::all();
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.equipa_tecnica.pdf',['equipaTecs' => $equipaTecs]);
        return $pdf->download('lista_equipaTecnica.pdf');
    }

}
