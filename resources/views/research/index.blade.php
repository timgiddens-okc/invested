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
				
					<h1>Research Log</h1>
					<p>The more detail entered in this screen now the less information you will have to go back and find later. A works cited page may be able to generate from the data you enter now.</p>
					@if(\Auth::user()->type != 1)
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<form action="" method="post">
									@csrf
									<div class="grid-x grid-padding-x">
										<div class="small-12 medium-6 cell">
											<label>
												Source (Website or Publication)
												<input type="text" name="source" required />
											</label>
										</div>
										<div class="small-12 medium-6 cell">
											<label>
												Author/Editor
												<input type="text" name="author" required />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 medium-6 cell">
											<label>
												Company Name (If Applicable)
												<input type="text" name="company_name" required />
											</label>
										</div>
										<div class="small-12 medium-6 cell">
											<label>
												Ticker (If Applicable)
												<input type="text" name="ticker" required />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 medium-6 cell">
											<label>
												Title of Article
												<input type="text" name="title" required />
											</label>
										</div>
										<div class="small-12 medium-6 cell">
											<label>
												Date of Article
												<input type="text" name="date_of_article" required />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Comments
												<textarea name="comments" required></textarea>
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell">
											<label>
												Tags (separate each tag by a comma)
												<input type="text" name="tags" />
											</label>
										</div>
									</div>
									<div class="grid-x grid-padding-x">
										<div class="small-12 cell text-right">
											<button type="submit" class="button">Submit Research</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</section>
					@endif
					
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
												<td>Company</td>
												<td>Ticker</td>
												<td>Title of Article</td>
												<td>Date of Article</td>
												<td>Comments</td>
												<td></td>
											</tr>
										</thead>
										<tbody>		
											@foreach($research as $item)								
											<tr>											
												<td>{{ \Carbon\Carbon::parse($item->date_of_research)->format('M jS, Y') }}</td>
												<td>{{ $item->source }}</td>
												<td>{{ $item->author }}</td>
												<td>{{ $item->company_name }}</td>
												<td>{{ $item->ticker }}</td>
												<td>{{ $item->title }}</td>
												<td>{{ $item->date_of_article }}</td>
												<td>{{ nl2br($item->comments) }}</td>		
												<td><a href="/portfolio/{{ $portfolio->slug }}/research-log/{{ $item->id }}/edit"><i class="fas fa-edit"></i></a></td>										
											</tr>
											@endforeach
										</tbody>
									</table>
									</div>
								</div>
							</div>
						</section>
					@endif
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