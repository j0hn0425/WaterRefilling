<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'User_id',
        'Product_id',
        'Quantity',
        'Amount',
        'Total_amount',
        'Date',
        'Status',
    ];
}
