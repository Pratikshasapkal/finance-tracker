<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{


    use HasFactory;

    // Define the table if not following Laravel naming conventions
    protected $table = 'expenses';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'category',
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
