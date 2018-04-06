<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task; // 追加

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでtasks/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
        }
        
        // return view("tasks.index"は表示したいviewを選択している 8.3
        // [‘tasks’ => $tasks] は tasks.index という View に渡すデータ
        //左側のtasks がビューファイル側で呼び出す変数の名前 index.blade.phpでは$tasksと書く
        return view("tasks.index",[
            "tasks" => $tasks,    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでtasks/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $task = new Task;
        
        return view("tasks.create",[
            "task" => $task,    
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // postでtasks/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        //$thisにはcreate.blade.phpの$taskが入る　9.1
        $this->validate($request,[
            "status" => "required|max:10",
            "content" => "required|max:255",
        ]);
        
        //Task.phpで設定することで利用できるようになる (user_idを設定しないとエラーになる)
        $request->user()->tasks()->create([
            "status" => $request->status,
            "content" => $request->content,
        ]);
        
        return redirect("/tasks");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでtasks/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
         if (\Auth::check()) {
            $user = \Auth::user();
            $task = $user->tasks()->find($id);
        }
        
            //$taskが自分のタスクだった場合tasks.showへ、違う場合、タスク一覧へ
            if ($task) {
                return view("tasks.show",[
                    "task" => $task,
                ]); 
            } else {
                return redirect("/tasks");
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでtasks/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = $user->tasks()->find($id);
        }
        
            //$taskが自分のタスクだった場合tasks.editへ、違う場合、タスク一覧へ
            if ($task) {
                return view("tasks.edit",[
                    "task" => $task,
                ]); 
            } else {
                return redirect("/tasks");
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // putまたはpatchでtasks/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "status" => "required|max:10",
            "content" => "required|max:255",
        ]);
        
        $task = Task::find($id);
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        return redirect("/tasks");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // deleteでtasks/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $task = \App\Task::find($id);
        
        if (\Auth::user()->id === $task->user_id) {
            $task->delete();
        }
        
        return redirect("/tasks");
    }
}
