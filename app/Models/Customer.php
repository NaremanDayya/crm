<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'phone_number',
        'city', 'country', 'user_id'
    ];
    public static function boot()
    {
        parent::boot();
        static::creating(function (Customer $customer) {
            $customer->user_id = Auth::id();
        });
    }


    public function scopeUser(Builder $query)
    {
        $query->where('user_id', Auth::id());
    }

    public function getFullNameAttribute()
    {
        return strtoupper($this->first_name . " " . $this->last_name);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {

            $query->where('first_name', 'like', '%' . request('search') . '%')
                ->orWhere('last_name', 'like', '%' . request('search') . '%');
        }
    }
}
