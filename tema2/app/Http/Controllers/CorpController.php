<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CorpController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function showPage(){
        $comps = Company::all();
        $comp = new Company;
        return view('pages.companies',compact('comps','comp'));
    }

    public function create(){
        return view ('pages.createcomp');
    }

    public function store(){
        $this->validate(request(), [
            'name' => 'required|max:25',
            'description' => 'required'
        ]);
        Company::create(request(['name','description']));
        return redirect ('/companies');
    }

    public function update(Request $request){
        $id = $request->id;
        $toUpdate = Company::find($id);
        $request->validate([
            'name' => 'required|max:25',
            'description' => 'required'
        ]);
        $toUpdate->name = $request->name;
        $toUpdate->description = $request->description;
        $toUpdate->save();
        return redirect ('/companies');
    }

    public function destroy(Request $request){
        $id = $request->id;
        $toDelete= Company::find($id);
        $toDelete ->delete();
        return redirect ('/companies');
    }
}
