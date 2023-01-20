<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    use HasFactory;

    protected $table        = 'cloths';
    protected $primaryKey   = 'cloth_id';
    protected $fillable     = ['cloth_id', 'detail', 'category', 'image', 'status'];
}
