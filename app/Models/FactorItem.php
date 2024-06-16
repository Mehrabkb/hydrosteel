<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactorItem extends Model
{
    use HasFactory;
    protected $table = 'factor_items';
    protected $primaryKey = 'factor_item_id';
    public $timestamps = false;

}
