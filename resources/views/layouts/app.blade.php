<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tasklist</title>
    </head>
    <body>
        {{-- エラーメッセージの表示 --}}
        @include("commons.error_tasks")
        
        {{-- section ~ endsectionの間の文字を埋め込む --}}
        @yield("content")
    </body>
</html>