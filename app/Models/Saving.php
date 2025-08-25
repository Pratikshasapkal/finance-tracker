<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Saving extends Model
{

    use HasFactory;

    // Define the table if not following Laravel naming conventions
    protected $table = 'savings';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'goal',
        'amount',
        'saved_amount',
        'target_date',
        'user_id',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
