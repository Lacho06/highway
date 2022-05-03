<?php

namespace App\Http\Controllers;

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

    public function store(Request $request){

    }

    public function show($id){
        $plan = Plan::find($id);

        return view('plan.show', compact('plan'));
    }

    public function edit(Plan $plan){
        return view('plan.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan){

    }

    public function destroy(Plan $plan){

    }

}
