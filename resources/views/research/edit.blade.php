@extends('layouts.master')

<!-- Author form to add authors associated with research papers and posters -->


@section('content')
<h1>Coaching in Leadership and Healthcare 2016: Poster Application</h1>

<div class="content">
	<p>Please provide information for your research submission (paper or poster) for consideration in the Coaching in Leadership and Healthcare 2016 conference, scheduled September 16-17, 2016. After providing the requested information for your research paper or poster, you'll be directed to the form to input author information.</p>

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
				<form method="POST" id="research_form" action="/research/edit">

				<!-- CSRF token for safety -->
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
				<input type="hidden" name="research_id" value="{{ research->research_id }}" >

				<br>
						<legend>Research Information</legend>
						<p>Please indicate if you are submitting a <span class="bold">PAPER</span> or <span class="bold">POSTER</span>:   <select form="research_form" name="paper_poster" value="paper">
									      <option value="paper">PAPER</option>
									      <option value="poster">POSTER</option>
											           </select>
						<br>
						<br>
						<span class="bold">Title</span><br>
						<input type="text" form="research_form" name="title" id="title" size="175" placeholder="Enter title" value='{{ $research->title }}' ><br>

						<br>
						<span class="bold">Background and Objectives</span><br>
						<textarea rows="7" cols="120" name="background" id="background" form="research_form" placeholder="Please provide information in 150 words or less." value='{{ research->background }}' ></textarea><br>

						<br>
						<span class="bold">Design and Methods</span><br>
						<textarea rows="7" cols="120" name="design" id="design" form="research_form" value='{{ research->design }}' placeholder="Please provide information in 300 words or less."></textarea><br>

						<br>
						<span class-"bold">Findings</span><br>
						<textarea rows="7" cols="120"  name="findings" id="findings" value='{{ research->findings }}' form="research_form" placeholder="Please provide information in 300 words or less."></textarea><br>

						<br>
						<span class="bold">Discussion</span><br>
						<textarea rows="7" cols="120" name="discussion" id="discussions" value='{{ research->discussion }}' form="research_form" placeholder="Please provide information in 300 words or less."></textarea><br>

						<br>
						<span class="bold">Impact on Coaching Practice</span><br>
						<textarea rows="7" cols="120" name="impact" id="impact" value='{{ research->discussion }}' form="research_form" placeholder="Please provide information in 300 words or less."></textarea><br>

						<br>
						<span class="bold">Abstract</class><br>
						<textarea rows="7" cols="120" name="abstract" id="abstract" value='{{ research->abstract }}' form="research_form" placeholder="Please provide information in 150 words or less."></textarea><br>

						</fieldset>

				<br>
				<input type ="submit" value="SUBMIT">
				</form>
</div>
@stop
