@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="attendance-table">
  <table class="attendance-table__wrapper">
    <tr class="attendance-table__row">
      <th class="attendance-table__header">名前</th>
      <th class="attendance-table__header">勤務開始</th>
      <th class="attendance-table__header">勤務終了</th>
      <th class="attendance-table__header">休憩時間</th>
      <th class="attendance-table__header">勤務時間</th>
    </tr>
    @foreach($timestamps as $timestamp)
    <tr>
      <td>{{ $timestamp->user->name }}</td>
      <td>{{ $timestamp->work_start }}</td>
      <td>{{ $timestamp->work_end }}</td>
      <td>{{ $timestamp->break_time }}</td>
      <td>{{ $timestamp->work_time}}</td>
    </tr>
    @endforeach
  </table>
</div>
@endsection