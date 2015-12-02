@extends('layouts.master')

<!-- Author form to add authors associated with research papers and posters -->


@section('content')
<h1>Coaching in Leadership and Healthcare 2016: Poster Application</h1>

<div class="content">
<p>Please complete the form below to submit your research poster for consideration in the Coaching in Leadership and Healthcare 2016 conference, scheduled September 16-17, 2016.</p>

<!-- Form to gather user data -->

<br>
<form method="POST" id="authorform" action="/show">
<ul class="list">

<!-- CSRF token for safety -->
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >

<fieldset>
<legend>Primary Author Contact Information</legend>
<input type="text" name="first_name" placeholder="First Name">&nbsp;&nbsp;&nbsp;
<input type="text" name="last_name" placeholder="Last Name">&nbsp;&nbsp;&nbsp;
<input type="text" name="institution" placeholder="Institutional Affiliation">&nbsp;&nbsp;&nbsp;
<input type="email" name="email" placeholder="Email">&nbsp;&nbsp;&nbsp;
<input type="tel" name="phone" placeholder="Phone Number">&nbsp;&nbsp;&nbsp;
</fieldset>

<br>
<fieldset id="second_authors">
<legend>Secondary Authors Contact Information</legend>
<input type="text" name="first_name" placeholder="First Name">&nbsp;&nbsp;&nbsp;
<input type="text" name="last_name" placeholder="Last Name">&nbsp;&nbsp;&nbsp;
<input type="text" name="institution" placeholder="Institutional Affiliation">&nbsp;&nbsp;&nbsp;
<input type="email" name="email" placeholder="Email">&nbsp;&nbsp;&nbsp;
<input type="tel" name="phone" placeholder="Phone Number">&nbsp;&nbsp;&nbsp;
</fieldset>
<br>
<fieldset>
<legend>Research Information</legend>
<p>Please indicate if you are submitting a <span class="bold">PAPER</span> or <span class="bold">POSTER</span>:<select name="paper_poster">
			      <option value="paper">PAPER</option>
			      <option value="poster">POSTER</option>
					           </select>
<br>
<br>
<span class="bold">Title</span><br>
<input type="text" name="title" placeholder="Enter title"><br>

<br>
<span class="bold">Background and Objectives</span><br>
<textarea rows="7" cols="120" name="title" form="authorform" placeholder="Please provide information in 150 words or less."></textarea><br>

<br>
<span class="bold">Design and Methods</span><br>
<textarea rows="7" cols="120" name="design" form="authorform" placeholder="Please provide information in 150 words or less."></textarea><br>

<br>
<span class-"bold">Findings</span><br>
<textarea rows="7" cols="120"  name="findings" form="authorform" placeholder="Please provide information in 150 words or less."></textarea><br>

<br>
<span class="bold">Discussion</span><br>
<textarea rows="7" cols="120" name="discussion" form="authorform" placeholder="Please provide information in 150 words or less."></textarea><br>

<br>
<span class="bold">Impact on Coaching Practice</span><br>
<textarea rows="7" cols="120" name="impact" form="authorform" placeholder="Please provide information in 150 words or less."></textarea><br>

<br>
<span class="bold">Abstract</class><br>
<textarea rows="7" cols="120" "name="abstract" form="authorform" placeholder="Please provide information in 150 words or less."></textarea><br>

</fieldset>

<br>
<input type ="submit" value="SUBMIT">
</form>

</div>
@stop
