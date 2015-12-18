@extends('layouts.master')

@section('content')

  <h2>Register</h2>

  <p class='bold'> Already have an account? <a href='/login'>Login here....</a></p>

  @if(count($errors) > 0)
    <ul class='errors'>
        @foreach ($errors->all() as $error)
          <li><span class='fa fa-exlamation-circle'></span> {{ $error }}</li>
        @endforeach
    </ul>

@endif

<form method='POST' action='register'>
  {!! csrf_field() !!}

  <div class='form-group'>
    <label for'name' class='bold'>Name:&nbsp;&nbsp;</label>
    <input type='text' name='name' id='name' value='{{ old('name') }}'>
  </div>

  <div class='form-group'>
    <label for'email' class='bold'>Email:&nbsp;&nbsp;</label>
    <input type='text' name='email' id='email' value='{{ old('email') }}'>
  </div>

  <div class='form-group'>
    <label for'password' class='bold'>Password:&nbsp;&nbsp;</label>
    <input type='password' name='password' id='password'>
  </div>

  <div class='form-group'>
    <label for'password_confirmation' class='bold'>Confirm Password:&nbsp;&nbsp;</label>
    <input type='password' name='password_confirmation' id='password_confirmation'>
  </div>
<br>
  <button type='submit' class='btn btn-primary bold'>Register</button>

</form>

@stop
