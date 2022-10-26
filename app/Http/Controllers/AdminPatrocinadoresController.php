<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patrocinadores;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use App\Exports\patrocinadoresExport;
use PDF; // ou use Barryvdh\DomPDF\Facade\Pdf;
use Excel; // ou use Maatwebsite\Excel\Facades\Excel;

class AdminPatrocinadoresController extends Controller
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

            $patrocinadores = Patrocinadores::where('nome', 'like', '%'.$verification.'%')
            ->orWhere('id', '=', $verification)
            ->orWhere('descricao', 'like', '%'.$verification.'%')
            ->paginate(10);
            return view('admin.patrocinadores.index', compact('patrocinadores', 'verification'));

        }if($verification == null){
            $verification = '';
            $patrocinadores = Patrocinadores::paginate(5);
            return view('admin.patrocinadores.index', ['patrocinadores' => $patrocinadores, 'verification' => $verification]);
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
        return view('admin.patrocinadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'nome'  =>  'required|min:3|max:40',
            'descricao' => 'required',
            'link' => 'required',
            'foto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
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
            $path = $request->file('foto')->storeAs('public/patrocinadores', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }

            $form_data = array(
                'nome' => $request->get('nome'),
                'descricao' => $request->get('descricao'),
                'link' => $request->get('link'),
                'foto' => $fileNameToStore
            );

                if(Patrocinadores::create($form_data)){
                    return redirect()->route('patrocinadores.index')->with('success', 'Patrocinador adicionado com sucesso!');
                }else{
                    return back()->with('error', 'Erro ao adicionar patrocinador!');
                }

    }

    /**
     * Display the specified resource.
     *
     * @param  Patrocinadores  $patrocinadore
     * @return \Illuminate\Http\Response
     */
    public function show(Patrocinadores  $patrocinadore)
    {
        //
        return view('admin.patrocinadores.show', ['patrocinadore' => $patrocinadore]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Patrocinadores  $patrocinadore
     * @return \Illuminate\Http\Response
     */
    public function edit(Patrocinadores  $patrocinadore)
    {
        //
        return view('admin.patrocinadores.edit', ['patrocinadore' => $patrocinadore]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Patrocinadores  $patrocinadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patrocinadores  $patrocinadore)
    {
        //
        $query = 'SELECT * FROM patrocinadores WHERE id='.$request->id;
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
            $path = $request->file('foto')->storeAs('public/patrocinadores', $fileNameToStore);
        }

        if($request->hasFile('foto')){
            if($auxfoto[0]->foto != 'noimage.png'){
                Storage::delete('public/patrocinadores/'.$auxfoto[0]->foto);
            }
            $patrocinadore->foto = $fileNameToStore;
        }

        $form_data = array(
            'nome' => $request->get('nome'),
            'descricao' => $request->get('descricao'),
            'link' => $request->get('link'),
            'foto' => $fileNameToStore
        );
        if($patrocinadore->update($form_data)){
            return redirect()->route('patrocinadores.show', ['patrocinadore' => $patrocinadore->id])->with('success', 'Patrocinador atualizado com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao atualizar Patrocinador!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Patrocinadores  $patrocinadore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patrocinadores  $patrocinadore)
    {
        //
        if($patrocinadore->foto != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/patrocinadores/'.$patrocinadore->foto);
        }
        if($patrocinadore->delete()){
            return redirect()->route('patrocinadores.index')->with('success', 'Patrocinador eliminado com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao eliminar Patrocinador!');
        }

    }
    public function exportacao($extensao){
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new patrocinadoresExport, 'lista_patrocinios.'.$extensao);
        }
    }
    public function exportar(){
        $patrocinadores = Patrocinadores::all();
        $pdf = PDF::loadView('admin.patrocinadores.pdf',['patrocinadores' => $patrocinadores]);
        return $pdf->download('lista_patrocinios.pdf');
    }
}
