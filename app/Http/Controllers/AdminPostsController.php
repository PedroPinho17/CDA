<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use App\Exports\postExport;
use PDF; // ou use Barryvdh\DomPDF\Facade\Pdf;
use Excel; // ou use Maatwebsite\Excel\Facades\Excel;

class AdminPostsController extends Controller
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
            $posts = Posts::with('user')->where('titulo', 'like', '%'.$verification.'%')->orWhere('data', 'like', '%'.$verification.'%')->orWhere('user_id','=',$verification)->paginate(10);
            return view('admin.posts.index', ['posts' => $posts, 'verification' => $verification]);
        }
        if($verification == null){
            $verification = '';
            $posts = Posts::with('user')->paginate(6);
            return view('admin.posts.index', ['posts' => $posts, 'verification' => $verification]);
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
        $data = date('d-m-Y');
        //dd($data);
        $users = User::all();
        return view('admin.posts.create', ['users' => $users, 'data' => $data]);
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
            'titulo'  =>  'required|min:3',
            'descricao' => 'required',
            'data' => 'required',
            'link' => 'required',
            'foto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required'
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
            $path = $request->file('foto')->storeAs('public/posts', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }
        $date = date('y/m/d', strtotime($request->get('data')));
        $form_data = array(
            'titulo' => $request->get('titulo'),
            'descricao' => $request->get('descricao'),
            'data' => $date,
            'link' => $request->get('link'),
            'foto' => $fileNameToStore,
            'user_id' => $request->get('user_id')
        );
        if(Posts::create($form_data)){
            return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao criar post!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Posts $post
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        //
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Posts $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        //
        $users = User::all();
        return view('admin.posts.edit', ['post' => $post, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Posts $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        //dd($request->all());
        //
        $query = 'SELECT * FROM `posts` WHERE id_post = '.$request->id_post_;
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
            $path = $request->file('foto')->storeAs('public/posts', $fileNameToStore);
        }

        if($request->hasFile('foto')){
            if($auxfoto[0]->foto != 'noimage.png'){
                Storage::delete('public/posts/'.$auxfoto[0]->foto);
            }
            $post->foto = $fileNameToStore;
        }
        $date = date('y/m/d', strtotime($request->get('data')));
        $form_data = array(
            'titulo' => $request->get('titulo'),
            'descricao' => $request->get('descricao'),
            'data' => $date,
            'link' => $request->get('link'),
            'foto' => $fileNameToStore,
            'user_id' => $request->get('user_id')
        );

        if($post->update($form_data)){
            return redirect()->route('posts.show', ['post' => $post->id_post])->with('success', 'Post atualizado com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao editar post!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Posts $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        //
        if($post->foto != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/posts/'.$post->foto);
        }
        if($post->delete()){
            return redirect()->route('posts.index')->with('success', 'Post eliminado com sucesso!');
        }else{
            return back()->withInput()->with('error', 'Falha ao eliminar post!');
        }
    }
    public function exportacao($extensao){
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new postExport, 'lista_posts.'.$extensao);
        }
    }
    public function exportar(){
        $posts = Posts::all();
        $pdf = PDF::loadView('admin.posts.pdf',['posts' => $posts]);
        return $pdf->download('lista_posts.pdf');
    }
}
