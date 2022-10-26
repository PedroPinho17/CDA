<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Validator;

class AdminTaskController extends Controller
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
            $tasks = Task::where('texto', 'like', '%'.$verification.'%')->orWhere('user_id', '=', $verification)->paginate(10);
            return view('admin.tasks.index', compact('tasks', 'verification'));

        }
        if($verification == null){
            $verification = '';
            $tasks = Task::with('user')->paginate(6);
            return view('admin.tasks.index', compact('tasks', 'verification'));
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
        $users = User::all();
        return view('admin.tasks.create', compact('users'));
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
            'texto' => ['required', 'string', 'max:255'],
            'user_id' => ['required']
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $task = new Task();
        $task->texto = $request->texto;
        $task->user_id = $request->user_id;
        if($task->save()){
            return redirect()->route('task.index')->with('success', 'Tarefa adicionada com sucesso!');
        }else{
            return back()->with('error', 'Erro ao adicionar tarefa!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        $users = User::all();
        return view('admin.tasks.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $rules = array(
            'texto' => ['required', 'string', 'max:255'],
            'user_id' => ['required']
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $task->texto = $request->texto;
        $task->user_id = $request->user_id;
        if($task->save()){
            return redirect()->route('task.index')->with('success', 'Tarefa editada com sucesso!');
        }else{
            return back()->with('error', 'Erro ao editar tarefa!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
