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
				
					<h1>Report</h1>
				
					<div class="grid-x grid-padding-x">
						<div class="small-12 medium-6 cell">
							<section>
								<h6>How To Save As A PDF</h6>
								
								<p>
									<strong>Google Docs</strong><br>
									1) Click on File<br>
									2) Select 'Download As'<br>
									3) Select 'PDF Document (.pdf)'
								</p>
								
								<p>
									<strong>Microsoft Word</strong><br>
									1) Click on File<br>
									2) Select 'Export'<br>
									3) Select 'Create PDF/XPS'<br>
									4) Select 'OK'<br>
									5) Click 'Publish'
								</p>
							</section>
						</div>
						<div class="small-12 medium-6 cell">
							<section>
								@if(\Auth::user()->reportSubmitted())
									<h2>Thanks for submitting your report!</h2>
									<p>Please check with your teacher, if you have any questions.</p>
								@else
								<h2>Submit your report</h2>
								<p>Please submit your report as a <strong>PDF</strong>. If you don't know how to do this, ask your teacher for help!</p>
								<form enctype="multipart/form-data" action="/portfolio/{{ $portfolio->slug }}/report/submit" method="post" class="form">
									@csrf
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Upload File
												<input type="file" name="file" required />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell text-right">
											<button type="submit" class="button">Submit Report</button>
										</div>
									</div>
								</form>
								@endif
							</section>
						</div>
					</div>	
					
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell text-right">
							<a href="/portfolio/{{ $portfolio->slug }}" class="button">Back To Portfolio</a>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>

@endsection