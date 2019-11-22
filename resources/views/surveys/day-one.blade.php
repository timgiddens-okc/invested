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
				
					<h1>Day 1 Survey</h1>

					
					<form action="" method="post">
						@csrf
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
									<td>My overall Impression of the material covered today</td>
									<td class="text-center"><input type="radio" name="q1" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q1" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q1" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q1" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q1" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>My overall impression of the Instructors</td>
									<td class="text-center"><input type="radio" name="q2" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q2" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q2" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q2" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q2" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Comments</td>
									<td colspan="5"><textarea name="comments1"></textarea></td>
								</tr>
							</tbody>
						</table>
						</section>
						
						<section>
						
						<h5>Instructor - Matt Ingram</h5>
						
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
									<td>Organization of instructor’s presentation</td>
									<td class="text-center"><input type="radio" name="q3" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q3" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q3" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q3" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q3" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Conciseness of Instructor’s presentation</td>
									<td class="text-center"><input type="radio" name="q4" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q4" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q4" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q4" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q4" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Instructor’s knowledge of course content</td>
									<td class="text-center"><input type="radio" name="q5" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q5" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q5" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q5" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q5" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Instructor’s ability to keep class focused</td>
									<td class="text-center"><input type="radio" name="q6" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q6" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q6" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q6" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q6" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Presentation style of the instructor</td>
									<td class="text-center"><input type="radio" name="q7" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q7" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q7" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q7" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q7" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Comments</td>
									<td colspan="5"><textarea name="comments2"></textarea></td>
								</tr>
							</tbody>
						</table>
						</section>
								
								
						<section>
						<h5>Instructor - Marquita Seifried</h5>
								
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
									<td>Organization of instructor’s presentation</td>
									<td class="text-center"><input type="radio" name="q8" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q8" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q8" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q8" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q8" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Conciseness of Instructor’s presentation</td>
									<td class="text-center"><input type="radio" name="q9" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q9" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q9" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q9" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q9" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Instructor’s knowledge of course content</td>
									<td class="text-center"><input type="radio" name="q10" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q10" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q10" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q10" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q10" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Instructor’s ability to keep class focused</td>
									<td class="text-center"><input type="radio" name="q11" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q11" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q11" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q11" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q11" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Presentation style of the instructor</td>
									<td class="text-center"><input type="radio" name="q12" required value="Excellent" /></td>
									<td class="text-center"><input type="radio" name="q12" required value="Very Good" /></td>
									<td class="text-center"><input type="radio" name="q12" required value="Good" /></td>
									<td class="text-center"><input type="radio" name="q12" required value="Fair" /></td>
									<td class="text-center"><input type="radio" name="q12" required value="Poor" /></td>
								</tr>
								
								<tr>
									<td>Comments</td>
									<td colspan="5"><textarea name="comments3"></textarea></td>
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