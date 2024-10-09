<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function CategoryIndex() {
        return view('category.index',[
            'categories'=>Category::all()
        ]);
    }

    public function CategoryCreate() {
        return view('category.create');
    }

    public function CategoryStore(Request $request) {
        $request->validate([
            'name'=>'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        Session::flash('success_message','Category Created Successfully!');
        return redirect()->route('category.index');
    }

    public function CategoryEdit($id) {
        return view('category.edit', [
            'category'=>Category::findOrFail($id)
        ]);
    }

    public function CategoryUpdate(Request $request, $id) {
        $request->validate([
            'name'=>'required'
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('success_message','Category Updated Successfully!');
        return redirect()->route('category.index');
    }

    public function CategoryDelete($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('success_message','Category Deleted Successfully!');
        return redirect()->route('category.index');
    }
}
