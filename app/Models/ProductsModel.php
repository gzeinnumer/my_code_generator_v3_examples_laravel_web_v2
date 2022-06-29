<?php

namespace App\Models;

use App\MyApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ["name", "flag_active", "created_at", "updated_at"];
    protected $casts = MyApp::datetime;
}
