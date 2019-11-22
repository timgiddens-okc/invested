@extends('layouts.app')

@section('content')
	
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="small-12 medium-6 cell">
				<h1>Edit Portfolio</h1>
				<p>Update your portfolio name.</p>
				<section class="create-portfolio">
					<form action="" method="post" class="form">
						{{ csrf_field() }}
						@if($errors->any())
							<div class="callout alert">
								@foreach($errors->all() as $error)
								<p>{{ $error }}</p>
								@endforeach
							</div>
						@endif
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<label>
									Portfolio Name
									<input type="text" name="name" value="{{ $portfolio->name }}" required>
								</label>
							</div>
						</div>
						
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell text-right">
								<button type="submit" class="button">Update Portfolio</button>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
	
@endsection