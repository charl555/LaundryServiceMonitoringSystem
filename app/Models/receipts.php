<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipts extends Model
{
    use SoftDeletes;
    use HasFactory;

// app/Models/Receipts.php


    protected $fillable = [
        'user_id',
        'ServiceID',
        'Ammount',
        
    ];

    
  

}
    