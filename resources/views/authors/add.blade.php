@extends('layouts.master')


<!-- Author form to add authors associated with research papers and posters -->


@section('content')

<div class="content">

<h1>Coaching in Leadership and Healthcare 2016: Poster Application</h1>

<p>Please provide information for the primary and additional authors for the ressearch paper or poster to be submitted for the Coaching in Leadership and Healthcare 2016 conference, scheduled September 16-17, 2016.</p>

<br>


@if(count($errors)  > 0)
  <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
  </ul>
@endif

<div id="flash_message"></div>

<!-- Form to gather user data -->

<form method="POST" id="authorform" action="/authors/add">


<!-- CSRF token for safety -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" >

    <input type="hidden" form="authorform" name="research_id" value=" {{ session('research_id') }}  " >

        <fieldset>
            <legend>Primary Author Contact Information</legend>
            <label>* First Name:</label>
              <input type="text"
                form="authorform"
                id="first1"
                name="first1"
                placeholder="First Name"
                value='{{ old('first1', '') }}'>&nbsp;&nbsp;&nbsp;
            <label>* Last Name:</label>
              <input type="text"
                form="authorform"
                id="last1"
                name="last1"
                placeholder="Last Name"
                value='{{ old('last1', '') }}'>&nbsp;&nbsp;
            <label>* Organization</label>
              <input type="text"
                form="authorform"
                id="organization1"
                name="organization1"
                placeholder="Institutional Affiliation"
                size="45"
                value='{{ old('organization1', '') }}' >&nbsp;&nbsp;
             <label>* Email</label>
              <input type="email1"
                form="authorform"
                id="email1"
                name="email1"
                size="30"
                placeholder="Email"
                value='{{ old('email1', '') }}' >&nbsp;&nbsp;
        </fieldset>
    <br>
    <br>
        <fieldset>
            <legend>Secondary Authors Contact Information</legend>
            <label>* First Name:</label>
              <input type="text"
                form="authorform"
                id="first2"
                name="first2"
                placeholder="First Name"
                value='{{ old('first2', '') }}'>&nbsp;&nbsp;&nbsp;

            <label>* Last Name:</label>
              <input type="text"
                form="authorform"
                id="last_name2"
                name="last2"
                size="35"
                placeholder="Last Name"
                value='{{ old('last2', '') }}'>&nbsp;&nbsp;&nbsp;

            <label>* Organization:</label>
              <input type="text"
                form="authorform"
                  id="organization2"
                  name="organization2"
                  size="55"
                  placeholder="Institutional Affiliation"
                  value='{{ old('organization2', '') }}'>&nbsp;&nbsp;&nbsp;

            <label>* Email:</label>
              <input type="email"
                form="authorform"
                id="email2"
                name="email2"
                size="35"
                placeholder="Email"
                value='{{ old('email2', '') }}' >&nbsp;&nbsp;&nbsp;
        <br>
        <br>
      </fieldset>


<br>
<input id="submit-btn" type ="submit" value="SUBMIT">
</form>
<br>
<br>
   </div>  <!-- content -->

@stop
