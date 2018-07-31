<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    public static function getNameFromID(){
        $comp = new \App\Company;
        $comp->name=request('company');
        return \DB::table('companies')->where('name','=',$comp->name)->pluck('id');
    }
    public static function saveEmp($chosencomp){
        $empl = new \App\Employee;
        $empl->name=request('name');
        $empl->company_id=$chosencomp[0];
        $empl->save();
    }
    public function human(){
        return $this->belongsTo(Company::class,'company_id');
    }
}
