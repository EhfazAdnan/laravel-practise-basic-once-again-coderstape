<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    // fillable example
    // protected $fillable = ['name','email','active'];

    // guarded example
    protected $guarded = [];

    protected $attributes = [
        'active' => 1
    ];

    // laravel accessors and mutators to make 0=inactive and 1=active for this model
    public function getActiveAttribute($attribute){
        return [
           0 => 'Inactive',
           1 => 'Active',
        ][$attribute];
    }

    public function scopeActive($query){
        return $query->where('active', 1);
    }

    public function scopeInactive($query){
        return $query->where('active', 0);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
