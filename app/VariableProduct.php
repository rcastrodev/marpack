<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariableProduct extends Model
{
    protected $fillable = ['product_id', 'code', 'name', 'extra'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
