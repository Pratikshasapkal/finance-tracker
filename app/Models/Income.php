<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{

    use HasFactory;
    protected $fillable = [
        'source',
        'amount',
        'date',
        'user_id',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
