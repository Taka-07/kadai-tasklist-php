{{-- extends("layouts.app") :共通レイアウト(layous/app.blade.php)を呼び出す --}}
@extends("layouts.app")

{{-- section('content') ~ endsection　の間の文章をyield('content')へ埋め込む --}}
@section("content")

    <h1>id: {{ $task->id }}のタスク編集ページ</h1>
    
    {!! Form::model($task, ["route" => ["tasks.update", $task->id], "method" => "put"]) !!}
    
        {!! Form::label("status", "status:") !!}
        {!! Form::text("status") !!}
        
        {!! Form::label("content", "タスク:") !!}
        {!! Form::text("content") !!}
        
        {!! Form::submit("更新") !!}
        
    {!! Form::close() !!}

@endsection