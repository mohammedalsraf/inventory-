<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CatController extends Controller
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
        $cat=Category::latest()->get();
        return view('cat.cat',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_name'=> 'required',
            
       
        ]);
        $input = $request->all();
        Category::create($input);
        return redirect()->route('cat.create')->with('success','تم اضافة الصنف بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {



        $category = Category::findOrFail($id);

    // Delete all products related to this category
    $category->products()->delete();

    // Delete the category itself
    $category->delete();

    return redirect()->route('cat.create')
        ->with('success', 'تم الحذف بنجاح');
        // $category = Category::findOrFail($id);

        // // Find the ID of the "default" category or another category where you want to reassign products
        // $defaultCategoryId = 1; // Replace with the actual ID of the default category
    
        // // Update the products to the default category
        // Product::where('category_id', $category->id)->update(['category_id' => $defaultCategoryId]);
    
        // // Delete the category
        // $category->delete();
    
        // return redirect()->route('cat.create')
        //     ->with('success', 'تم الحذف بنجاح');
    }
}
