@extends('layouts.app')

@section('content')

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<h1>Message All Your Students</h1>
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has($msg))
				      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
				      @endif
				    @endforeach
					</div>
				</div>
			
			<div class="grid-x grid-padding-x">
				<div class="small-12 medium-6 cell">
					<div id="compose">
						<form action="/message-all" method="post">
							@csrf
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<textarea name="text"></textarea>
								</div>
							</div>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<button type="submit" class="button">Post Message</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
