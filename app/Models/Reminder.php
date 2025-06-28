<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'title',
        'description',
        'reminder_date',
        'completed',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}