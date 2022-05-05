<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'article',
        'name',
        'status',
        'data',
    ];

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available')->get();
    }

    public function getDataAttribute($value)
    {
        return json_decode($value);
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }
}
