@extends('layouts.app')

@section('content')
	
	<div id="company-information">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
					<h1>{{ $classification }} Reports</h1>
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
						<table>
							<thead>
								<tr>
									<td>Report Link</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								@foreach($reports as $report)
								<tr>
									<td><a href="{{ asset('storage/'.$report->file) }}#page=2" target="_blank">View Report</a></td>
									<td>
										@if($report->semi_finalist == 1)
											<i class="fas fa-check-circle positive"></i>
											<small><a href="/report/{{ $report->id }}/remove-semifinalist" style="margin-left: 10px;">Un-Mark As Semi-Finalist</a></small>
										@else
											
											<form action="/report/{{ $report->id }}/semifinalist" method="post">
												@csrf
												<button type="submit" class="button small no-margin">Semi-Finalist</button>
											</form>
											
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</section>	
					
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell text-right">
							<a href="/" class="button">Back To All Reports</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection