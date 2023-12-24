<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    public $table = 'counters';
    protected $fillable = [
        'id', 'ip', 'country/city', 'user-agent', 'created_at', 'updated_at'	
    ];
}
