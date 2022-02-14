<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
            'name', 'email', 'location', 'phone'
    ];

    public function loans(){
        return $this->hasMany(Loan::class);
    }

   //return total customers
   static public function countUsers(){
        echo Customer::all()->count();
    }
}
