@extends('layouts.master')

@section('content')

<h2>Login</h2>

<p class='bold'>Don't have an account? <a href='/register'>Register here...</a></p>
<br>

@if(count($errors) > 0)
  <ul class='errors'>
    @foreach ($errors->all() as $error)
      <li><span class='fa fa-­exclamation-­circle'></span> {{ $error }}</li>
    @endforeach
  </ul>
@endif

<form method='POST' action='/login'>

  {!! csrf_field()!!}

    <div class='form-­group'>
      <label for='email' class="bold">Email:&nbsp;</label>
      <input  type='text'
              name='email'
              id='email'
              value='{{ old('email') }}'>
    </div>

    <div class='form-­group'>
      <label for='password' class="bold">Password:&nbsp;</label>
      <input type='password'
            name='password'
            id='password'
            value='{{ old('password') }}'>
    </div>
<br>
    <div class='form-­group'>
      <input type='checkbox'
             name='remember'
             id='remember'>
      <label for='remember' class='checkboxLabel bold'>Remember me</label>
   </div>
<br>
   <button type='submit' class='btn btn-­primary bold'>Login</button>
 </form>
@stop
