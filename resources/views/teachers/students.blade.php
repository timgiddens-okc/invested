@extends('layouts.app')

@section('content')
	
	<div id="company-information">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
					<h1>Students</h1>
					<p>Click student's name to view their STARS portfolio.</p>
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					      @if(Session::has($msg))
					      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
					      @endif
					    @endforeach
						</div>
					</div>
				
					@foreach($classes as $class)
					<?php
						$students = \App\User::where("class_id", $class->id)->get();
					?>
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-7 cell">
								<h2>{{ $class->name }} <span class="code">Code: {{ $class->code }}</span></h2>
							</div>
							<div class="small-5 cell text-right">
								<a href="/delete-class/{{ $class->id }}" class="delete-class">Delete Class</a>
							</div>
						</div>						
						<div class="table-scroll">
						<table>
							<thead>
								<tr>
									<td class="text-center">Remove Student</td>
									<td>Name</td>
									<td class="text-center">Message</td>
									<td class="text-center">Transaction History</td>
									<td class="text-center">Research Log</td>
									<td class="text-center">Company Information</td>
									<td>Preassessment</td>
									<td>Postassessment</td>
									<td>Report</td>
									<td>Risk Assessment</td>
									<td>Mark For Submission</td>
								</tr>
							</thead>
							<tbody>
								<?php
									$submitCount = \App\Report::where('submitted',1)->whereIn('user_id',$students)->count();
									$show_submit = true;
									
									if($submitCount == 2){
										$show_submit = false;
									}	
								?>
								@if(count($students) > 0)
									@foreach($students as $student)
									<?php
										$p = \App\Portfolio::where('stars',1)->where('user_id',$student->id)->first();	
									?>
									<tr>
										<td class="text-center"><a href="/remove-student/{{ $student->id }}" class="remove-student"><i class="fas fa-user-slash"></i></a></td>
										@if($p)
										<td><a href="/portfolio/{{ $p->slug }}">{{ $student->name }}</a></td>
										<td class="text-center"><a href="/messages/{{ $student->id }}"><i class="fas fa-envelope"></i></a></td>
										<td class="text-center"><a href="/portfolio/{{ $p->slug }}/history">View</a></td>
										<td class="text-center"><a href="/portfolio/{{ $p->slug }}/research-log">View</a></td>
										<td class="text-center"><a href="/portfolio/{{ $p->slug }}/company-information">View</a></td>
										@else 
											<td>{{ $student->name }}</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										@endif
										<td class="text-center">
											@if($student->preassessmentCompleted())
												<?php $pre = \App\Preassessment::where('user_id',$student->id)->first(); ?>
												<i class="fas fa-check-circle positive"></i> <span class="{{ ($pre->grade >= 50) ? 'positive' : 'negative' }}" style="margin-left: 5px;">{{ $pre->grade }}%</span>
											@endif
										</td>
										<td class="text-center">
											@if($student->postassessmentCompleted())
												<?php $post = \App\Postassessment::where('user_id',$student->id)->first(); ?>
												<i class="fas fa-check-circle positive"></i> <span class="{{ ($post->grade >= 50) ? 'positive' : 'negative' }}" style="margin-left: 5px;">{{ $post->grade }}%</span>
											@endif
										</td>
										<td class="text-center">
											@if($student->reportSubmitted())
												<i class="fas fa-check-circle positive"></i>
												@foreach($student->reports as $report)
												<a href="{{ asset('storage/'.$report->file) }}" target="_blank" style="margin-left: 5px;"><i class="fas fa-eye"></i></a>
												@endforeach
											@endif
										</td>
										<td>{{ $student->risk }}</td>
										<td class="text-center">
											@foreach($student->reports as $report)
												@if($report->submitted == 1)
													<i class="fas fa-check-circle positive"></i>
													<small><a href="/report/{{ $report->id }}/unsubmit" style="margin-left: 10px;">Un-Submit</a></small>
												@else
													@if($show_submit)
													<form action="/report/{{ $report->id }}/submit" method="post">
														@csrf
														<button type="submit" class="button small no-margin">Submit</button>
													</form>
													@endif
												@endif
											@endforeach
										</td>
									</tr>
									@endforeach
								@endif
							</tbody>
						</table>
						<p class="disclaimer">To view more fields, and the students' reports, please scroll to the right in the table.</p>
						</div>
					</section>	
					@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection