{{-- extends("layouts.app") :共通レイアウト(layous/app.blade.php)を呼び出す --}}
@extends("layouts.app")

{{-- section('content') ~ endsection　の間の文章をyield('content')へ埋め込む --}}
@section("content")

    <h1>タスク新規作成ページ</h1>
    
    {{-- この$taskは何のレコードも入っていないインスタンス　空箱 --}}
    {{-- フォームの入力内容は"tasks.store"へ送られ、$requestに入る 8.5 --}}
    {!! Form::model($task, ["route" => "tasks.store"]) !!}
    
        {!! Form::label("status", "status:") !!}
        {!! Form::text("status") !!}
        
        {!! Form::label("content", "タスク:") !!}
        {!! Form::text("content") !!}
        
        {!! Form::submit("投稿") !!}
        
    {!! Form::close() !!}

@endsection