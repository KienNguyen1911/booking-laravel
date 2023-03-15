<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    use HasFactory;

    public function motels()
    {
        return $this->belongsToMany(Motel::class, 'motel_attrs', 'attr_id', 'motel_id');
    }
}
