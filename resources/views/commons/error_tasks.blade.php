{{-- エラーメッセージの表示 ($this->validate() を書くと、自動的に $errors 変数にエラーメッセージが格納される) 9.1--}}
@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif