@extends('layouts.app')

@section('content')
	
	<div id="company-information">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
					<h1>Checkins</h1>
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					      @if(Session::has($msg))
					      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
					      @endif
					    @endforeach
						</div>
					</div>
				
					
					<section>					
						<div class="table-scroll">
						<table>
							<thead>
								<tr>
									<td>Date</td>
									<td>Name</td>
									<td>Morning</td>
									<td>Afternoon</td>
								</tr>
							</thead>
							<tbody>
								@foreach($checkins as $checkin)
								<tr>
									<td><strong>{{ $checkin->date }}</strong></td>
									<td>{{ $checkin->first_name }} {{ $checkin->last_name }}</td>
									<td>
										@if(!$checkin->morning)
											<form action="/checkin/{{ $checkin->id }}/morning" method="post">
												@csrf
												<button type="submit" class="button" style="margin: 0px;">Check In</button>
											</form>
										@else
											{{ \Carbon\Carbon::parse($checkin->morning)->format("g:ia") }}
										@endif
									</td>
									<td>
										@if(!$checkin->afternoon)
											<form action="/checkin/{{ $checkin->id }}/afternoon" method="post">
												@csrf
												<button type="submit" class="button" style="margin: 0px;">Check In</button>
											</form>
										@else
											{{ \Carbon\Carbon::parse($checkin->afternoon)->format("g:ia") }}
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						</div>
					</section>	
					
				</div>
			</div>
		</div>
	</div>

@endsection