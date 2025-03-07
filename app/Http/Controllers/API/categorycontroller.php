<?php
namespace App\Http\Controllers\API;
use App\Model\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Categorycontroller extends Controller
{
   public function index(){
     $categories= CategoryResource::collection( Category::all());
     $data=[
        "msg"=>"all data from categories table",
        "status"=>200,
        "data"=>$categories
     ];
     return response()->json($data);
   }

   public function show($id){
     $categories= Category::find($id);
     if($categories){

        $data=[
            "msg"=>"return one record from categories table",
            "status"=>200,
            "data"=>new CategoryResource($categories)
        ];
        return response()->json($data);
     }else{
       $data=[
            "msg"=>"no such id ",
            "status"=>201,
            "data"=>null
       ];
       return response()->json($data);
     }
   }

   public function store(Request $request){

    $validate= Validator::make($request->all(), [
        'id' => 'required|unique:categories|max:20',
        'name' => 'required',
    ]);

    if ($validate->fails()) {
        $data=[
            "msg"=>"error in validation",
            "status"=>201,
            "data"=> $validate->errors()
          ];
          return response()->json($data);
    }

    
    $categories=Category::create([
     "id"=>$request->id,
     "name"=>$request->name,
    ]);

     $data=[
        "msg"=>"created successfully",
        "status"=>200,
        "data"=>new CategoryResource($categories)
    ];
      return response()->json($data);
    
   }

   public function delete(Request $request){
    $id= $request->id;
    $categories=Category::find($id);
    if($categories){
        $categories->delete();
        $data=[
            "msg"=>"deleted successfully",
            "status"=>200,
            "data"=>null
    
        ];
         return response()->json($data);
    } else {

        $data=[
            "msg"=>"no such id",
            "status"=>201,
            "data"=>null
    
        ];
         return response()->json($data);
    }
   }

   public function update(Request $request){
    $old_id= $request->old_id;
    $categories= Category::find($old_id);
      if($categories){
        $validate= Validator::make($request->all(), [
          'id' => [
             'required',
              Rule::unique('categories')->ignore($old_id),
          ],
          'name' => 'required',
          ]);
      
        if ($validate->fails()) {
          $data=[
              "msg"=>"error in validation",
              "status"=>201,
              "data"=> $validate->errors()
          ];
          return response()->json($data);
        }

    $categories->update([
      "id"=>$request->id,
      "name"=>$request->name,
    ]);
  
     $data=[
      "msg"=>"updated successfully",
      "status"=>200,
      "data"=> new CategoryResource($categories)
      
    ];
    return response()->json($data);
      }else{
        
          $data=[
          "msg"=>"no such id",
          "status"=>201,
          "data"=> null
      
          ];
          return response()->json($data);
      }
       

   }

}
