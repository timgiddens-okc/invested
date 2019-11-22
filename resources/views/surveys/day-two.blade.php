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
				
					<h1>Day 2 Survey</h1>

					
					<form action="" method="post">
						@csrf
						<section>	
							<h5>General</h5>					
						<table>
							<thead>
								<tr>
									<td></td>
									<td class="text-center">Agree</td>
									<td class="text-center">Disagree</td>
								</tr>
							</thead>
							<tbody>
							
								<tr>
									<td>Workshop objectives were clear</td>
									<td class="text-center"><input type="radio" name="q1" required value="Agree" /></td>
									<td class="text-center"><input type="radio" name="q1" required value="Disagree" /></td>
								</tr>
								
								<tr>
									<td>Workshop objectives were achieved</td>
									<td class="text-center"><input type="radio" name="q2" required value="Agree" /></td>
									<td class="text-center"><input type="radio" name="q2" required value="Disagree" /></td>
								</tr>
								
								<tr>
									<td>Instructors were easy to follow</td>
									<td class="text-center"><input type="radio" name="q3" required value="Agree" /></td>
									<td class="text-center"><input type="radio" name="q3" required value="Disagree" /></td>
								</tr>
								
								<tr>
									<td>Content and techniques were explained clearly</td>
									<td class="text-center"><input type="radio" name="q4" required value="Agree" /></td>
									<td class="text-center"><input type="radio" name="q4" required value="Disagree" /></td>
								</tr>
								
								<tr>
									<td>Encouragement to actively participate</td>
									<td class="text-center"><input type="radio" name="q5" required value="Agree" /></td>
									<td class="text-center"><input type="radio" name="q5" required value="Disagree" /></td>
								</tr>
								
								<tr>
									<td>Your questions were discussed and answered to your satisfaction</td>
									<td class="text-center"><input type="radio" name="q6" required value="Agree" /></td>
									<td class="text-center"><input type="radio" name="q6" required value="Disagree" /></td>
								</tr>
								
								<tr>
									<td>You received information you can use in your classroom</td>
									<td class="text-center"><input type="radio" name="q7" required value="Agree" /></td>
									<td class="text-center"><input type="radio" name="q7" required value="Disagree" /></td>
								</tr>
								
								<tr>
									<td>You think your students will benefit from the STARs program</td>
									<td class="text-center"><input type="radio" name="q8" required value="Agree" /></td>
									<td class="text-center"><input type="radio" name="q8" required value="Disagree" /></td>
								</tr>
								
							</tbody>
						</table>
						</section>
						
						<section>
						
						<table>
							<thead>
								<tr>
									<td></td>
									<td class="text-center">Excellent</td>
									<td class="text-center">Very Good</td>
									<td class="text-center">Good</td>
									<td class="text-center">Fair</td>
									<td class="text-center">Poor</td>
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td>Organization and presentation of materials</td>
									<td class="text-center"><input type="radio" name="q9" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q9" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q9" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q9" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q9" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Length of workshop</td>
									<td class="text-center"><input type="radio" name="q10" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q10" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q10" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q10" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q10" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Overall impression of the Workshop</td>
									<td class="text-center"><input type="radio" name="q11" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q11" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q11" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q11" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q11" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Overall impression of the Invest Ed® staff</td>
									<td class="text-center"><input type="radio" name="q12" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q12" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q12" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q12" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q12" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Overall impression of the workshop facilities</td>
									<td class="text-center"><input type="radio" name="q13" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q13" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q13" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q13" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q13" required value="Poor" /></td>
								</tr>
								
							</tbody>
						</table>
						</section>
								
								
						<section>
								
						<table>
							<thead>
								<tr>
									<td></td>
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td>What specific information did you find most useful for your classroom?<br><br>
										<textarea name="q14" required></textarea></td>
								</tr>
								
								<tr>
									<td>How will you incorporate the concepts and information presented this week into your classroom?<br><br>
										<textarea name="q15" required></textarea></td>
								</tr>
								
								<tr>
									<td>Do you feel confident that you could introduce the materials covered to your class?<br><br>
										<textarea name="q16" required></textarea></td>
								</tr>
								
								<tr>
									<td>Suggestions for workshop improvement?<br><br>
										<textarea name="q17" required></textarea></td>
								</tr>
								
								<tr>
									<td>Do you believe the two-day summer workshop is the best way to present the Invest Ed® information?<br><br>Do you think a one-day workshop during the school year would be a better format to present the information?<br><br>
										<textarea name="q18" required></textarea></td>
								</tr>
																
							</tbody>
						</table>
						</section>
						
						<section>
						
						<table>
							<thead>
								<tr>
									<td></td>
									<td class="text-center">Not Important</td>
									<td class="text-center"></td>
									<td class="text-center">Somewhat Important</td>
									<td class="text-center"></td>
									<td class="text-center">Very Important</td>
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td>In your opinion how important is the Department of Securities awards ceremony honoring STARS reports winners?</td>
									<td class="text-center"><input type="radio" name="q19" required value="1" /></td>
									<td class="text-center"><input type="radio" name="q19" required value="2" /></td>
									<td class="text-center"><input type="radio" name="q19" required value="3" /></td>
									<td class="text-center"><input type="radio" name="q19" required value="4" /></td>
									<td class="text-center"><input type="radio" name="q19" required value="5" /></td>
								</tr>
								
								<tr>
									<td>Comments</td>
									<td colspan="5"><textarea name="comments1"></textarea></td>
								</tr>
								
							</tbody>
							
						</table>
						
						</section>
						
						<div class="grid-x grid-padding-x">
							<div class="small-12 text-right">
								<button type="submit" class="button">Complete Survey</button>
							</div>
						</div>
						
					</form>
					
				</div>
			</div>
		</div>
	</div>

@endsection