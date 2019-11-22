@extends('layouts.app')

@section('content')
	
	<section>
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<h1>Something Went Wrong!</h1>
				
				@if(app()->bound('sentry') && !empty(Sentry::getLastEventID()))
			        <div class="subtitle">Error ID: {{ Sentry::getLastEventID() }}</div>
			
			        <!-- Sentry JS SDK 2.1.+ required -->
			        <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>
			
			        <script>
			            Raven.showReportDialog({
			                eventId: '{{ Sentry::getLastEventID() }}',
			                // use the public DSN (dont include your secret!)
			                dsn: 'https://e98ab57c10394fb68787280202e711e1@sentry.io/1371337',
			                user: {
			                    'name': 'Jane Doe',
			                    'email': 'jane.doe@example.com',
			                }
			            });
			        </script>
			    @endif
			</div>
		</div>
	</section>

@endsection