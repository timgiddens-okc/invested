@extends('layouts.app')

@section('content')
	
	<div id="research">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
				
					<h1>Risk Assessment</h1>
					<p>Thank you for taking your assessment!</p>
					
					<div class="results">
						<h3 >{{ $message }}</h3>
					</div>
					
				</div>
			</div>
		</div>
	</div>

@endsection