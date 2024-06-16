<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;
    protected $table = 'factors';
    protected $primaryKey = 'factor_id';
    public $timestamps = false;
}
