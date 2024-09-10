<?php

namespace App\Http\Controllers;

use App\Models\NewsEvents;
use Illuminate\Http\Request;
use Validator;

class NewsEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsEvents = NewsEvents::all();
        return view('adminfrontend.listnewsevents',compact('newsEvents'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminfrontend.newseventscreate');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $newsEvent = new NewsEvents;
        $newsEvent->title = $request->title;
        $newsEvent->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/news_events'), $imageName);
            $newsEvent->image = $imageName;
        }

        $newsEvent->save();

        return redirect()->route('news_events.index')->with('success', 'News/Event added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsEvents $newsEvents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $newsEvent = NewsEvents::findOrFail($id);
       
        return view('adminfrontend.editnewsevents',compact('newsEvent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $newsEvent = NewsEvents::findOrFail($id);
    $newsEvent->title = $request->title;
    $newsEvent->description = $request->description;

    if ($request->hasFile('image')) {
        // Delete the old image if exists
        if ($newsEvent->image) {
            unlink(public_path('uploads/news_events').'/'.$newsEvent->image);
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/news_events'), $imageName);
        $newsEvent->image = $imageName;
    }

    $newsEvent->save();

    return redirect()->route('news_events.index')->with('success', 'News/Event updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $newsEvent = NewsEvents::findOrFail($id);

        // Delete the image if exists
        if ($newsEvent->image) {
            unlink(public_path('uploads/news_events').'/'.$newsEvent->image);
        }

        $newsEvent->delete();

        return redirect()->route('news_events.index')->with('success', 'News/Event deleted successfully.');
    }
}
