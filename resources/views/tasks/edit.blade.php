{{-- extends("layouts.app") :共通レイアウト(layous/app.blade.php)を呼び出す --}}
@extends("layouts.app")

{{-- section('content') ~ endsection　の間の文章をyield('content')へ埋め込む --}}
@section("content")

    <h1>id: {{ $task->id }}のタスク編集ページ</h1>
    
    {{-- グリッドの設定 --}}
    <div class="low">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            {!! Form::model($task, ["route" => ["tasks.update", $task->id], "method" => "put"]) !!}
    
                {{--フォームを作成--}}
                <div class="form-group">
                    {!! Form::label("status", "status:") !!}
                    {!! Form::text("status", null, ["class" => "form-control"]) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label("content", "タスク:") !!}
                    {!! Form::text("content", null, ["class" => "form-control"]) !!}
                </div>
        
                {!! Form::submit("更新", ["class" => "btn btn-default"]) !!}
        
            {!! Form::close() !!}
            
            {!! link_to_route("tasks.show", "タスク詳細ページに戻る", ["id" => $task->id], ["class" => "btn btn-default"]) !!}
        </div>
    </div>

@endsection