<?php

namespace App\Http\Controllers;

use App\Subcategory;
use Illuminate\Http\Request;
use App\Category;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::orderBy('id','desc')->get();
        return view('backend.subcategories.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $categories=Category::all();
        return view('backend.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|max:50',
            'category' => 'required'
        ]);

        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;

        $subcategory->save();

        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
          $categories=Category::all();
          return view('backend.subcategories.edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
       
        $request->validate([
            'name' => 'required|max:50',
            'category' => 'required'
        ]);

     
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;

        $subcategory->save();

        return redirect()->route('subcategories.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index');
    }
}
