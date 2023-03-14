<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'price',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function attrs()
    {
        return $this->belongsToMany(Attr::class);
    }
}
