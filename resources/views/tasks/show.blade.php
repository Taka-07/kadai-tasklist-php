{{-- extends("layouts.app") :共通レイアウト(layous/app.blade.php)を呼び出す --}}
@extends("layouts.app")

{{-- section('content') ~ endsection　の間の文章をyield('content')へ埋め込む --}}
@section("content")

    <h1>id = {{ $task->id }}のタスク詳細ページ</h1>
    
    <p>{{ $task->content }}</p>
    
    {!! link_to_route("tasks.edit", "このタスクを編集", ["id" => $task->id]) !!}
    
    {!! Form::model($task, ["route" => ["tasks.destroy", $task->id], "method" => "delete"]) !!}
        {!! Form::submit("削除") !!}
    {!! Form::close() !!}

@endsection