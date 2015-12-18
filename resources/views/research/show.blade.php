@extends('layouts.master')

<!-- Author form to add authors associated with research papers and posters -->


@section('content')

<div class="content">
	<h2>Coaching in Leadership and Healthcare 2016: Poster Application</h2>

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
								<legend><span class="bold">Research Information</span></legend>
								<p><span class="bold">Your submission is for a research:</span> {{ $research->type }} </p>
								<p><span class="bold">Title:</span> {{ $research->title }} </p>
								<p><span class="bold">Background and Objectives:</span> {{ $research->background }} </p>
								<p><span class="bold">Design and Methods:</span> {{ $research->design }} </p>
								<p><span class="bold">Findings:</span> {{ $research->findings }} </p>
								<p><span class="bold">Discussion:</span> {{ $research->discussion }} </p>
								<p><span class="bold">Impact on Coaching Practice: </span>{{ $research->impact }} </p>
						  	<p><span class="bold">Abstract:</span> {{ $research->abstract }} </p>
								<br>


						</fieldset>
<br>
						<fieldset>
								<legend><span class="bold">Authors</span></legend>
									<br>
													@foreach($research->author as $author)
														<span class="bold">Name:</span> {{ $author['first_name'] }} {{ $author['last_name'] }}<br>
														<span class="bold">Organization:</span> {{ $author['organization'] }}<br>
														<span class="bold">Email:</span> {{ $author['email'] }}<br>
													  <br>
													@endforeach
														</p>
												</fieldset>

				<br>
				<input type ="submit" value="EDIT">
				</form>
</div>
@stop
