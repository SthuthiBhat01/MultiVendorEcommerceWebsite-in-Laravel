<?php

namespace App\Http\Controllers;

use App\Models\AdditionalDetail;
use Illuminate\Http\Request;

class AdditionalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function additionalInformation()
    {
        $additionalDetails = AdditionalDetail::all();
        return view('adminfrontend.additional-info', compact('additionalDetails'));
    }
    
 /**
     * Store a newly created resource in storage.
     */
    
    public function storeAdditionalInfo(Request $request)
    {
        $request->validate([
            'supported_by' => 'required|string',
            'privacy_policy' => 'required|string',
            'code_of_conduct' => 'required|string',
            'general_terms' => 'required|string',
        ]);

        AdditionalDetail::create($request->all());

        return redirect()->route('additionalinfo')->with('success', 'Information added successfully!');
    }
   
   

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function editAdditionalInfo($id)
    {
        $additionalDetail = AdditionalDetail::findOrFail($id);
        return view('adminfrontend.edit-additional-info', compact('additionalDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAdditionalInfo(Request $request, $id)
    {
        $request->validate([
            'supported_by' => 'required|string',
            'privacy_policy' => 'required|string',
            'code_of_conduct' => 'required|string',
            'general_terms' => 'required|string',
        ]);

        $additionalDetail = AdditionalDetail::findOrFail($id);
        $additionalDetail->update($request->all());

        return redirect()->route('additionalinfo')->with('success', 'Information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteAdditionalInfo($id)
    {
        $additionalDetail = AdditionalDetail::findOrFail($id);
        $additionalDetail->delete();

        return redirect()->route('additionalinfo')->with('success', 'Information deleted successfully!');
    }
}
