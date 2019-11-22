@extends('layouts.app')

@section('content')
	
	<div id="assessment">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="small-12 medium-10 cell">
					<h1>Risk Assessment</h1>
					<p>The purpose for taking a risk assessment is to measure how much risk you are COMFORTABLE taking with your money. Knowing your risk tolerance lets you choose investments that are in line with the amount of risk you are willing to take. Risk tolerance and its relationship to investment goals is explained in more detail by clicking on the links.</p>
					
					
					<form action="" method="post">
						@csrf
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										1) In general, how would your best friend describe you as a risk taker?<br>
										<input type="radio" name="risk-taker" value="4" id="risk-taker-a" required><label for="risk-taker-a">A real gambler</label><br>
										<input type="radio" name="risk-taker" value="3" id="risk-taker-b" required><label for="risk-taker-b">Willing to take risks after completing adequate research</label><br>
										<input type="radio" name="risk-taker" value="2" id="risk-taker-c" required><label for="risk-taker-c">Cautious</label><br>
										<input type="radio" name="risk-taker" value="1" id="risk-taker-d" required><label for="risk-taker-d">A real risk avoider</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										2) You are on a TV game show and can choose one of the following. Which would you take?<br>
										<input type="radio" name="game-show" value="1" id="game-show-a" required><label for="game-show-a">$1,000 in cash</label><br>
										<input type="radio" name="game-show" value="2" id="game-show-b" required><label for="game-show-b">A 50% chance at winning $5,000</label><br>
										<input type="radio" name="game-show" value="3" id="game-show-c" required><label for="game-show-c">A 25% chance at winning $10,000</label><br>
										<input type="radio" name="game-show" value="4" id="game-show-d" required><label for="game-show-d">A 5% chance at winning $100,000</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										3) You have just finished saving for a "once-in-a-lifetime" vacation. Three weeks before you plan to leave, you lose your job. You would:<br>
										<input type="radio" name="vacation" value="1" id="vacation-a" required><label for="vacation-a">Cancel the vacation</label><br>
										<input type="radio" name="vacation" value="2" id="vacation-b" required><label for="vacation-b">Take a much more modest vacation</label><br>
										<input type="radio" name="vacation" value="3" id="vacation-c" required><label for="vacation-c">Go as scheduled, reasoning that you need the time to prepare for a job search</label><br>
										<input type="radio" name="vacation" value="4" id="vacation-d" required><label for="vacation-d">Extend your vacation, because this might be your last chance to go first-class</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										4) If you unexpectedly received $20,000 to invest, what would you do?<br>
										<input type="radio" name="invest" value="1" id="invest-a" required><label for="invest-a">Deposit it in a bank account, money market account, or an insured CD</label><br>
										<input type="radio" name="invest" value="2" id="invest-b" required><label for="invest-b">Invest it in safe high quality bonds or bond mutual funds</label><br>
										<input type="radio" name="invest" value="3" id="invest-c" required><label for="invest-c">Invest it in stocks or stock mutual funds</label><br>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										5) In terms of experience, how comfortable are you investing in stocks or stock mutual funds?<br>
										<input type="radio" name="comfortable" value="1" id="comfortable-a" required><label for="comfortable-a">Not at all comfortable</label><br>
										<input type="radio" name="comfortable" value="2" id="comfortable-b" required><label for="comfortable-b">Somewhat comfortable</label><br>
										<input type="radio" name="comfortable" value="3" id="comfortable-c" required><label for="comfortable-c">Very comfortable</label><br>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										6) When you think of the word "risk" which of the following words comes to mind first?<br>
										<input type="radio" name="comes-to-mind" value="1" id="comes-to-mind-a" required><label for="comes-to-mind-a">Loss</label><br>
										<input type="radio" name="comes-to-mind" value="2" id="comes-to-mind-b" required><label for="comes-to-mind-b">Uncertainty</label><br>
										<input type="radio" name="comes-to-mind" value="3" id="comes-to-mind-c" required><label for="comes-to-mind-c">Opportunity</label><br>
										<input type="radio" name="comes-to-mind" value="4" id="comes-to-mind-d" required><label for="comes-to-mind-d">Thrill</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										7) Some experts are predicting prices of assets such as gold, jewels, collectibles, and real estate (hard assets) to increase in value; bond prices may fall, however, experts tend to agree that government bonds are relatively safe. Most of your investment assets are now in high-interest government bonds. What would you do?<br>
										<input type="radio" name="prices-may-fall" value="1" id="prices-may-fall-a" required><label for="prices-may-fall-a">Hold the bonds</label><br>
										<input type="radio" name="prices-may-fall" value="2" id="prices-may-fall-b" required><label for="prices-may-fall-b">Sell the bonds, put half the proceeds into money market accounts, and the other half into hard assets</label><br>
										<input type="radio" name="prices-may-fall" value="3" id="prices-may-fall-c" required><label for="prices-may-fall-c">Sell the bonds and put the total proceeds into hard assets</label><br>
										<input type="radio" name="prices-may-fall" value="4" id="prices-may-fall-d" required><label for="prices-may-fall-d">Sell the bonds, put all the money into hard assets, and borrow additional money to buy more</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										8) Given the best- and worst-case returns of the four investment choices below, which would you prefer?<br>
										<input type="radio" name="case-returns" value="1" id="case-returns-a" required><label for="case-returns-a">$200 gain best case; $0 gain/loss worst case</label><br>
										<input type="radio" name="case-returns" value="2" id="case-returns-b" required><label for="case-returns-b">$800 gain best case; $200 loss worst case</label><br>
										<input type="radio" name="case-returns" value="3" id="case-returns-c" required><label for="case-returns-c">$2,600 gain best case; $800 loss worst case</label><br>
										<input type="radio" name="case-returns" value="4" id="case-returns-d" required><label for="case-returns-d">$4,800 gain best case; $2,400 loss worst case</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										9) In addition to whatever you own, you have been given $1,000. You are now asked to choose between:<br>
										<input type="radio" name="given-money" value="1" id="given-money-a" required><label for="given-money-a">A sure gain of $500</label><br>
										<input type="radio" name="given-money" value="3" id="given-money-b" required><label for="given-money-b">A 50% chance to gain $1,000 and a 50% chance to gain nothing</label><br>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										10) In addition to whatever you own, you have been given $2,000. You are now asked to choose between:<br>
										<input type="radio" name="given-more-money" value="1" id="given-more-money-a" required><label for="given-more-money-a">A sure loss of $500</label><br>
										<input type="radio" name="given-more-money" value="3" id="given-more-money-b" required><label for="given-more-money-b">A 50% chance to lose $1,000 and a 50% chance to lose nothing</label><br>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										11) Suppose a relative left you an inheritance of $100,000, stipulating in the will that you invest ALL the money in ONE of the following choices. Which one would you select?<br>
										<input type="radio" name="inheritance" value="1" id="inheritance-a" required><label for="inheritance-a">A savings account or money market mutual fund</label><br>
										<input type="radio" name="inheritance" value="2" id="inheritance-b" required><label for="inheritance-b">A mutual fund that owns stocks and bonds</label><br>
										<input type="radio" name="inheritance" value="3" id="inheritance-c" required><label for="inheritance-c">A portfolio of 15 common stocks</label><br>
										<input type="radio" name="inheritance" value="4" id="inheritance-d" required><label for="inheritance-d">Commodities like gold, silver, and oil</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										12) If you had to invest $20,000, which of the following investment choices would you find most appealing?<br>
										<input type="radio" name="most-appealing" value="1" id="most-appealing-a" required><label for="most-appealing-a">60% in low-risk investments 30% in medium-risk investments 10% in high-risk investments</label><br>
										<input type="radio" name="most-appealing" value="2" id="most-appealing-b" required><label for="most-appealing-b">30% in low-risk investments 40% in medium-risk investments 30% in high-risk investments</label><br>
										<input type="radio" name="most-appealing" value="3" id="most-appealing-c" required><label for="most-appealing-c">10% in low-risk investments 40% in medium-risk investments 50% in high-risk investmentss</label><br>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										13) Your trusted friend and neighbor, an experienced geologist, is putting together a group of investors to fund an exploratory gold mining venture. The venture could pay back 50 to 100 times the investment if successful. If the mine is a bust, the entire investment is worthless. Your friend estimates the chance of success is only 20%. If you had the money, how much would you invest?<br>
										<input type="radio" name="gold-mining" value="1" id="gold-mining-a" required><label for="gold-mining-a">Nothing</label><br>
										<input type="radio" name="gold-mining" value="2" id="gold-mining-b" required><label for="gold-mining-b">One month's salary</label><br>
										<input type="radio" name="gold-mining" value="3" id="gold-mining-c" required><label for="gold-mining-c">Three month's salary</label><br>
										<input type="radio" name="gold-mining" value="4" id="gold-mining-d" required><label for="gold-mining-d">Six month's salary</label>
									</label>
								</div>
							</div>
						</section>
						
						<p class="credits">This quiz was developed by John Grable and Ruth H. Lytton, Financial risk tolerance revisited: the development of risk assessment instrument; Financial Services Review 8 (1999).</p>
						
						<div class="grid-x grid-padding-x">
							<div class="small-12 text-right">
								<button type="submit" class="button">Complete Assessment</button>
							</div>
						</div>
					
					</form>
					
				</div>
			</div>
		</div>
	</div>
	
@endsection