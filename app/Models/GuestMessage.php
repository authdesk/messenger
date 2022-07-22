<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestMessage extends Model
{
    use HasFactory;

    public $timestamps = true;
    							
    protected $fillable = [
        'name',
        'message',
        'status',
        'is_read'
    ];
}
