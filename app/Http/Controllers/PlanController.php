<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Models\Card;
use App\Models\Feature;
use App\Models\Plan;
use App\Models\Preference;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function viewAbout(){
        $plans = Plan::orderBy('updated_at', 'desc')->take(5)->get();
        $cards = Card::where('isImage', false)->take(6)->get();
        $cardAbout = Card::where('isImage', true)->first();
        $preference = Preference::all()->first();
        return view('pages.about', compact('plans', 'cards', 'cardAbout', 'preference'));
    }

    public function index(){
        $plans = Plan::paginate(10);
        $data = Plan::all()->first();

        return view('plan.index', compact('plans', 'data'));
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

    public function deleteAll(){
        $plans = Plan::all();
        foreach($plans as $plan){
            $plan->delete();
        }

        return back()->with('customMessage', 'All Plans Deleted');
    }

    public function deleteSelected(Request $request){
        $selected = $request->plansSelected;

        foreach($selected as $i){
            $planDeleted = Plan::where('id', $i)->first();
            $planDeleted->delete();
        }
        return back()->with('customMessage', 'Plans Selected Deleted');
    }

}
