<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Models\Feature;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function viewAbout(){

        $plans = Plan::all();

        return view('pages.about', compact('plans'));
    }

    public function index(){
        $plans = Plan::all();

        return view('plan.index', compact('plans'));
    }

    public function create(){
        return view('plan.create');
    }

    public function store(PlanRequest $request){
        Plan::create($request->all());

        return redirect()->route('plan.index');
    }

    public function show($id){
        $plan = Plan::find($id);

        return view('plan.show', compact('plan'));
    }

    public function edit(Plan $plan){
        return view('plan.edit', compact('plan'));
    }

    public function addFeature(Request $request){
        $request->validate([
            'name' => 'required',
            'plan_id' => 'required'
        ]);
        Feature::create($request->all());

        return back()->with('customMessage', 'Feature saved');
    }

    public function deleteFeature(Feature $feature){
        $feature->delete();

        return back()->with('customMessage', 'Deleted');
    }

    public function update(PlanRequest $request, Plan $plan){
        $plan->update($request->all());

        return redirect()->route('plan.index')->with('customMessage', 'Updated');
    }

    public function destroy(Plan $plan){
        $plan->delete();

        return redirect()->route('plan.index')->with('customMessage', 'Deleted');
    }

}
