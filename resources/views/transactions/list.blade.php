@extends('layouts.app')

@section('content')
	
	<div id="transactions">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="small-12 cell">
					<h1>Transaction History</h1>
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<div class="portfolio-content">
									<table>
										<tbody>
											@foreach($transactions as $transaction)
											<tr>
												<td>
													@if($transaction->type == 1)
														<span class="label alert">Purchase ({{ $transaction->ticker }})</span>
													@else
														<span class="label success">Sale ({{ $transaction->ticker }})</span>
													@endif
												</td>
												<td>
													{{ $transaction->numberOfShares }} Shares
												</td>
												<td>
													@if($transaction->type == 1)
														<span class="negative">-${{ number_format($transaction->price*$transaction->numberOfShares ,2) }}</span>
													@else
														<span class="positive">+${{ number_format($transaction->price*$transaction->numberOfShares ,2) }}</span>
													@endif
												</td>
												<td>
													{{ $transaction->comment }}
												</td>
											</tr>
											@endforeach
											<tr>
												<td><span class="label success">Portfolio Creation</span></td>
												<td></td>
												<td><span class="positive">+${{ number_format($portfolio->starting_balance,2) }}</span></td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="grid-x grid-padding-x">
									<div class="small-12 cell text-right">
										<a href="/portfolio/{{ $portfolio->slug }}" class="button">Back To Portfolio</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>

@endsection