@extends('layouts.app')

@section('content')

	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="small-12 {{ (\Auth::user()->type == 2) ? 'medium-8' : '' }} cell">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has($msg))
				      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
				      @endif
				    @endforeach
					</div>
				</div>
	
				@if(\Auth::user()->type == 2)
				<h1>Reports</h1>
				<h6>Click to view the OSSAA Classification reports.</h6>
				<div class="grid-x grid-padding-x small-up-1 medium-up-2">
					<a href="/reports/a" class="cell text-center">
						<section>
							<h2>A</h2>
						</section>
					</a>
					<a href="/reports/2a" class="cell text-center">
						<section>
							<h2>2A</h2>
						</section>
					</a>
					<a href="/reports/3a" class="cell text-center">
						<section>
							<h2>3A</h2>
						</section>
					</a>
					<a href="/reports/4a" class="cell text-center">
						<section>
							<h2>4A</h2>
						</section>
					</a>
					<a href="/reports/5a" class="cell text-center">
						<section>
							<h2>5A</h2>
						</section>
					</a>
					<a href="/reports/6a" class="cell text-center">
						<section>
							<h2>6A</h2>
						</section>
					</a>
					<a href="/reports/other" class="cell text-center">
						<section>
							<h2>Other</h2>
						</section>
					</a>
				</div>
				
				<h1>Semi-Finalists</h1>
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
								<small><a href="/report/{{ $report->id }}/remove-semifinalist" style="margin-left: 10px;">Un-Mark As Semi-Finalist</a></small>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell text-right">
						<a href="/release-to-reviewers" class="button">Release To Reviewers</a>
					</div>
				</div>
				@else
				<h1>Semi-Finalists</h1>
				<table>
					<thead>
						<tr>
							<td>Name</td>
							<td>Report Link</td>
							<td>Portfolio</td>
						</tr>
					</thead>
					<tbody>
						@foreach($reports as $report)
						<tr>
							<?php 
								$student = \App\User::where('id', $report->user_id)->first(); 
								$portfolio = \App\Portfolio::where('user_id', $student->id)->where('stars',1)->first();
							?>
							<td>{{ $student->name }}</td>
							<td><a href="{{ asset('storage/'.$report->file) }}#page=2" target="_blank">View Report</a></td>
							<td>
								<a href="/portfolio/{{ $portfolio->slug }}">View Portfolio</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@endif
			</div>
			<div class="small-12 medium-4 cell">
				@if(\Auth::user()->type == 2)
				<section>
					<h4>Site Message</h4>
					<form action="/site-message" method="post">
						@csrf
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Message
									<textarea name="message" required></textarea>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Who is this for?
									<select name="target">
										<option value="2">Everyone</option>
										<option value="1">Teachers</option>
										<option value="0">Students</option>
									</select>
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Takedown Date
									<input type="date" name="take_down" required />
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<button type="submit" class="button">Post Message</button>
							</div>
						</div>
					</form>
				</section>
				
				
				<section>
					<h4>Create Reviewer</h4>
					<form action="/create-reviewer" method="post">
						@csrf
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Name
									<input type="text" name="name" />
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Email
									<input type="email" name="email" />
								</label>
							</div>
						</div>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<button type="submit" class="button">Add Reviwer</button>
							</div>
						</div>
					</form>
				</section>
				@endif
			</div>
		</div>
	</div>

@endsection
