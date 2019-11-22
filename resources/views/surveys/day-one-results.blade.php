@extends('layouts.app')

@section('content')
	
	<div id="research">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					      @if(Session::has($msg))
					      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
					      @endif
					    @endforeach
						</div>
					</div>
				
					<h1>Day 1 Survey Results</h1>

					
					<section>
						<div class="table-scroll">
							<table>
								<thead>
									<tr>
										<td>My overall Impression of the material covered today</td>
										<td>My overall impression of the Instructors</td>
										<td>Comments</td>
										<td>Instructor - Matt Ingram</td>
										<td>Organization of instructor’s presentation</td>
										<td>Conciseness of Instructor’s presentation</td>
										<td>Instructor’s knowledge of course content</td>
										<td>Instructor’s ability to keep class focused</td>
										<td>Presentation style of the instructor</td>
										<td>Comments</td>
										<td>Instructor - Marquita Seifried</td>
										<td>Organization of instructor’s presentation</td>
										<td>Conciseness of Instructor’s presentation</td>
										<td>Instructor’s knowledge of course content</td>
										<td>Instructor’s ability to keep class focused</td>
										<td>Presentation style of the instructor</td>
										<td>Comments</td>
									</tr>
								</thead>
								<tbody>
									@foreach($surveys as $survey)
									<tr>
										<td>{{ $survey->q1 }}</td>
										<td>{{ $survey->q2 }}</td>
										<td>{{ $survey->comments1 }}</td>
										<td></td>
										<td>{{ $survey->q3 }}</td>
										<td>{{ $survey->q4 }}</td>
										<td>{{ $survey->q5 }}</td>
										<td>{{ $survey->q6 }}</td>
										<td>{{ $survey->q7 }}</td>
										<td>{{ $survey->comments2 }}</td>
										<td></td>
										<td>{{ $survey->q8 }}</td>
										<td>{{ $survey->q9 }}</td>
										<td>{{ $survey->q10 }}</td>
										<td>{{ $survey->q11 }}</td>
										<td>{{ $survey->q12 }}</td>
										<td>{{ $survey->comments3 }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<p class="disclaimer">Scroll to the right to see more results.</p>
						</div>
					</section>
					
				</div>
			</div>
		</div>
	</div>

@endsection