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
				<div class="small-12 cell">
					<div class="grid-x grid-padding-x small-up-2 medium-up-3">
						@foreach($students as $student)
						<a href="/messages/{{ $student->id }}" class="cell">
							<section class="home current-stats">
								<?php
									$unread = \App\Message::where('user_id',$student->id)->where("read",0)->count();
								?>
								@if($unread > 0)
									<span class="unread badge">{{ $unread }}</span>
								@endif
								<h2>{{ $student->name }}</h2>
							</section>
						</a>
						@endforeach
						<a href="/message-all" class="cell">
							<section class="home current-stats">
								<h2>Message All Students</h2>
							</section>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
