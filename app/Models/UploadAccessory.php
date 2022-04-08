<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadAccessory extends Model
{
    use HasFactory;
    public function product()
    {
        //many to many 
        return $this->belongsTo(Product::class, 'product_id');
    }
}
