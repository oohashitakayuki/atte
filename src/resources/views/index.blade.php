@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="timestamp-table">
  <p class="timestamp__auth-message">
    {{ Auth::user()->name }}さんお疲れ様です！
  </p>
  <div class="timestamp-table__wrapper">
    <form class="timestamp__button" action="/work-start" method="post">
      @csrf
      <button class="timestamp__button-submit" type="submit" name="work-start">勤務開始</button>
    </form>
    <form class="timestamp__button" action="/work-end" method="post">
      @csrf
      <button class="timestamp__button-submit" type="submit" name="work-end">勤務終了</button>
    </form>
    <form class="timestamp__button" action="/break-start" method="post">
      @csrf
      <button class="timestamp__button-submit" type="submit" name="break-start">休憩開始</button>
    </form>
    <form class="timestamp__button" action="/break-end" method="post">
      @csrf
      <button class="timestamp__button-submit" type="submit" name="break-end">休憩終了</button>
    </form>
  </div>
</div>
@endsection