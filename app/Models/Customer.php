<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ["Cus_Fname", "Cus_Lname", "Cus_Address", "Cus_ContactNo", "Email", "Password", "Username", "Username"];
}
