<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@homeRedirect');

Route::get('/test/{company}', 'StockController@test');

Route::get('/privacy', function(){
	return view("privacy");
});

Route::get('/legal', function(){
	return view("legal");
});

Route::get('/register-teacher', 'TeacherController@registerTeacher');
Route::post('/register-teacher', 'TeacherController@createTeacher');

// Assessments
Route::get('/risk-assessment', 'AssessmentController@risk');
Route::post('/risk-assessment', 'AssessmentController@completeRisk');

Route::get('/portfolio/{slug}','PortfolioController@show');

Route::get('/semi-finalists', 'HomeController@semifinalists');

Route::get("/day-one-survey", 'SurveyController@dayOneSurvey');
Route::post("/day-one-survey", 'SurveyController@completeDayOneSurvey');

Route::get("/day-two-survey", 'SurveyController@dayTwoSurvey');
Route::post("/day-two-survey", 'SurveyController@completeDayTwoSurvey');

Route::group(['middleware' => 'auth'], function(){
	
	Route::get("/checkins", "CheckinController@checkins");
	Route::post("/checkin/{checkin}/morning", "CheckinController@checkinMorning");
	Route::post("/checkin/{checkin}/afternoon", "CheckinController@checkinAfternoon");
	
	Route::get("/certifications", 'TeacherController@certifications');
	
	Route::get("/certification-quiz", 'TeacherController@certificationQuiz');
	Route::post("/certification-quiz", 'TeacherController@submitCertificationQuiz');
	
	Route::get("/certification-quiz/{certification}", 'TeacherController@viewQuiz');
	
	Route::get("/day-one-survey-results", "SurveyController@dayOneResults");
	Route::get("/day-two-survey-results", "SurveyController@dayTwoResults");
	
	Route::get('/portfolio-info/{portfolio}','PortfolioController@info');

	Route::get('/', 'HomeController@index');
	
	Route::post('/create-reviewer', 'TeacherController@createReviewer');

	Route::get('/settings', 'HomeController@settings');
	Route::post('/update-information', 'HomeController@updateInfo');
	Route::post('/update-password', 'HomeController@updatePassword');
	Route::post('/update-teacher', 'HomeController@updateTeacher');
	
	
	Route::post('/create-class', 'TeacherController@createClass');
	
	Route::get('/logout', 'HomeController@logout');
	
	// Portfolio
	Route::get('/portfolio/new', 'PortfolioController@new');
	Route::post('/portfolio/create','PortfolioController@create');
	
	Route::get('/portfolio/{slug}/history','PortfolioController@transactions');
	Route::get('/portfolio/{slug}/edit','PortfolioController@edit');
	Route::post('/portfolio/{slug}/edit','PortfolioController@update');
	Route::get('/portfolio/{slug}/delete','PortfolioController@delete');
	
	// Stocks
	Route::post('/stocks/search', 'StockController@search');
	Route::post('/portfolio/{slug}/buy', 'StockController@buy');
	Route::post('/portfolio/{slug}/sell', 'StockController@sell');
	Route::post('/stocks/pricing', 'StockController@pricing');
	Route::post('/stocks/sell-pricing','StockController@sellPricing');
	
	// Research
	Route::get('/portfolio/{slug}/research-log', 'PortfolioController@researchLog');
	Route::get('/portfolio/{slug}/research-log/{research}/edit', 'PortfolioController@editResearch');
	Route::post('/portfolio/{slug}/research-log/{research}/edit', 'PortfolioController@updateResearch');
	Route::post('/portfolio/{slug}/research-log', 'PortfolioController@submitResearch');
	Route::get('/research', 'PortfolioController@allResearch');
	
	// Company Information
	Route::get('/portfolio/{slug}/company-information', 'PortfolioController@companyInformation');
	Route::post('/portfolio/{slug}/company-information', 'PortfolioController@submitCompanyInformation');
	Route::get('/portfolio/{slug}/company-information/{company}','PortfolioController@showCompanyInformation');
	Route::get('/portfolio/{slug}/company-information/{company}/edit','PortfolioController@editCompanyInformation');
	Route::post('/portfolio/{slug}/company-information/{company}/edit','PortfolioController@updateCompanyInformation');
	
	// Messages
	Route::get('/messages', 'MessagesController@index');
	Route::get('/messages/{user}', 'MessagesController@show');
	Route::get('/message-all', 'MessagesController@all');
	Route::post('/post-message','MessagesController@post');
	Route::post('/message-all','MessagesController@messageAll');
	
	// Teachers
	Route::get('/students', 'TeacherController@students');
	Route::get('/remove-student/{user}', 'TeacherController@removeStudent');
	Route::get('/delete-class/{class}', 'TeacherController@deleteClass');
	
	// Assessments
	Route::get('/preassessment', 'AssessmentController@preassessment');
	Route::get('/postassessment', 'AssessmentController@postassessment');
	Route::post('/preassessment', 'AssessmentController@completePreassessment');
	Route::post('/postassessment', 'AssessmentController@completePostassessment');
	Route::get('/preassessment/complete', 'AssessmentController@preassessmentComplete');
	Route::get('/postassessment/complete', 'AssessmentController@postassessmentComplete');
	
	// Reports
	Route::get('/portfolio/{slug}/report', 'ReportController@index');
	Route::post('/portfolio/{slug}/report/submit', 'ReportController@submit');
	Route::post('/report/{report}/submit', 'ReportController@submitToStars');
	Route::get('/report/{report}/unsubmit', 'ReportController@unsubmit');
	
	Route::post('/report/{report}/semifinalist', 'ReportController@semifinalist');
	Route::get('/report/{report}/remove-semifinalist', 'ReportController@nonSemifinalist');
	
	Route::get('/reports/{classification}', 'ReportController@classification');
	Route::get('/portfolio/{slug}/report-instructions', 'ReportController@guidelines');
	Route::get('/report-instructions', 'ReportController@generalGuidelines');
	
	// Site Messages
	Route::post('/site-message', 'MessagesController@siteMessage');
	
	// Resources
	Route::get('/resources', 'TeacherController@resources');
	
	Route::prefix('impersonation')->group(function ($router) {
		$router->get('revert', 'ImpersonateController@revert')->name('impersonate.revert');
		$router->get('{user}', 'ImpersonateController@impersonate')->name('impersonate.impersonate');
	});
	
});