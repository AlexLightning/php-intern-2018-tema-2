<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    public function corp(){
        return $this->hasMany(Employee::class);
    }
}
