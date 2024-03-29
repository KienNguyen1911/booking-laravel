<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'price',
        'description',
        'user_id',
    ];

    // Local Scope

    public function scopeSearch($query)
    {
        $query = Motel::query();
        if (!empty(request()->name)) {
            $query->where('name', 'like', '%' . request()->name . '%');
        }
        if (!empty(request()->price)) {
            $query->orderBy('price', request()->price);
        }
        if (!empty(request()->acreage)) {
            $query->where('acreage', request()->acreage);
        }
        if (!empty(request()->province_id)) {
            $query->where('province_id', request()->province_id);
        }
        if (!empty(request()->district_id)) {
            $query->where('district_id', request()->district_id);
        }
        if (!empty(request()->ward_id)) {
            $query->where('ward_id', request()->ward_id);
        }

        return $query;
    }

    public function scopeName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

    public function scopePrice($query, $price)
    {
        // orderBy('price', 'asc') => orderBy('price', 'desc')
        if ($price == 'asc') {
            return $query->orderBy('price');
        } else {
            return $query->orderByDesc('price');
        }
    }

    public function scopeProvince($query, $province)
    {
        return $query->where('province_id', $province);
    }

    public function scopeDistrict($query, $district)
    {
        return $query->where('district_id', $district);
    }

    public function scopeWard($query, $ward)
    {
        return $query->where('ward_id', $ward);
    }

    public function scopeAttr($query, $attr)
    {
        return $query->where('attr', 'like', '%' . $attr . '%');
    }

    public function scopeAcreage($query, $acreage)
    {
        return $query->where('acreage', $acreage);
    }

    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'motel_id', 'id');
    }

    public function attrs()
    {
        return $this->belongsToMany(Attr::class, 'motel_attrs', 'motel_id', 'attr_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }

    public function getAttrAttribute($value)
    {
        return explode(',', $value);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'motel_id', 'id');
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, Booking::class, 'motel_id', 'booking_id', 'id', 'id');
    }
}
