<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    $categories = Category::where('status','1')->get();
    return view('adminfrontend.main-category', compact('categories'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255', 
            
        ]);
    
        $data=array(
            'name'=>$request->name,
            'category_id'=>$request->category_id,
        );
        $create=Category::create($data);
        return redirect()->route('adminfrontend.main-category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Request $request ,Category $category)
    {
        $id=$request->id;
        $categories=Category::whereNull('category_id')->get();
        $category=Category::find($id);
        return view('adminfrontend.edit',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $id=$request->id;
        $data=array(
            'name'=>$request->name,
            'category_id'=>$request->category_id,
        );
        $category=Category::find($id);
        $category->update($data);
        return redirect()->route('adminfrontend.main-category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
    


}
