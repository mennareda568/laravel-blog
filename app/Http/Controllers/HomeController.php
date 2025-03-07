<?php
namespace App\Http\Controllers;

use App\Model\Category;
use App\User;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{

    //home page
    public function index()
    {
        $Category = Category::count();
        $users = User::where('role', 'user')->count();

        return view('home', [
            "countcate" => $Category,
            "countusers" => $users
        ]);
    }

    //create admin
    public function create()
    {
        return view('user/create');
    }

    //savecreate admin
    public function save(Request $item)
    {
        $item->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = User::create([
            "name" => $item->name,
            "email" => $item->email,
            'password' => Hash::make($item['password']),
            "role" => $item->role,
        ]);

        Admin::create([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'gender' => $item->gender,
            'phone' => $item->phone,
        ]);

        return redirect()->route('admin')->with("message", "Created Successfully");
    }
}
