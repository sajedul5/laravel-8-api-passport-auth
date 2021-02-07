<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Validator;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::all();
        return $data;
    }

    public function findData($id)
    {
        $data = Blog::find($id);
        if( $data ){
            return $data;
        }else{
            return 'No Data!';
        }
    }

    public function addData(Request $request)
    {
        $data = new Blog;
        $data->title = $request->title;
        $data->details = $request->details;
        $result = $data->save();

        if($result){
            return ['result' => 'Data saved!'];
        }else{
            return ['result' => 'Data not saved!'];
        }

    }

    // public function updateData(Request $request)
    // {
    //     $data = Blog::find($request->id);
    //     $data->title = $request->title;
    //     $data->details = $request->details;
    //     $result = $data->save();

    //     if($result){
    //         return ['result' => 'Data update!'];
    //     }else{
    //         return ['result' => 'Data not update!'];
    //     }
    // }

    public function updateData(Request $request, $id)
    {
        $data = Blog::find($id);
        $data->title = $request->title;
        $data->details = $request->details;
        $result = $data->save();

        if($result){
            return ['result' => 'Data update!'];
        }else{
            return ['result' => 'Data not update!'];
        }
    }

    public function deleteData($id)
    {
        $data = Blog::find($id);
        $result = $data->delete();
        
        if($result){
            return ['result' => 'Data Delete!'];
        }else{
            return ['result' => 'Data not delete!'];
        }
    }

    public function search($paran)
    {
        $data = Blog::where('title', 'like', "%" .$paran. "%")->get();
        if($data){
            return $data;
        }else{
            return 'No Data!';
        }
    }


    public function validatorData(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'details' => 'required',
        );
        $validator = validator::make($request->all(), $rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
            return ['result' => 'Valid Request'];
        }
    }

}
