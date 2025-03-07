<?php
namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function index()
    {
        $Category = Category::paginate(10); 
        return view('Category', [
            "result" => $Category,
        ]);
    }

    public function delete($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
        return redirect()->route('categories')->with("message", "deleted successfully");
    }

    public function create()
    {
        return view('Category/create');
    }

    public function savenew(Request $item)
    {
        $item->validate([
            'name' => 'required',
        ]);
       
        Category::create([
            "name" => $item->name,
        ]);

        return redirect()->route('categories')->with("message", "Created Successfully");
    }

    public function edit($id)
    {
        $Category = Category::findOrFail($id);
        return view("Category/edit", ["result" => $Category]);
    }

    public function saveedit(Request $request)
    {
        $old_id = $request->old_id;
        $Category = Category::findOrFail($old_id);

        $request->validate([
            'name' => 'required',
        ]);
        $Category->update([
            "name" => $request->name,
        ]);
        return redirect()->route("categories")->with("message", "edited successfully");
    }
}
