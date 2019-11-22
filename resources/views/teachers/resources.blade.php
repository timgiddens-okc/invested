@extends('layouts.app')

@section('content')
	
	<div id="resources">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
					<h1>Resources</h1>
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					      @if(Session::has($msg))
					      <div class="callout {{ $msg }}">{{ Session::get($msg) }}</div>
					      @endif
					    @endforeach
						</div>
					</div>
					
					<h2>Important Documents</h2>
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								
								<div class="resource">
									<a href="/teacher-resources/Terms of Service Final.pdf" class="resource-link" target="_blank">Terms of Service</a>
								</div>
																
							</div>
						</div>
					</section>
					
					<h2>Account Set Up Instructions</h2>
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								
								<div class="resource">
									<a href="/teacher-resources/teacher-signup.pdf" class="resource-link" target="_blank">Teacher</a>
									<a href="/teacher-resources/student-signup.pdf" class="resource-link" target="_blank">Student</a>
								</div>
																
							</div>
						</div>
					</section>
					
					<h2>Reports</h2>
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								
								<div class="resource">
									<a href="/report-instructions" class="resource-link">Instructions For Report</a>
									<a href="/teacher-resources/report-submission-screen.png" target="_blank" class="resource-link">Report Submission Screen</a>
								</div>
																
							</div>
						</div>
					</section>
					
					<h2>Summer Workshop Resources</h2>
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<div class="resource">
									<a href="/certification-quiz" target="_blank" class="resource-link"><i class="fas fa-book"></i> Certification Quiz</a>
									<a href="/day-one-survey" target="_blank" class="resource-link"><i class="fas fa-book"></i> Day One Survey</a>
									<a href="/day-two-survey" target="_blank" class="resource-link"><i class="fas fa-book"></i> Day Two Survey</a>
									<a href="/teacher-resources/powerpoints.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Workshop Powerpoints</a>
								</div>
								
<!--
								<div class="resource">
									<a href="/teacher-resources/adult-student-waiver.pdf" target="_blank" class="resource-link"><i class="fas fa-download"></i> Adult Student Waiver</a>
									<a href="/teacher-resources/student-waiver.pdf" target="_blank" class="resource-link"><i class="fas fa-download"></i> Student Waiver</a>
									<a href="/teacher-resources/teacher-release.pdf" target="_blank" class="resource-link"><i class="fas fa-download"></i> Teacher Release</a>
								</div>
