<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiBaiViet extends Model
{
    use HasFactory;
    protected $table='loaibaiviet';
    protected $primaryKey = 'id_loaibaiviet';
    public $timestamps = false;
}
