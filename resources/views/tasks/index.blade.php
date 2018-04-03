{{-- extends("layouts.app") :共通レイアウト(layous/app.blade.php)を呼び出す --}}
@extends("layouts.app")

{{-- section('content') ~ endsection　の間の文章をyield('content')へ埋め込む --}}
@section("content")

    <h1>タスク一覧</h1>
    
    @if (count($tasks) > 0)
        {{-- テーブルを作成 --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>status</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        {{-- ["id" => $task->id]　は　"tasks.show"へ送るデータ　("id"が1の場合は1の詳細ページへ行く) --}}
                        <td>{!! link_to_route("tasks.show", $task->id, ["id" => $task->id]) !!}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->content }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{-- 「新規タスクの投稿」リンクボタンの作成 (新規タスクにidはまだ無いので第三引数のパラメータにnullが入る) 7.5 --}}
    {!! link_to_route("tasks.create", "新規タスクの投稿", null, ["class" => "btn btn-primary"]) !!}

@endsection