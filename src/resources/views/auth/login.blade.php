@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<div class="login__content">
  <div class="login-form__heading content__heading">
    <p>ログイン</p>
  </div>
  <form class="form form__wrapper" action="/login" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" value="{{ old('email') }}"  placeholder="メールアドレス">
        </div>
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="password" name="password"  placeholder="パスワード">
        </div>
        <div class="form__error">
          @error('password')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">ログイン</button>
    </div>
  </form>
  <div class="register__link link-content">
    <p class="register-info info-text">アカウントをお持ちでない方はこちらから</p>
    <a class="register__button-submit link-button" href="/register">会員登録</a>
  </div>
</div>
@endsection