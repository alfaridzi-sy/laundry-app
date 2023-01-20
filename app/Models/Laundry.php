<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;

    protected $table        = 'laundries';
    protected $primaryKey   = 'laundry_id';
    protected $fillable     = ['laundry_id', 'name', 'finish_date', 'price', 'status', 'clothes', 'customer_name', 'customer_address', 'customer_phone_number'];
}
