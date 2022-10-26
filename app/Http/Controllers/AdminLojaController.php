<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Loja;
use DB;
use Validator;
use App\Exports\lojaExport;
use PDF;
use Excel;

class AdminLojaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        //$query = Loja::with('estadoProduto')->where('estado_produto_id', '=', '1');
        //dd($query);
        $verification = $request->get('query');
        if($verification != null){
            $lojas = Loja::with('estadoProduto')->where('nome_produto', 'like', '%'.$verification.'%')->orWhere('valor','=',$verification)->paginate(10);
            return view('admin.loja.index', ['lojas' => $lojas, 'verification' => $verification]);
        }if($verification == null){
            $verification = '';
            $lojas = Loja::with('estadoProduto')->paginate(6);
            return view('admin.loja.index', ['lojas' => $lojas, 'verification' => $verification]);
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
        $estados = DB::table('estado_produtos')->get();
        return view('admin.loja.create', ['estados' => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ////realizar a validação dos dados do formulário recebidos no request
        $rules =[
            'nome_produto' => 'required|min:3|max:40',
            'valor' => 'required',
            'foto_produto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'estado_produto_id' => 'required'
            ];
            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

        if($request->hasFile('foto_produto')){
            //Get filename with the extension
            $filenameWithExt = $request->file('foto_produto')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('foto_produto')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('foto_produto')->storeAs('public/foto_produto', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }

            $form_data = array(
                'nome_produto' => $request->get('nome_produto'),
                'valor' => $request->get('valor'),
                'foto_produto' => $fileNameToStore,
                'estado_produto_id' => $request->get('estado_produto_id')
            );

                if(Loja::create($form_data)){
                    return redirect()->route('loja.index')->with('success', 'Produto adicionado com sucesso!');
                }else{
                    return back()->withInput()->with('error', 'Falha ao adicionar produto!');
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function show(Loja $loja)
    {
        //
        $estados = DB::table('estado_produtos')->get();
        return view('admin.loja.show', ['loja' => $loja, 'estados' => $estados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function edit(Loja $loja)
    {
        //
        $estados = DB::table('estado_produtos')->get();
        return view('admin.loja.edit', ['loja' => $loja, 'estados' => $estados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Loja $loja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loja $loja)
    {
        //
        $query = 'SELECT * FROM produtos WHERE id_produto='.$request->id_produto;
        $auxfoto = DB::select($query);

        if($request->hasFile('foto_produto')){
            //Get filename with the extension
            $filenameWithExt = $request->file('foto_produto')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('foto_produto')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('foto_produto')->storeAs('public/foto_produto', $fileNameToStore);
        }

        if($request->hasFile('foto_produto')){
            if($auxfoto[0]->foto_produto != 'noimage.png'){
                Storage::delete('public/foto_produto/'.$auxfoto[0]->foto_produto);
            }
            $loja->foto_produto = $fileNameToStore;
        }

        $form_data = array(
            'nome_produto' => $request->get('nome_produto'),
            'valor' => $request->get('valor'),
            'foto_produto' => $fileNameToStore,
            'estado_produto_id' => $request->get('estado_produto_id')
        );
        if($loja->update($form_data)){
            return redirect()->route('loja.show', ['loja' => $loja->id_produto])->with('success', 'Produto atualizado com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao atualizar produto!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Loja  $loja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loja $loja)
    {
        //
        if($loja->foto_produto != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/foto_produto/'.$loja->foto_produto);
        }
        if($loja->delete()){
            return redirect()->route('loja.index')->with('success', 'Produto removido com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao remover produto!');
        }
    }
    public function exportacao($extensao){
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new lojaExport, 'lista_produtos.'.$extensao);
        }
    }
    public function exportar(){
        $lojas = Loja::all();
        $pdf = PDF::loadView('admin.loja.pdf',['lojas' => $lojas]);
        return $pdf->download('lista_produtos.pdf');
    }
}
