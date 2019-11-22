<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company','ticker','industry','sector','products_services','description','source','key_points','employee','question_one','answer_one','question_two','answer_two','question_three','answer_three','pe','earnings_per_share','market_cap','sales_growth','company_headquarters','year_company_founded','website'];
    
    public function portfolio()
    {
	    return $this->belongsTo(Portfolio::class);
    }
}
