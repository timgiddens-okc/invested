<?php
	$count = 0;
?>
@foreach($results['bestMatches'] as $result)
	<div class="result" data-symbol="{{ $result['1. symbol'] }}">{{ $result['2. name'] }} ({{ $result['1. symbol'] }})</div>
	<?php 
		$count++; 
		if($count == 5){
			break;
		}
	?>	
@endforeach