<table>
	<thead>
		<tr>
			<td>Name</td>
			<td>$ Current Price</td>
			<td>% Daily Change</td>
			<td>Shares Held</td>
			<td>$ Cost Basis</td>
			<td>$ Market Value</td>
			<td>$ Overall Change</td>
			<td>% Overall Change</td>
			<td>% Weight</td>
		</tr>
	</thead>
	<tbody>
		@foreach($stocks as $stock => $values)
		<tr>
			<td>{{ strtoupper($stock) }}</td>
			<td>{{ $values['current_price'] }}</td>
			<td><span class="{{ ($values['daily_change'] >= 0) ? 'positive' : 'negative' }}">{{ $values['daily_change'] }}%</span></td>
			<td>{{ $values['shares_held'] }}</td>
			<td>{{ number_format($values['cost_basis'],2) }}</td>
			<td>{{ number_format($values['market_value'],2) }}</td>
			<td><span class="{{ ($values['dollar_overall_change'] >= 0) ? 'positive' : 'negative' }}">{{ number_format($values['dollar_overall_change'],2) }}</span></td>
			<td><span class="{{ ($values['percent_overall_change'] >= 0) ? 'positive' : 'negative' }}">{{ number_format($values['percent_overall_change'],2) }}%</span></td>
			<?php
			  $weight = (($values['current_price'] * $values['shares_held']) / ($value + $portfolio->cash_available)) * 100;	
			?>
			<td>{{ number_format($weight,2) }}%</td>
		</tr>
		@endforeach
	</tbody>
</table>