@component('mail::message')
# STARS Report Reviewer

You have been invited to review semi-finalist reports in our Stars Program. Below is your login information - if you have additional questions, please reach out to us!

Email: {{ $email }}

Password: {{ $password }}

@component('mail::button', ['url' => 'https://portfolio.investedok.org'])
Login
@endcomponent

@endcomponent