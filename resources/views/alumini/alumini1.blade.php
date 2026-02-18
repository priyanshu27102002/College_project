@extends('page_layouts.pagelayout')
@section('content')
<div class="container">
      <span class="text1">Congratulations  {{ $aluminiName ?? 'Alumni' }} for Your Success</span><br>
      <span class="text2">Please take the psycomtric test to help the aspiring students to be successful</span><br><br>
      <span class="text3">
        <form action="">
            <button type="button" class="btn btn-danger"> Take the test</button>
        </form>
        
        <form method="POST" action="{{route('logoutalumini.post')}}" style="padding:20px">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form></span>

@endsection      