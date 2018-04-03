{{-- extends("layouts.app") :共通レイアウト(layous/app.blade.php)を呼び出す --}}
@extends("layouts.app")

{{-- section('content') ~ endsection　の間の文章をyield('content')へ埋め込む --}}
@section("content")

    <h1>id = {{ $task->id }}のタスク詳細ページ</h1>
    
    {{-- テーブルを作成 --}}
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>status</th>
            <td>{{ $task->status }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>
    
    {{-- リンクボタンの作成 --}}
    {!! link_to_route("tasks.edit", "このタスクを編集", ["id" => $task->id], ["class" => "btn btn-default"]) !!}
    
    {!! Form::model($task, ["route" => ["tasks.destroy", $task->id], "method" => "delete"]) !!}
        {!! Form::submit("削除", ["class" => "btn btn-danger"]) !!}
    {!! Form::close() !!}

@endsection