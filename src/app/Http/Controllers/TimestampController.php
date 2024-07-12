<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Timestamp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimestampController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function workStart()
    {
        $user = Auth::user();
        $timestamp = Timestamp::create([
            'user_id' => $user->id,
            'work_start' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function workEnd()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->first();
        $timestamp->update([
            'work_end' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function breakStart()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->first();
        $break_start = Carbon::now();
        session(['break_start' => $break_start]);

        return redirect()->back();
    }

    public function breakEnd()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->first();
        $break_end = Carbon::now();
        session(['break_end' => $break_end]);

        return redirect()->back();
    }

    public function attendance()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->first();
        $timestamps = Timestamp::all();

        $break_start = session('break_start');
        $break_end = session('break_end');

        if($break_start && $break_end) {
            $break_start = Carbon::parse($break_start);
            $break_end = Carbon::parse($break_end);
            $break_time = $break_end->diff($break_start)->format('%H:%I:%S');
            $timestamp->update(['break_time' => $break_time]);
        }

        $work_start = Timestamp::where('user_id', $user->id)->value('work_start');
        $work_end = Timestamp::where('user_id', $user->id)->value('work_end');
        $break_time = Timestamp::where('user_id', $user->id)->value('break_time');

        if($work_start && $work_end && $break_time) {
            $work_start = Carbon::parse($work_start);
            $work_end = Carbon::parse($work_end);
            $break_time = Carbon::parse($break_time);

            $total_work_seconds = $work_end->diffInSeconds($work_start);

            $break_time_seconds = $break_time->hour * 3600 + $break_time->minute * 60 + $break_time->second;

            $work_time_seconds = $total_work_seconds - $break_time_seconds;

            $work_time = gmdate('H:i:s', $work_time_seconds);
            $timestamp->update(['work_time' => $work_time]);
    }

        return view('attendance', compact('timestamps'));
    }
}
