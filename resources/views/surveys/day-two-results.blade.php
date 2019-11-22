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
				
					<h1>Day 2 Survey Results</h1>

					
					<section>
						<div class="table-scroll">
							<table>
								<thead>
									<tr>
										<td>Workshop objectives were clear</td>
										<td>Workshop objectives were achieved</td>
										<td>Instructors were easy to follow</td>
										<td>Content and techniques were explained clearly</td>
										<td>Encouragement to actively participate</td>
										<td>Your questions were discussed and answered to your satisfaction</td>
										<td>You received information you can use in your classroom</td>
										<td>You think your students will benefit from the STARs program</td>
										<td>Organization and presentation of materials</td>
										<td>Length of workshop</td>
										<td>Overall impression of the Workshop</td>
										<td>Overall impression of the Invest Ed® staff</td>
										<td>Overall impression of the workshop facilities</td>
										<td>What specific information did you find most useful for your classroom?</td>
										<td>How will you incorporate the concepts and information presented this week into your classroom?</td>
										<td>Do you feel confident that you could introduce the materials covered to your class?</td>
										<td>Suggestions for workshop improvement?</td>
										<td>Do you believe the two-day summer workshop is the best way to present the Invest Ed® information? Do you think a one-day workshop during the school year would be a better format to present the information?</td>
										<td>In your opinion how important is the Department of Securities awards ceremony honoring STARS reports winners?</td>
										<td>Comments</td>
									</tr>
								</thead>
								<tbody>
									@foreach($surveys as $survey)
									<tr>
										<td>{{ $survey->q1 }}</td>
										<td>{{ $survey->q2 }}</td>
										<td>{{ $survey->q3 }}</td>
										<td>{{ $survey->q4 }}</td>
										<td>{{ $survey->q5 }}</td>
										<td>{{ $survey->q6 }}</td>
										<td>{{ $survey->q7 }}</td>
										<td>{{ $survey->q8 }}</td>
										<td>{{ $survey->q9 }}</td>
										<td>{{ $survey->q10 }}</td>
										<td>{{ $survey->q11 }}</td>
										<td>{{ $survey->q12 }}</td>
										<td>{{ $survey->q13 }}</td>
										<td>{{ $survey->q14 }}</td>
										<td>{{ $survey->q15 }}</td>
										<td>{{ $survey->q16 }}</td>
										<td>{{ $survey->q17 }}</td>
										<td>{{ $survey->q18 }}</td>
										<td>{{ $survey->q19 }}</td>
										<td>{{ $survey->comments1 }}</td>
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