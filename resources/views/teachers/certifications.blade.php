@extends('layouts.app')

@section('content')
	
	<div id="research">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
				
					<h1>Certification Results</h1>
					
					<section>
					<table>
						<thead>
							<tr>
								<td>Name</td>
								<td>Grade</td>
								<td>Results</td>
							</tr>
						</thead>
						<tbody>
							@foreach($certifications as $certification)
							<?php 
								$thisUser = \App\User::where("id", $certification->user_id)->first();
							?>
							<tr>
								<td>{{ $thisUser->name }}</td>
								<td>{{ $certification->grade }}%</td>
								<td><a href="/certification-quiz/{{ $certification->id }}"><i class="fas fa-eye"></i></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</section>
					
				</div>
			</div>
		</div>
	</div>

@endsection