-->
																
							</div>
						</div>
					</section>
					
					<h2>Video Resources</h2>
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								
								<div class="resource">
									<h3>Researching a public company</h3>
									<p>
										<a href="/teacher-resources/Researching a Public Company Quiz.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Quiz</a>
										<a href="/teacher-resources/Researching Public Companies.pptx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Powerpoint</a>
										<a href="/teacher-resources/Researching a Public Company Cloze Activity.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Activity</a>
										<a href="/teacher-resources/Researching a public company.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Bitcoin Cryptocurrencies and the Blockchain</h3>
									<p>
										<a href="/teacher-resources/Bitcoin, Cryptocurrencies and the Blockchain Quiz with KEY.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Quiz</a>
										<a href="/teacher-resources/Bitcoin, Cryptocurrencies and the Blockchain.pptx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Powerpoint</a>
										<a href="/teacher-resources/Bitcoin and Crypto Cloze Activity with Key.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Activity</a>
										<a href="/teacher-resources/Bitcoin Cryptocurrencies and the Blockchain.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Stock Market Terminology</h3>
									<p>
										<a href="/teacher-resources/Video Notetaking Template.dotx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Note Taking Template</a>
										<a href="/teacher-resources/Stock Market Terminology.pptx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Powerpoint</a>
										<a href="/teacher-resources/Stock Market TerminologyTriviaGame.pptx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Trivia Game</a>
										<a href="/teacher-resources/Stock Market Terminology.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Bonds</h3>
									<p>
										<a href="/teacher-resources/Bonds Quiz with Key.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Quiz</a>
										<a href="/teacher-resources/Bonds.pptx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Powerpoint</a>
										<a href="/teacher-resources/Bonds Activity.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Activity</a>
										<a href="/teacher-resources/Bonds.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Stock Orders</h3>
									<p>
										<a href="/teacher-resources/Stock Orders Quiz with Answer Key.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Quiz</a>
										<a href="/teacher-resources/Stock Orders.pptx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Powerpoint</a>
										<a href="/teacher-resources/Stock Orders Cloze Activity.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Activity</a>
										<a href="/teacher-resources/Stock Orders" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>FinTech</h3>
									<p>
										<a href="/teacher-resources/FinTech Quiz.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Quiz</a>
										<a href="/teacher-resources/FinTech.pptm" target="_blank" class="resource-link"><i class="fas fa-download"></i> Powerpoint</a>
										<a href="/teacher-resources/FinTech Cloze Activitiy.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Activity</a>
										<a href="/teacher-resources/FinTech.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Risk Management</h3>
									<p>
										<a href="/teacher-resources/Risk Management Quiz with Key.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Quiz</a>
										<a href="/teacher-resources/Risk Management.pptx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Powerpoint</a>
										<a href="/teacher-resources/Risk Management Cloze Activity with Key.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Activity</a>
										<a href="/teacher-resources/Risk management.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Stock Market Indexes</h3>
									<p>
										<a href="/teacher-resources/Quiz for Stock Market Indexes with Key.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Quiz</a>
										<a href="/teacher-resources/Stock Market Indexes.pptm" target="_blank" class="resource-link"><i class="fas fa-download"></i> Powerpoint</a>
										<a href="/teacher-resources/Stock Market Indexes Cloze Activity.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Activity</a>
										<a href="/teacher-resources/Stock Market Indexes Cloze Activity TEACHER.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Activity (Teacher)</a>
										<a href="/teacher-resources/Stock Market Indexes.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Alternative Assets</h3>
									<p>
										<a href="/teacher-resources/Alternative Assets worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/Alternative Assets worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/Alternative Assets.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>ETF</h3>
									<p>
										<a href="/teacher-resources/ETF worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/ETF worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/ETF.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Important Numbers</h3>
									<p>
										<a href="/teacher-resources/Important Numbers worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/Important Numbers worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/Important Numbers.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Mutual Fund</h3>
									<p>
										<a href="/teacher-resources/Mutual Fund worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/Mutual Fund worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/Mutual Fund.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>PE Ratio</h3>
									<p>
										<a href="/teacher-resources/PE worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/PE worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/PE Ratio.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>PEG Ratio</h3>
									<p>
										<a href="/teacher-resources/PEG worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/PEG worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/PEG Ratio.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Portfolios</h3>
									<p>
										<a href="/teacher-resources/Portfolios worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/Portfolios worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/Portfolios.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Psychology of Investing</h3>
									<p>
										<a href="/teacher-resources/Psychology of Investing worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/Psychology of Investing worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/Psychology of Investing.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Researching Stocks</h3>
									<p>
										<a href="/teacher-resources/Researching Stocks worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/Researching Stocks worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/Researching Stocks.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Stock Screener</h3>
									<p>
										<a href="/teacher-resources/Stock Screener worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/Stock Screener worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/Stock Screener.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Stocks and Bonds</h3>
									<p>
										<a href="/teacher-resources/Stocks and Bonds worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/Stocks and Bonds worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resources/Stocks and Bonds.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>What is Investing</h3>
									<p>
										<a href="/teacher-resources/What is Investing worksheet.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Worksheet</a>
										<a href="/teacher-resources/What is Investing worksheet Solutions.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Solutions</a>
										<a href="/teacher-resourcesWhat is Investing.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
							</div>
						</div>
					</section>
					
					<h2>Miscellaneous</h2>
					<section>
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								
								<div class="resource">
									<h3>Dow Tracking Sheet</h3>
									<a href="/teacher-resources/2020-student-tracking-sheet.pdf" target="_blank" class="resource-link"><i class="fas fa-download"></i> Student Tracking Sheet</a>
									<a href="/teacher-resources/2020-dow-tracking-sheet.pdf" target="_blank" class="resource-link"><i class="fas fa-download"></i> Pdf</a>
									<a href="/teacher-resources/2020-dow-tracking-sheet.xlsx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Excel</a>
									<a href="https://cdn2.hubspot.net/hubfs/2532383/Guides/Reading_VL_Report_WEB.pdf" target="_blank" class="resource-link"><i class="fas fa-download"></i> How to Read a Value Line Report</a>
								</div>
								
								<div class="resource">
									<h3>Avoiding Investment Fraud</h3>
									<p>
										<a href="/teacher-resources/Avoiding Investment Fraud.pptx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Powerpoint</a>
										<a href="/teacher-resources/Avoiding Fraud Cloze Activity.docx" target="_blank" class="resource-link"><i class="fas fa-download"></i> Activity</a>
										<a href="/teacher-resources/Avoiding Investment Fraud.zip" target="_blank" class="resource-link"><i class="fas fa-download"></i> Download All</a>
									</p>
								</div>
								
								<div class="resource">
									<h3>Outside Links</h3>
									<a href="https://www.ngpf.org/" target="_blank" class="resource-link"><i class="fas fa-globe"></i> NGPF</a>
								</div>
								
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>

@endsection