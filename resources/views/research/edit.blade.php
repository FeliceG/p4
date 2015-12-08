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
				<form method="POST" id="researchEdit_form" action="/research/edit">

				<!-- CSRF token for safety -->
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >

				@foreach($researches as $research)

				<input type="hidden" name="research_id" value=" {{ $research->id }} " >

				<br>
						<legend>Research Information</legend>
						<p>Please indicate if you are submitting a <span class="bold">PAPER</span> or <span class="bold">POSTER</span>:   <select form="researchEdit_form" name="paper_poster" value="{{ $research->paper_poster }}">
									      <option value="paper">PAPER</option>
									      <option value="poster">POSTER</option>
											           </select>
						<br>

						<br>
						<span class="bold">Title</span><br>
						<input type="text" form="researchEdit_form" name="title" id="title" size="175" placeholder="Enter title" value='{{  $research->title }}' ><br>

						<br>
						<span class="bold">Background and Objectives</span><br>
						<textarea rows="7" cols="120" name="background" id="background" form="researchEdit_form" value='{{ old('background', '') }}' > {{ $research->background }} </textarea><br>

						<br>
						<span class="bold">Design and Methods</span><br>
						<textarea rows="7" cols="120" name="design" id="design" form="researchEdit_form" value='{{ old('design', '') }}' placeholder="Please provide information in 300 words or less.">{{ $research->design }}</textarea><br>

						<br>
						<span class-"bold">Findings</span><br>
						<textarea rows="7" cols="120"  name="findings" id="findings" value='{{ old('findings', '') }}' form="researchEdit_form" placeholder="Please provide information in 300 words or less.">{{ $research->findings }}</textarea><br>

						<br>
						<span class="bold">Discussion</span><br>
						<textarea rows="7" cols="120" name="discussion" id="discussions" value='{{ old('discussion', '') }}' form="researchEdit_form" placeholder="Please provide information in 300 words or less.">{{ $research->discussion }}</textarea><br>

						<br>
						<span class="bold">Impact on Coaching Practice</span><br>
						<textarea rows="7" cols="120" name="impact" id="impact" value='{{ old('impact', '') }}' form="researchEdit_form" placeholder="Please provide information in 300 words or less.">{{ $research->impact }}</textarea><br>

						<br>
						<span class="bold">Abstract</class><br>
						<textarea rows="7" cols="120" name="abstract" id="abstract" value='{{ old('abstract', '') }}' form="researchEdit_form" placeholder="Please provide information in 150 words or less."> {{ $research->abstract }} </textarea><br>

						@endforeach

						</fieldset>

								<?php $i='0'; ?>

								@foreach($authors as $author)
								<fieldset>
								<legend>Author Contact Information</legend>
								<?php $i=++$i; ?>
								<label>* First Name:</label>
									<input type="text"
										form="researchEdit_form"
										id="first"
										name="<?php echo 'first' . $i ?>"
										placeholder="First Name"
										value='{{ $author->first_name }}'>&nbsp;&nbsp;&nbsp;
								<label>* Last Name:</label>
									<input type="text"
										form="researchEdit_form"
										id="last"
										name="<?php echo 'last' . $i ?>"
										placeholder="Last Name"
										value='{{ $author->last_name }}'>&nbsp;&nbsp;
								<label>* Organization</label>
									<input type="text"
										form="researchEdit_form"
										id="organization"
										name="<?php echo 'organization' . $i ?>"
										placeholder="Institutional Affiliation"
										size="45"
										value='{{ $author->organization }}' >&nbsp;&nbsp;
								 <label>* Email</label>
									<input type="email"
										form="researchEdit_form"
										id="email"
										name="<?php echo 'email' . $i ?>"
										size="30"
										placeholder="Email"
										value='{{ $author->email }}' >&nbsp;&nbsp;
										<input type="hidden"
											form="researchEdit_form"
											name="<?php echo 'id' . $i ?>"
											placeholder="First Name"
											value='{{ $author->id }}'>
						</fieldset>
						<br>
						<br>
						@endforeach


				<br>
				<input type ="submit" value="SUBMIT">
				</form>
</div>
@stop
