<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mymodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MymodelController extends Controller
{
    //getting all 3dmodels
    public function index()
    {
        //fetching all models from database
        $models = Mymodel::all();
        if ($models->count() > 0) {
            return response()->json([
                'status' => 200,
                'models' => $models
            ], 200);
        } else 
        {
            return response()->json([
                'status' => 404,
                'message' =>'No Recored for 3d models Found'
            ],404);
        }
    }
    //creating a 3dmodel
    public function store(Request $request)
    {
    //validating our input data
     $validator=Validator::make($request->all(),[
        'modelname'=>'required|string|max:191',
        'modeldescribtion'=>'required|string|max:191',
        'modelphoto'=>'required|string|max:191',
        'modelpath'=>'required|string|max:191'
     ]);
     if($validator->fails())
     {
        return response()->json([
            'status' => 422,
            'errors' => $validator->messages()
        ],422);
     }
     else{
     $model=Mymodel::create([
        'modelname'=>$request->modelname,
        'modeldescribtion'=>$request->modeldescribtion,
        'modelphoto'=>$request->modelphoto,
        'modelpath'=>$request->modelpath
     ]);
     }
     if($model)
     {
        return response()->json([
            'status' => 200,
            'message' => '3D model Created successfully !'
        ],200);
     }else{
        return response()->json([
            'status' => 500,
            'message' => 'some thing went wrong during creating 3d model'
        ],500);
     }

    }
    //getting a3dmodel by its id
    public function show($id)
    {

         $model=Mymodel::find($id);
         if($model)
         {

            return response()->json([
                'status' => 200,
                'model' => $model
            ],200);
         }else{
            return response()->json([
                'status' => 404,
                'errors' => 'No such 3D model found'
            ],404);
         }
    }
     //editting a3dmodel by its id
     public function edit($id)
     {
 
          $model=Mymodel::find($id);
          if($model)
          {
 
             return response()->json([
                 'status' => 200,
                 'model' => $model
             ],200);
          }else{
             return response()->json([
                 'status' => 404,
                 'message' => 'No such 3D model found'
             ],404);
          }
     }

     public function update(Request $request,int $id)
     {

        //validating our input data
     $validator=Validator::make($request->all(),[
        'modelname'=>'required|string|max:191',
        'modeldescribtion'=>'required|string|max:191',
        'modelphoto'=>'required|string|max:191',
        'modelpath'=>'required|string|max:191'
     ]);
     if($validator->fails())
     {
        return response()->json([
            'status' => 422,
            'errors' => $validator->messages()
        ],422);
     }
     else{
     $model=Mymodel::find($id);
     $model->update([
        'modelname'=>$request->modelname,
        'modeldescribtion'=>$request->modeldescribtion,
        'modelphoto'=>$request->modelphoto,
        'modelpath'=>$request->modelpath
     ]);
     }
     if($model)
     {
        $model->update([
            'modelname'=>$request->modelname,
            'modeldescribtion'=>$request->modeldescribtion,
            'modelphoto'=>$request->modelphoto,
            'modelpath'=>$request->modelpath
         ]);
        return response()->json([
            'status' => 200,
            'message' => '3D model Updated successfully !'
        ],200);
     }else{
        return response()->json([
            'status' => 404,
            'message' => 'No such 3d model Found'
        ],404);
     }
     }
     public function destroy($id)
     {
        $model=Mymodel::find($id);
        if($model)
        {
            $model->delete();
             return response()->json([
                'status' => 200,
                'message' => 'the 3d model deleted successfully'
            ],200);
           
        }else
        {
            return response()->json([
                'status' => 404,
                'message' => 'No such 3d model Found'
            ],404);  
        }
     }
}
