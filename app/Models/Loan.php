<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'loan_amount', 'loan_term', 'expected_amount', 'loan_interest_rate', 'payment_per_month', 'loan_end_date', 'loan_start_date'
    ];
}
