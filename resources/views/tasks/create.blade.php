{{-- extends("layouts.app") :共通レイアウト(layous/app.blade.php)を呼び出す --}}
@extends("layouts.app")

{{-- section('content') ~ endsection　の間の文章をyield('content')へ埋め込む --}}
@section("content")

    <h1>タスク新規作成ページ</h1>
    
    {{-- グリッドの設定 --}}
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            {{-- この$taskは何のレコードも入っていないインスタンス　空箱 --}}
            {{-- フォームの入力内容は"tasks.store"へ送られ、$requestに入る 8.5 --}}
            {!! Form::model($task, ["route" => "tasks.store"]) !!}
    
                {{--フォームを作成--}}
                <div class="form-group">
                    {!! Form::label("status", "status:") !!}
                    {!! Form::text("status", null, ["class" => "form-control"]) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label("content", "タスク:") !!}
                    {!! Form::text("content", null, ["class" => "form-control"]) !!}
                </div>
        
                {!! Form::submit("投稿", ["class" => "btn btn-primary"]) !!}
        
            {!! Form::close() !!}
            
            {!! link_to_route("tasks.index", "タスク一覧に戻る", null, ["class" => "btn btn-default"]) !!}
        </div>
    </div>

@endsection