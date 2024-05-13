<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'landlord_id',
        'tenant_id',
    ];
}
