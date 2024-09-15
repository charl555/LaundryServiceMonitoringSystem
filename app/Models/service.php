<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class service extends Model
{
    use SoftDeletes;

    use HasFactory;

    
                public function laundryitems()
            {
                return $this->hasOne(Laundryitems::class, 'ServiceID', 'id');
            }

            public function payments()
            {
                return $this->hasOne(Payments::class, 'ServiceID', 'id');
            }

            
            
    protected $table = 'service';
    protected $fillable = [
        'user_id',
        'ServiceDetails',
        'PickupDate',
        'status',
    ];
}
