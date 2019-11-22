@extends('layouts.app')

@section('content')
	
	<div id="research">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
					<h1>Research Log</h1>
					<p>This screen holds a cumulative view of all the research you have compiled. TIP: This list is only as complete as the data you enter so remember when making an entry to be comprehensive. There is nothing frustrating than trying to go back and find a specific article after weeks have passed.</p>
					@if(count($research) > 0)
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<h2>Submitted Research</h2>
									<div class="portfolio-content">
									<table>
										<thead>
											<tr>
												<td>Date of Research</td>
												<td>Source (Website or Publication)</td>
												<td>Author/Editor</td>
												<td>Title of Article</td>
												<td>Date of Article</td>
												<td>Comments</td>
											</tr>
										</thead>
										<tbody>		
											@foreach($research as $item)								
											<tr>											
												<td>{{ \Carbon\Carbon::parse($item->date_of_research)->format('M jS, Y') }}</td>
												<td>{{ $item->source }}</td>
												<td>{{ $item->author }}</td>
												<td>{{ $item->title }}</td>
												<td>{{ $item->date_of_article }}</td>
												<td>{{ nl2br($item->comments) }}</td>												
											</tr>
											@endforeach
										</tbody>
									</table>
									</div>
								</div>
							</div>
						</section>
					@endif

				</div>
			</div>
		</div>
	</div>

@endsection