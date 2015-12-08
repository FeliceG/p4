@extends('layouts.master')

<!-- Author form to add authors associated with research papers and posters -->


@section('content')


<h1>Coaching in Leadership and Healthcare 2016: Poster Application</h1>

<div class="content">
	<p>Thank you for your research submission for consideration in the Coaching in Leadership and Healthcare 2016 conference, scheduled September 16-17, 2016.
	Your submission is listed below. To make changes to your submission, click the "Edit" button below.</p>

		@if(count($errors)  > 0)
		  <ul>
		      @foreach ($errors->all() as $error)
		        <li>{{ $error }}</li>
		      @endforeach
		  </ul>
		@endif

<div id="flash_message"></div>

		<!-- Form to gather user data -->

		<br>
				<form method="POST" id="research_form" action="/research/show">

				<!-- CSRF token for safety -->
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
				<input type="hidden" name="research_id" value=" {{ $research->id }} " >

				<br>
						<fieldset>
								<legend>Research Information</legend>
								<p>Your submission is for a research: {{ $research->type }} </p>
								<p>Title: {{ $research->title }} </p>
								<p>Background and Objectives: {{ $research->background }} </p>
								<p>Design and Methods: {{ $research->design }} </p>
								<p>Findings: {{ $research->findings }} </p>
								<p>Discussion: {{ $research->discussion }} </p>
								<p>Impact on Coaching Practice: {{ $research->impact }} </p>
						  	<p>Abstract: {{ $research->abstract }} </p>
								<br>


						</fieldset>
<br>
						<fieldset>
								<legend>Authors</legend>
									<br>
													@foreach($research->author as $author)
														Name: {{ $author['first_name'] }} {{ $author['last_name'] }}<br>
														Organization: {{ $author['organization'] }}<br>
														Email: {{ $author['email'] }}<br>
													  <br>
													@endforeach
														</p>
												</fieldset>

				<br>
				<input type ="submit" value="EDIT">
				</form>
</div>
@stop
