<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use App\Exports\galeriaExport;
use PDF;
use Excel;

class AdminGaleriaController extends Controller
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
            $galerias = Galeria::where('titulo', 'like', '%'.$verification.'%')->orWhere('descricao', 'like', '%'.$verification.'%')->paginate(5);
            return view('admin.galeria.index', compact('galerias', 'verification'));
        }if($verification == null){
            $verification = '';
            $galerias = Galeria::paginate(5);
            return view('admin.galeria.index',  ['galerias' => $galerias, 'verification' => $verification]);
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
        return view('admin.galeria.create');
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
            'titulo'  =>  'required|min:3',
            'descricao' => 'required',
            'link' => 'required',
            'foto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
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
            $path = $request->file('foto')->storeAs('public/galeria', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }

            $form_data = array(
                'titulo' => $request->get('titulo'),
                'descricao' => $request->get('descricao'),
                'link' => $request->get('link'),
                'foto' => $fileNameToStore
            );

            if(Galeria::create($form_data)){
                return redirect()->route('galeria.index')->with('success', 'Fotografia adicionada com sucesso!');
            }else{
                return back()->withInput()->with('error', 'Falha ao adicionar fotografia!');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Galeria $galerium
     * @return \Illuminate\Http\Response
     */
    public function show(Galeria $galerium)
    {
        //
        return view('admin.galeria.show', ['galerium' => $galerium]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Galeria $galerium
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeria $galerium)
    {
        //
        return view('admin.galeria.edit', ['galerium' => $galerium]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Galeria $galerium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeria $galerium)
    {
        //
        $query = 'SELECT * FROM galeria WHERE id='.$request->id;
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
            $path = $request->file('foto')->storeAs('public/galeria', $fileNameToStore);
        }

        if($request->hasFile('foto')){
            if($auxfoto[0]->foto != 'noimage.png'){
                Storage::delete('public/galeria/'.$auxfoto[0]->foto);
            }
            $galerium->foto = $fileNameToStore;
        }

        $form_data = array(
            'titulo' => $request->get('titulo'),
            'descricao' => $request->get('descricao'),
            'link' => $request->get('link'),
            'foto' => $fileNameToStore
        );
        if($galerium->update($form_data)){
            return redirect()->route('galeria.show', ['galerium' => $galerium->id])->with('success', 'Fotografia atualizada com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao atualizar fotografia!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Galeria $galerium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeria $galerium)
    {
        if($galerium->foto != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/galeria/'.$galerium->foto);
        }
        if($galerium->delete()){
            return redirect()->route('galeria.index')->with('success', 'Fotografia eliminada com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao eliminar fotografia!');
        }
    }
    public function exportacao($extensao){
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new galeriaExport, 'lista_fotografias.'.$extensao);
        }
    }
    public function exportar(){
        $galerias = Galeria::all();
        $pdf = PDF::loadView('admin.galeria.pdf',['galerias' => $galerias]);
        return $pdf->download('lista_fotografias.pdf');
    }
}
