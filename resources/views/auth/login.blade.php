@extends('layouts.app', ['title' => 'ログイン'])

@section('content')

<h1>ログイン</h1>

<form method="POST" action="/login" class="login-form">
    @csrf

    <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" class="form-input">
        @error('email')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" class="form-input">
    </div>

    <button type="submit" class="create-button">ログイン</button>
</form>

@endsection