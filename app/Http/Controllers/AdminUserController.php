<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\tipoUsers;
use Validator;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Exports\userExport;
use PDF; // ou use Barryvdh\DomPDF\Facade\Pdf;
use Excel; // ou use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Storage\AlertSessionStore;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $verification = $request->get('query');

        if($verification != null){
            $users = User::where('name', 'like', '%'.$verification.'%')->orWhere('email', 'like', '%'.$verification.'%')->paginate(10);
            return view('admin.user.index', compact('users', 'verification'));
        }if($verification == null){
            $verification = '';
            $users = User::paginate(10);
            return view('admin.user.index', ['users' => $users, 'verification' => $verification]);
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
        $tipoUsers = tipoUsers::all();
        return view('admin.user.create', compact('tipoUsers'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipoUser_id' => ['required']
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'tipoUser_id' => $request->get('tipoUser_id')
        );
        //dd($form_data);
        if(User::create($form_data)){
            return redirect()->route('login')->with('success', 'Utilizador adicionado com sucesso!');
        }else{
            return back()->with('error', 'Erro ao adicionar utilizador!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('admin.user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $tipoUsers = tipoUsers::all();
        return view('admin.user.edit', ['user' => $user, 'tipoUsers' => $tipoUsers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = array(
            'tipoUser_id' => ['required']
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'tipoUser_id' => $request->get('tipoUser_id')
        );

        if($user->update($form_data)){
            return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Utilizador atualizado com sucesso!');
        }else{
            return back()->with('error', 'Erro ao editar utilizador!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if($user->foto != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/Perfil/'.$user->foto_perfil);
        }
        if($user->delete()){
            return redirect()->route('user.index')->with('success', 'Utilizador removido com sucesso!');
        }else{
            return back()->with('error', 'Erro ao remover utilizador!');
        }
    }
    public function profile()

    {
        $uti = User::all();
        $users = User::where('id', auth()->user()->id)->get();
        $tpUser = DB::select('SELECT tu.nome, tu.descricao FROM users u, tipousers tu WHERE u.tipoUser_id = tu.idTpUser and u.id = '.auth()->user()->id);
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        //$tasks = DB::table('tasks')->where('user_id', auth()->user()->id)->get();
        return view('admin.user.profile', ['users' => $users, 'tasks' => $tasks, 'uti' => $uti, 'tpUser' => $tpUser]);
    }

    public function update_profile(Request $request)
    {
        $rules = array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        );
        if(User::where('id', auth()->user()->id)->update($form_data)){
            return redirect()->route('user.profile')->with('success', 'Perfil atualizado com sucesso!');
        }else{
            return back()->with('error', 'Erro ao atualizar perfil!');
        }
    }
    public function changePassword(Request $request){

        $passOld = Hash::make($request->get('old_password'));

        /*if($passOld != auth()->user()->password){
            Alert::error('Password Antiga errada!');
            return back()->with('error', 'Password Antiga errada!');
        }*/if($request->get('password_confirmation') != $request->get('password') ){
            Alert::error('Confirmar password está errada!');
            return back()->with('error', 'Confirmar password errada!');
        }
        $rules = array(
            'password' => ['required', 'string', 'min:8', 'confirmed']
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'password' => Hash::make($request->get('password'))
        );
        if(User::where('id', auth()->user()->id)->update($form_data)){
            return redirect()->route('user.profile')->with('success', 'Perfil atualizado com sucesso!');
        }else{
            return back()->with('error', 'Erro ao atualizar perfil!');
        }
    }
    public function change_profile_picture(Request $request, User $user){
        /*//dd(Auth::user()->id);

        $form_data = array(
            'foto_perfil' => $fileNameToStore
        );

        if($user->update($form_data)){
            return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Imagem Adicionada com sucesso!');
        }else{
            return back()->with('error', 'Erro ao adicionar imagem !');
        }*/
        $rules = array(
            'foto_perfil' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $query = 'SELECT * FROM `users` WHERE id = '.Auth::user()->id;
        $auxfoto = DB::select($query);

        if($request->hasFile('foto_perfil')){
            //Get filename with the extension
            $filenameWithExt = $request->file('foto_perfil')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('foto_perfil')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('foto_perfil')->storeAs('public/Perfil', $fileNameToStore);
        }

        if($request->hasFile('foto_perfil')){
            if($auxfoto[0]->foto_perfil != 'noimage.png'){
                Storage::delete('public/Perfil/'.$auxfoto[0]->foto_perfil);
            }
            $user->foto_perfil = $fileNameToStore;
        }

        $form_data = array(
            'foto_perfil' => $fileNameToStore
        );
        if(User::where('id', auth()->user()->id)->update($form_data)){
            return redirect()->route('user.profile')->with('success', 'Perfil atualizado com sucesso!');
        }else{
            return back()->with('error', 'Erro ao atualizar perfil!');
        }
    }

    public function change_Detalhes(Request $request){
        /*$rules = array(
            'cargo' => ['required', 'string', 'max:255'],
            'telemovel' => ['required', 'string', 'min:9', 'max:9'],
            'rede' =>  ['required', 'string', 'max:255']
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }*/
        if(($request->get('telemovel') != null) && ($request->get('rede') != null)){
            $form_data = array(
                'telemovel' => $request->get('telemovel'),
                'rede' => $request->get('rede')
            );
        }
        if(($request->get('telemovel') == null)){
            $telemovel = "Número ainda não inserida";
            $form_data = array(
                'telemovel' => $telemovel,
                'rede' => $request->get('rede')
            );
        }
        if(($request->get('rede') == null)){
            $rede = "Rede ainda não inserida";
            $form_data = array(
                'telemovel' => $request->get('telemovel'),
                'rede' => $rede
            );
        }if(($request->get('telemovel') == null) && ($request->get('rede') == null)){
            return back()->with('error', 'Erro ao atualizar perfil!');
        }
        if(User::where('id', auth()->user()->id)->update($form_data)){
            return redirect()->route('user.profile')->with('success', 'Perfil atualizado com sucesso!');
        }else{
            return back()->with('error', 'Erro ao atualizar perfil!');
        }
    }
    public function delete_task(Task $task){
        if($task = Task::where('id', $task->id)->delete()){
            return redirect()->route('user.profile')->with('success', 'Tarefa feita com sucesso!');
        }else{
            return back()->with('error', 'Erro ao eliminar tarefa!');
        }
    }

    public function exportacao($extensao){
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new userExport, 'lista_users.'.$extensao);
        }
    }
    public function exportar(){
        $users = User::all();
        $pdf = PDF::loadView('admin.user.pdf',['users' => $users]);
        return $pdf->download('lista_users.pdf');
    }
}
