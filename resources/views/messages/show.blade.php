@extends('layouts.app')

@section('content')

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<h1>Messages</h1>
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has($msg))
				      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
				      @endif
				    @endforeach
					</div>
				</div>
			
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-4 cell">
					<div id="compose">
						<form action="/post-message" method="post">
							@csrf
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<textarea name="text"></textarea>
								</div>
							</div>
							<input type="hidden" name="recipient_id" value="{{ $recipient }}" />
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<button type="submit" class="button">Post Message</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="small-12 medium-8 cell">
					<div id="messages">
						<section>
							<div id="messages-container">
								@foreach($messages as $message)
								<div class="grid-x grid-padding-x">
									<div class="small-12 cell {{ ($message->user_id == \Auth::user()->id) ? 'text-right' : '' }}">
										<div class="message {{ ($message->user_id == \Auth::user()->id) ? 'your-message' : '' }}">
											<p>{{ $message->text }}</p>
											<div class="message-details">{{ ($message->user_id == \Auth::user()->id) ? 'You' : \App\User::find($message->user_id)->name }} – {{ Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
