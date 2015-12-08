<!DOCTYPE html>
<html>
<head>
    <title class="title">
	@yield('title', "Problem #4&#8212;Final Project")
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
    <link href="/p4.css"  rel="stylesheet" />
    @yield('head')
</head>

<body>

<div class="container">

  <header class="title">
	<img src="/ioc_logo.gif" alt="IOC logo" >
	<br>
	<br>
	<br>
    </header>

   <nav>
        <ul>
          @if(Auth::check())
            <li><a href='/'>Home</a></li>
            <li><a href='/research/add'>Submit Paper/Poster</a></li>
            <li><a href='/research/edit'>Edit Submission</a></li>
<!--            <li><a href='/authors/edit'>Edit Authors</a></li>    -->
            <li><a href='/research/delete'>Delete Submission</a></li>
            <li><a href='/logout'>Log Out</a></li>
          @else
            <li><a href='/'>Home</a></li>
            <li><a href='/eligibility'>Eligibility</a></li>
            <li><a href='/guidelines'>Guidelines</a></li>
            <li><a href='/poster'>Past Poster Winners</a></li>
            <li><a href='/paper'>Past Paper Submissions</a></li>
            <li><a href='/login'>Log In</a></li>
            <li><a href='/register'>Register</a></li>
          @endif
        </ul>
    </nav>

	<br>
	<br>
<section>
        @yield('content')
</section>

<br>


<footer class="footer">
	<p>© 2015 Copyright Institute of Coaching at McLean Hospital | 115 Mill Street, Belmont, MA 02478 | Phone: 800 381-4955 Fax: (617) 580-3965</p>
</footer>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="/slick/slick.min.js"></script>
<script src="/ioc.js"></script>
	@yield('body')

</body>
</html>
