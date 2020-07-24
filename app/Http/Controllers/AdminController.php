<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();
        if(!$admin){
            return response()->json([
                'status'=>'failed',
                'message'=>'admin is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>$admin
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $admin=new Admin();
        $admin->fill($input);
        $admin->save();
        if(!$admin){
            return response()->json([
                'status'=>'failed',
                'message'=>'admins is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>Admin::all()
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin=Admin::where('id',$id)->first();
        if(!$admin){
            return response()->json([
                'status'=>'failed',
                'message'=>'admin is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>$admin
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input=$request->all();
        $admin=Admin::where('id',$id)->first();
        if(!$admin){
            return response()->json([
                'status'=>'failed',
                'message'=>'admins is not found'
            ],500);
        }

        $admin->update($input);
        $admin->save();
        
        return response()->json([
            'status'=>'success',
            'data'=>$admin
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=Admin::where('id',$id)->delete();
        if(!$admin){
            return response()->json([
                'status'=>'failed',
                'message'=>'admin is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>Admin::all()
        ],200);
    }
}
