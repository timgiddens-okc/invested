/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

$(document).ready(function () {
	
	$(".delete-portfolio").confirm({
		theme: 'supervan',
		title: 'Are you sure?',
		content: 'Please confirm you want to delete this portfolio. You will lose all data in this portfolio.',
		buttons: {
			confirm: function() {
				location.href = this.$target.attr('href');
			},
			cancel: function() {
				
			}
		}
	});
	
	$(".delete-class").confirm({
		theme: 'supervan',
		title: 'Are you sure?',
		content: 'Please confirm you want to delete the class. The students will be disconnected from your account.',
		buttons: {
			confirm: function() {
				location.href = this.$target.attr('href');
			},
			cancel: function() {
				
			}
		}
	});
	
	$(".remove-student").confirm({
		theme: 'supervan',
		title: 'Are you sure?',
		content: 'Please confirm you want to remove this student. The student will be disconnected from your account.',
		buttons: {
			confirm: function() {
				location.href = this.$target.attr('href');
			},
			cancel: function() {
				
			}
		}
	});
	
	$(".open-menu").on("click", function(e){
		e.preventDefault();
		var target = "#" + $(this).data('target');
		$(".open-menu").removeClass("active");
		$(this).addClass("active");
		$(".purchase-menu").not(target).slideUp(300);
		$(target).slideDown(300);
	});
	
	$(".form").submit(function () {
		$(".purchase", this).html("<i class='fas fa-spinner fa-spin'></i>");
		$(".purchase", this).attr("disabled", "disabled");
	});

	$("#buy-form").submit(function (e) {
		if($("#ticker-error", this).length > 0){
			e.preventDefault();
		} else {
			$(".purchase", this).html("<i class='fas fa-spinner fa-spin'></i>");
			$(".purchase", this).attr("disabled", "disabled");
		}
	});

	$("#sell-form").submit(function () {
		$(".sell", this).html("<i class='fas fa-spinner fa-spin'></i>");
		$(".sell", this).attr("disabled", "disabled");
	});

	$(".close-window").on("click", function (e) {
		e.preventDefault();
		$("#ticker").val('');
		$("#shares").val('');
		$("#trade-comment").val('');
		$("#pricing").empty();
		$("#pricing").slideUp(300);
		$("#place-a-trade").fadeOut(300);
		$(".overlay").fadeOut(300);
	});

	$(".place-a-trade").on("click", function (e) {
		e.preventDefault();
		$("#place-a-trade").fadeIn(300);
		$(".overlay").fadeIn(300);
	});

	$("#goal").on("change", function () {
		var $val = $(this).val();
		if ($val == "other") {
			$("#other-goal").html("<div class='grid-x grid-padding-x'><div class='small-12 cell'><label>Other Investment Goal<input type='text' name='goal' /></label></div></div>");
			$("#other-goal").slideDown(300);
		} else {
			$("#other-goal").slideUp(300, function () {
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

	var pricingUpdate = function pricingUpdate() {
		$.ajax({
			method: "POST",
			url: "/stocks/pricing",
			data: {
				ticker: $("#ticker").val(),
				shares: $("#shares").val(),
				portfolio: $("#portfolio").val()
			}
		}).done(function (html) {
			$("#pricing").html(html);
			$("#pricing").slideDown(300);
		});
	};
	
	var sellPricingUpdate = function pricingUpdate() {
		$.ajax({
			method: "POST",
			url: "/stocks/sell-pricing",
			data: {
				ticker: $("#sell-ticker").val(),
				shares: $("#sell-shares").val(),
				portfolio: $("#sell-portfolio").val()
			}
		}).done(function (html) {
			$("#sell-pricing").html(html);
			$("#sell-pricing").slideDown(300);
		});
	};

	$("#ticker").on("keyup", function () {
		var $val = $(this).val();
		clearInterval(typing);
		typing = setInterval(function () {
			if ($val !== "") {
				$.ajax({
					method: "POST",
					url: "/stocks/search",
					data: {
						query: $val
					}
				}).done(function (html) {
					$("#search-results").html(html);
					$("#search-results").slideDown(300);
					clearInterval(typing);
					pricingUpdate();
				});
			}
		}, 500);
	});
	
	$("#sell-ticker").on("change", function(){
		sellPricingUpdate();
	});
	
	$("#sell-shares").on("keyup", function(){
		sellPricingUpdate();
	});
	
	if($("#sell-shares").length > 0){
		sellPricingUpdate();
	}

	$(document).on("click", "#search-results .result", function () {
		var ticker = $(this).data('symbol');
		$("#ticker").val(ticker);
		$("#search-results").slideUp(300, function () {
			$("#search-results").empty();
			pricingUpdate();
		});
	});

	$("#shares").on("keyup", function () {
		var $val = $(this).val();
		clearInterval(sharesTyping);
		sharesTyping = setInterval(function () {
            pricingUpdate();
            clearInterval(sharesTyping);
		}, 500);
	});
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);
