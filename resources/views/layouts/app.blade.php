<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Invest Ed OK STARS Program</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12777053-2"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'UA-12777053-2');
	</script>

</head>
<body>
	@if(\Auth::check())
	<?php
		$messages = \App\SiteMessage::where('take_down', '>', \Carbon\Carbon::now())->get();
	?>
		@if($messages)
			@foreach($messages as $message)
				@if($message->target == 2 || $message->target == \Auth::user()->type)
				<div class="callout primary"><p><strong>Message From STARS</strong> {{ nl2br($message->message) }}</p></div>
				@endif
			@endforeach
		@endif
	@endif
	<header>
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-middle">
				<div class="small-6 medium-6 cell">
					<a href="/" class="logo">Stars</a>
					@if(\Auth::check())
						<div class="name">{{ \Auth::user()->name }}</div>
						@if(\Auth::user()->risk)
						<div class="risk">
							{{ \Auth::user()->risk }} Risk Tolerance
						</div>
						@endif
					@endif
				</div>
				<div class="small-6 medium-6 cell text-right">
				@if(\Auth::check())
					<nav>
						@if(\Auth::user()->type == 1)
						<a href="/">Home</a>
						<a href="/students">Students</a>
						<a href="/resources">Resources</a>
						@endif
						@if(\Auth::user()->type == 0)
						<a href="/">Portfolios</a>
						<a href="/research">Research</a>
						@endif
						@if(\Auth::user()->hasTeacher() || \Auth::user()->type == 1)
						<?php
							$unread = \App\Message::where('recipient_id',\Auth::user()->id)->where("read",0)->count();
						?>
						<a href="/messages">Messages</a>
						@if($unread > 0)
							<span class="unread badge">{{ $unread }}</span>
						@endif
						@endif
						@if(\Auth::user()->type == 2)
						<a href="/resources">Resources</a>
						<a href="/checkins">Check Ins</a>
						<a href="/certifications">Certifications</a>
						<a href="/day-one-survey-results">Day 1 Surveys</a>
						<a href="/day-two-survey-results">Day 2 Surveys</a>
						@endif
						<a href="/settings">Settings</a>
						<a href="/logout">Log Out</a>
					</nav>
				@endif
				</div>
			</div>
		</div>
	</header>

  <div id="app">
    <main>
      @yield('content')
    </main>
  </div>
  
  <footer>
  	<div class="grid-x grid-padding-x align-middle">
  		<div class="small-12 cell text-center">
  			<div class="copyright">
  				&copy;{{ \Carbon\Carbon::now()->format('Y') }} Invest Ed<span class="reg">®</span>, All Rights Reserved.<br>
				<a href="/privacy">Privacy Policy</a> | <a href="/legal">Legal Notice</a> | Site By <a href="https://www.wearenominee.com" target="_blank">Nominee</a>
  			</div>
  		</div>
  	</div>
  </footer>
</body>
</html>
