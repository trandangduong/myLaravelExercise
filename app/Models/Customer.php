<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [''];

    public function getActiveAttribute($attribute)
    {

        return[1=>'Active',0=>'Inactive',][$attribute];
    }
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

}
