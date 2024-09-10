<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
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
    public function storeTestimonial(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        Testimonial::create([
            'name' => $request->name,
            'position' => $request->position,
            'company' => $request->company,
            'testimonial' => $request->testimonial,
            'rating' => $request->rating,
        ]);

        return redirect()->route('addtestimonials')->with('success', 'Testimonial added successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function listTestimonials()
    {
        $testimonials = Testimonial::all();
        return view('adminfrontend.Testimonials.list-testimonials', compact('testimonials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('adminfrontend.Testimonials.edit-testimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateTestimonial(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update([
            'name' => $request->name,
            'position' => $request->position,
            'company' => $request->company,
            'testimonial' => $request->testimonial,
            'rating' => $request->rating,
        ]);

        return redirect()->route('listtestimonials')->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('listtestimonials')->with('success', 'Testimonial deleted successfully!');
    }
}
