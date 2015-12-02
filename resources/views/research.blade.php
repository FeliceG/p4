@extends('layouts.master')

<!-- Welcome page and form to gather information on what information to generate -->
<!-- lorem ipsum, users, user birthdate, user email, user bio -->

<div class="left">
</div>

<div class="center">
   	
@section('content')


<div class="container">
<h1>Problem #3&#8212;Developer's Best Friend</h1>
<div class="content">
<p>Welcome to Developer's Best Friend&#8212;the one-stop site to generate fake data for your development needs. You can select the number of paragraphs of Lorem Ipsum and the number of fake users to populate your development projects. In addition, you can generate birthdates, residences, passwords, and biographies for your randomly generated fake users. </p>

<!-- Form to gather user data -->

<br>
<form method="POST" action="/show">
<ul class="list">

<!-- CSRF token for safety -->
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >

<input type="hidden" name="id" value='{{ $book->id }}'>

<li>How many paragraphs of Lorem Ipsum would you like to generate?  <input type="number" name="numLorem" min="1" max="25" value="1"><br></li>
<br>

<li>How many user names would you like to generate?  <input type="number" name="numUsers"  min="0" max="25"  value="1"><br></li>
<br>

<li>Would you like birthdates for your users? <select name="birthdates"> 
						<option value="True">YES</option>
						<option value="False">NO</option>
					       </select> </li>
<br>

<li>Would you like email addresses for your users? <select name="email"> 
						      <option value="True">YES</option>
						      <option value="False">NO</option>
					           </select> </li>
<br>

<li>Would you like short biographies for your users? <select name="bios"><br>
						      <option value="True">YES</option>
						      <option value="False">NO</option>
					             </select> </li>
</ul>
<br>
<input type ="submit" value="SUBMIT">
</form>
               </div>
        </div>
@stop
</div>

<div class="right">
</div>

