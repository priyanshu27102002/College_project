@extends('page_layouts.pagelayout')

@section('content')
<div class="container">
    <span class="text1">Welcome {{ $studentName ?? 'Student' }}</span><br>
    <span class="text2">Take The Test To Get The Best Platform For Your Career</span><br><br>
    <span class="text3">
        <form action="{{ route('students.dashboard') }}" method="GET">
            @csrf
            <button type="submit">Click here to Take the test</button>
        </form>
        <form method="POST" action="{{route('logoutstudent.post')}}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </span>
</div>
@endsection