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
				
					<h1>Preassessment</h1>
					<p>Please read each question carefully. Select the answer that best describes you. Answer as honestly as possible.</p>

					
					<form action="" method="post">
						@csrf
						<section>						
						<table>
							<thead>
								<tr>
									<td></td>
									<td class="text-center">Strongly Disagree</td>
									<td class="text-center">Disagree</td>
									<td class="text-center">Somewhat Disagree</td>
									<td class="text-center">Agree</td>
									<td class="text-center">Strongly Agree</td>
								</tr>
							</thead>
							<tbody>
							
								<tr>
									<td>I think about my financial future often.</td>
									<td class="text-center"><input type="radio" name="q1" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q1" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q1" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q1" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q1" value="Strongly Agree"</td>
								</tr>
								
								<tr>
									<td>I can explain what a stock is.</td>
									<td class="text-center"><input type="radio" name="q2" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q2" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q2" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q2" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q2" value="Strongly Agree"</td>
								</tr>
								
								<tr>
									<td>I would research a company before buying its stock.</td>
									<td class="text-center"><input type="radio" name="q3" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q3" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q3" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q3" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q3" value="Strongly Agree"</td>
								</tr>
								
								<tr>
									<td>Before I buy something, I stop to consider whether it is something I need or something I want.</td>
									<td class="text-center"><input type="radio" name="q4" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q4" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q4" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q4" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q4" value="Strongly Agree"</td>
								</tr>
								
								<tr>
									<td>I am confident I can explain what a stock portfolio is.</td>
									<td class="text-center"><input type="radio" name="q5" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q5" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q5" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q5" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q5" value="Strongly Agree"</td>
								</tr>
								
								<tr>
									<td>I understand how compound interest can affect my financial future.</td>
									<td class="text-center"><input type="radio" name="q6" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q6" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q6" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q6" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q6" value="Strongly Agree"</td>
								</tr>
								
								<tr>
									<td>I understand the concept of securities fraud.</td>
									<td class="text-center"><input type="radio" name="q7" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q7" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q7" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q7" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q7" value="Strongly Agree"</td>
								</tr>
								
								<tr>
									<td>I am too young to be thinking about planning for retirement.</td>
									<td class="text-center"><input type="radio" name="q8" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q8" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q8" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q8" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q8" value="Strongly Agree"</td>
								</tr>
								
								<tr>
									<td>I can explain how the stock market functions.</td>
									<td class="text-center"><input type="radio" name="q9" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q9" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q9" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q9" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q9" value="Strongly Agree"</td>
								</tr>
								
								<tr>
									<td>I believe securities fraud is not something that affects high school students.</td>
									<td class="text-center"><input type="radio" name="q10" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q10" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q10" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q10" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q10" value="Strongly Agree"</td>
								</tr>
								
								<tr>
									<td>I know the process for investing in stocks.</td>
									<td class="text-center"><input type="radio" name="q11" value="Strongly Disagree"</td>
									<td class="text-center"><input type="radio" name="q11" value="Disagree"</td>
									<td class="text-center"><input type="radio" name="q11" value="Somewhat Disagree"</td>
									<td class="text-center"><input type="radio" name="q11" value="Agree"</td>
									<td class="text-center"><input type="radio" name="q11" value="Strongly Agree"</td>
								</tr>
								
							</tbody>
						</table>
						</section>
						
						<p>Indicate the answer that is the best response to the following questions. If you do not know the answer, select "I don’t know."</p>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										If you buy a share of a company’s stock, you:<br>
										<input type="radio" name="q12" value="a" id="q12-a" required><label for="q12-a">Own part of that company.</label><br>
										<input type="radio" name="q12" value="b" id="q12-b" required><label for="q12-b">Are responsible for the company’s debts.</label><br>
										<input type="radio" name="q12" value="c" id="q12-c" required><label for="q12-c">Loaned money to the company.</label><br>
										<input type="radio" name="q12" value="d" id="q12-d" required><label for="q12-d">Can expect the company to return your original investment to you with interest.</label><br>
										<input type="radio" name="q12" value="e" id="q12-e" required><label for="q12-e">I don't know</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										An investor is presented with an investment opportunity that sounds “too good to be true.” Which agency should the investor contact to check out the company offering the opportunity?<br>
										<input type="radio" name="q13" value="a" id="q13-a" required><label for="q13-a">The local police department</label><br>
										<input type="radio" name="q13" value="b" id="q13-b" required><label for="q13-b">Oklahoma Department of Securities</label><br>
										<input type="radio" name="q13" value="c" id="q13-c" required><label for="q13-c">Department of Homeland Security</label><br>
										<input type="radio" name="q13" value="d" id="q13-d" required><label for="q13-d">Better Business Bureau</label><br>																													
										<input type="radio" name="q13" value="e" id="q13-e" required><label for="q13-e">I don't know</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Monique owns stock in an airline, a clothing company, and a food market. This is called:<br>
										<input type="radio" name="q14" value="a" id="q14-a" required><label for="q14-a">Amortizing</label><br>
										<input type="radio" name="q14" value="b" id="q14-b" required><label for="q14-b">Diversifying</label><br>
										<input type="radio" name="q14" value="c" id="q14-c" required><label for="q14-c">Compounding</label><br>
										<input type="radio" name="q14" value="d" id="q14-d" required><label for="q14-d">Configuring</label><br>
										<input type="radio" name="q14" value="e" id="q14-e" required><label for="q14-e">I don't know</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										When a market is generally going up in value, it is referred to as a/an ________ market.<br>
										<input type="radio" name="q15" value="a" id="q15-a" required><label for="q15-a">Bull</label><br>
										<input type="radio" name="q15" value="b" id="q15-b" required><label for="q15-b">Donkey</label><br>
										<input type="radio" name="q15" value="c" id="q15-c" required><label for="q15-c">Bear</label><br>
										<input type="radio" name="q15" value="d" id="q15-d" required><label for="q15-d">Elephant</label><br>
										<input type="radio" name="q15" value="e" id="q15-e" required><label for="q15-e">I don't know</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Over the past 70 years, the type of investment that has earned the most money, or the highest rate of return, for investors has been:<br>
										<input type="radio" name="q16" value="a" id="q16-a" required><label for="q16-a">Stocks</label><br>
										<input type="radio" name="q16" value="b" id="q16-b" required><label for="q16-b">Treasury bills</label><br>
										<input type="radio" name="q16" value="c" id="q16-c" required><label for="q16-c">Savings accounts</label><br>
										<input type="radio" name="q16" value="d" id="q16-d" required><label for="q16-d">Gold</label><br>
										<input type="radio" name="q16" value="e" id="q16-e" required><label for="q16-e">I don't know</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										You want to start saving for retirement, and you want to maximize your return over the next 20 years. Which of the following is the best plan for this long term goal?<br>
										<input type="radio" name="q17" value="a" id="q17-a" required><label for="q17-a">Play the lottery every week</label><br>
										<input type="radio" name="q17" value="b" id="q17-b" required><label for="q17-b">Create a diversified portfolio</label><br>
										<input type="radio" name="q17" value="c" id="q17-c" required><label for="q17-c">Trade stocks frequently (i.e., "buy low/sell high")</label><br>
										<input type="radio" name="q17" value="d" id="q17-d" required><label for="q17-d">Invest in a certificate of deposit (CD)</label><br>
										<input type="radio" name="q17" value="e" id="q17-e" required><label for="q17-e">I don't know</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Juan took a risk assessment and found out that he is a “low risk taker.” This means that he is conservative in his selection of stocks. In which of the following should he invest?<br>
										<input type="radio" name="q18" value="a" id="q18-a" required><label for="q18-a">Growth stocks</label><br>
										<input type="radio" name="q18" value="b" id="q18-b" required><label for="q18-b">Value stocks</label><br>
										<input type="radio" name="q18" value="c" id="q18-c" required><label for="q18-c">An Internet company</label><br>
										<input type="radio" name="q18" value="d" id="q18-d" required><label for="q18-d">A popular new company</label><br>
										<input type="radio" name="q18" value="e" id="q18-e" required><label for="q18-e">I don't know</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Sophia has $1,000. She will earn 8% interest compounded annually. How much money will she have in two years?<br>
										<input type="radio" name="q19" value="a" id="q19-a" required><label for="q19-a">$1,016</label><br>
										<input type="radio" name="q19" value="b" id="q19-b" required><label for="q19-b">$1,080</label><br>
										<input type="radio" name="q19" value="c" id="q19-c" required><label for="q19-c">$1,166</label><br>
										<input type="radio" name="q19" value="d" id="q19-d" required><label for="q19-d">$1,800</label><br>
										<input type="radio" name="q19" value="e" id="q19-e" required><label for="q19-e">I don't know</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Instead of bringing a lunch from home (at a cost of $2), you went out to eat with your friends at a local restaurant. Your meal cost $10. What is the opportunity cost of your choice?<br>
										<input type="radio" name="q20" value="a" id="q20-a" required><label for="q20-a">$10</label><br>
										<input type="radio" name="q20" value="b" id="q20-b" required><label for="q20-b">$8</label><br>
										<input type="radio" name="q20" value="c" id="q20-c" required><label for="q20-c">$12</label><br>
										<input type="radio" name="q20" value="d" id="q20-d" required><label for="q20-d">$0 – There is no opportunity</label><br>
										<input type="radio" name="q20" value="e" id="q20-e" required><label for="q20-e">I don't know</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										If an investor only feels comfortable with her money invested in a savings account and government bonds, which of the following describes her risk tolerance?<br>
										<input type="radio" name="q21" value="a" id="q21-a" required><label for="q21-a">High</label><br>
										<input type="radio" name="q21" value="b" id="q21-b" required><label for="q21-b">Medium</label><br>
										<input type="radio" name="q21" value="c" id="q21-c" required><label for="q21-c">Low</label><br>
										<input type="radio" name="q21" value="d" id="q21-d" required><label for="q21-d">Aggressive</label><br>
										<input type="radio" name="q21" value="e" id="q21-e" required><label for="q21-e">I don't know</label>
									</label>
								</div>
							</div>
						</section>
						
						<section>
							<div class="grid-x grid-padding-x">
								<div class="small-12 cell">
									<label>
										Maria wants to have $100,000 in 20 years. The sooner she starts to save, the less dollars she’ll need to contribute to her savings because:<br>
										<input type="radio" name="q22" value="a" id="q22-a" required><label for="q22-a">The stock market will go up</label><br>
										<input type="radio" name="q22" value="b" id="q22-b" required><label for="q22-b">The interest rates will go up</label><br>
										<input type="radio" name="q22" value="c" id="q22-c" required><label for="q22-c">The interest on her savings will compound</label><br>
										<input type="radio" name="q22" value="d" id="q22-d" required><label for="q22-d">Her savings will pay dividends</label><br>
										<input type="radio" name="q22" value="e" id="q22-e" required><label for="q22-e">I don't know.</label>
									</label>
								</div>
							</div>
						</section>
						
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