@extends('layout')
@section('content')
    <h1>New Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>PhoneNumber:</strong> {{ $data['phonenumber'] }}</p>

    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>
@endsection