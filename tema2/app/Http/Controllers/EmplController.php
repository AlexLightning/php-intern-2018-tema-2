<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmplController extends Controller
{
    public function showPage(){
        $empls = \App\Employee::all();
        $comps = \DB::table('companies')->groupBy('name')->pluck('name');
        return view('pages.employees',compact('empls','comps'));
    }

    public function create(){
        $comps = \DB::table('companies')->groupBy('name')->pluck('name');
        return view ('pages.createempl',['comps' => $comps]);
    }

    public function store(){
        $this->validate(request(), [
            'name' => 'required|max:50'
        ]);
        $chosencomp = \App\Employee::getNameFromID();
        \App\Employee::saveEmp($chosencomp);
        return redirect ('/employees');
    }

    public function update(Request $request){
        $id = $request->id;
        $toUpdate = \App\Employee::find($id);
        $request->validate([
            'name' => 'required|max:25',
        ]);
        $toUpdate->name = $request->name;
        $company_name = $request->company;
        $company = \App\Company::where('name',$company_name)->pluck('id');
        $toUpdate->company_id = $company[0];
        $toUpdate->save();
        return redirect ('/employees');
    }

    public function destroy(Request $request){
        $id = $request->id;
        $toDelete= \App\Employee::find($id);
        $toDelete ->delete();
        return redirect ('/employees');
    }
}
