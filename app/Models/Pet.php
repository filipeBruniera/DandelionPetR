<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'name',
        'species',
        'breed',
        'birth_date',
        'photo',
    ];

    public function reminders()
    {
        return $this->hasMany(\App\Models\Reminder::class);
    }
}
