$(document).ready(function(){
	
	$("#buy-form").submit(function(){
		$(".purchase").html("<i class='fas fa-spinner fa-spin'></i>");
		$(".purchase").attr("disabled","disabled");
	});
	
	$(".close-window").on("click", function(e){
		e.preventDefault();
		$("#ticker").val('');
		$("#shares").val('');
		$("#trade-comment").val('');
		$("#pricing").empty();
		$("#pricing").slideUp(300);
		$("#place-a-trade").fadeOut(300);
		$(".overlay").fadeOut(300);
	});
	
	$(".place-a-trade").on("click", function(e){
		e.preventDefault();
		$("#place-a-trade").fadeIn(300);
		$(".overlay").fadeIn(300);
	});
	
	$("#goal").on("change", function(){
		var $val = $(this).val();
		if($val == "other"){
			$("#other-goal").html("<div class='grid-x grid-padding-x'><div class='small-12 cell'><label>Other Investment Goal<input type='text' name='goal' /></label></div></div>");
			$("#other-goal").slideDown(300);
		} else {
			$("#other-goal").slideUp(300, function(){
				$(this).empty();
			});
		}
	});
	
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});
	
	var typing;
	var sharesTyping;
	
	var pricingUpdate = function(){
		$.ajax({
			method: "POST",
			url: "/stocks/pricing",
			data: {
				ticker: $("#ticker").val(),
				shares: $("#shares").val(),
				portfolio: $("#portfolio").val()
			}
		}).done(function(html){
			$("#pricing").html(html);
			$("#pricing").slideDown(300);
		});
	};
	
	$("#ticker").on("keyup", function(){
		var $val = $(this).val();
		clearInterval(typing);
		typing = setInterval(function(){ 
			if($val !== ""){
				$.ajax({
					method: "POST",
					url: "/stocks/search",
					data: {
						query: $val
					}
				}).done(function(html){
					$("#search-results").html(html);
					$("#search-results").slideDown(300);
					clearInterval(typing);
				});
			}
		}, 500);
	});
	
	$(document).on("click", "#search-results .result", function(){
		var ticker = $(this).data('symbol');
		$("#ticker").val(ticker);
		$("#search-results").slideUp(300, function(){
			$("#search-results").empty();
			pricingUpdate();
		});
	});
	
	$("#shares").on("keyup", function(){
		var $val = $(this).val();
		clearInterval(sharesTyping);
		sharesTyping = setInterval(function () {
			pricingUpdate();
		}, 500);
	});
	
});