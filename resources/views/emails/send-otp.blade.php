@extends('emails.layouts.master')

@section('content')
<div style="text-align: left;">
    <div style="padding-bottom: 20px;"><img src="https://i.ibb.co/Qbnj4mz/logo.png" alt="Company" style="width: 56px;"></div>
  </div>
  <div style="padding: 20px; background-color: rgb(255, 255, 255);">
    <div style="color: rgb(0, 0, 0); text-align: left;">
      <h1 style="margin: 1rem 0">{{ $details['title'] }}.</h1>
      {{-- <p style="padding-bottom: 16px"></p> --}}
      <p style="padding-bottom: 16px">
        {{ $details['body'] }}
        </p>
      <p style="padding-bottom: 16px">If you didn’t ask to verify this address, you can ignore this email.</p>
      <p style="padding-bottom: 16px">Thanks,<br>The Asrez team</p>
    </div>
  </div>
  <div style="padding-top: 20px; color: rgb(153, 153, 153); text-align: center;">
    
  </div>
@endsection
