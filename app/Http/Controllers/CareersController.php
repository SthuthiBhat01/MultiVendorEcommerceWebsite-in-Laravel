<?php

namespace App\Http\Controllers;

use App\Models\Careers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCareer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comp_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'job_requirements' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string',
            'salary' => 'required|string|max:255',
            'experience_level' => 'required|string',
            'application_deadline' => 'required|date',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $career = new Careers();
        $career->comp_name = $request->comp_name;
        $career->job_title = $request->job_title;
        $career->job_description = $request->job_description;
        $career->job_requirements = $request->job_requirements;
        $career->location = $request->location;
        $career->job_type = $request->job_type;
        $career->salary = $request->salary;
        $career->experience_level = $request->experience_level;
        $career->application_deadline = $request->application_deadline;

        if ($request->hasFile('company_logo')) {
            $logoName = time().'.'.$request->company_logo->extension();
            $request->company_logo->move(public_path('uploads/'), $logoName);
            $career->company_logo = $logoName;
        }

        $career->save();

        return redirect()->route('addcareers')->with('success', 'Career added successfully.');
    }
    public function listCareers()
    {
        $careers = Careers::all();
        return view('adminfrontend.Careers.careers-list',compact('careers'));
        // return view('', compact('careers'));
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Careers $careers)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editCareer($id)
    {
        $career = Careers::findOrFail($id);
        return view('adminfrontend.Careers.edit-careers', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCareer(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'comp_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'job_requirements' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string',
            'salary' => 'required|string|max:255',
            'experience_level' => 'required|string',
            'application_deadline' => 'required|date',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $career = Careers::findOrFail($id);
        $career->comp_name = $request->comp_name;
        $career->job_title = $request->job_title;
        $career->job_description = $request->job_description;
        $career->job_requirements = $request->job_requirements;
        $career->location = $request->location;
        $career->job_type = $request->job_type;
        $career->salary = $request->salary;
        $career->experience_level = $request->experience_level;
        $career->application_deadline = $request->application_deadline;

        if ($request->hasFile('company_logo')) {
            $logoName = time().'.'.$request->company_logo->extension();
            $request->company_logo->move(public_path('uploads/'), $logoName);
            $career->company_logo = $logoName;
        }

        $career->save();

        return redirect()->route('addcareers')->with('success', 'Career updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function deleteCareer($id)
    {
        $career = Careers::findOrFail($id);
        $career->delete();
        return redirect()->route('addcareers')->with('success', 'Career deleted successfully.');
    }
}
