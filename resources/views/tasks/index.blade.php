{{-- extends("layouts.app") :共通レイアウト(layous/app.blade.php)を呼び出す --}}
@extends("layouts.app")

{{-- section('content') ~ endsection　の間の文章をyield('content')へ埋め込む --}}
@section("content")

    <h1>タスク一覧</h1>
    
    @if (count($tasks) > 0)
        <ul>
            @foreach ($tasks as $task)
                {{-- ["id" => $task->id]　は　"tasks.show"へ送るデータ　("id"が1の場合は1の詳細ページへ行く) --}}
                <li>{!! link_to_route("tasks.show", $task->id, ["id" => $task->id]) !!} : {{ $task->status }} > {{ $task->content }}</li>
            @endforeach
        </ul>
    @endif
    {!! link_to_route("tasks.create", "新規タスクの投稿") !!}

@endsection