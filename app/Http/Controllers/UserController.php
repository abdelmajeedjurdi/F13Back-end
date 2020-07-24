<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        if(!$user){
            return response()->json([
                'status'=>'failed',
                'message'=>'user is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>$user
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
        $user=new User();
        $user->fill($input);
        $user->save();
        if(!$user){
            return response()->json([
                'status'=>'failed',
                'message'=>'users is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>$user
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
        $user=User::where('id',$id)->first();
        if(!$user){
            return response()->json([
                'status'=>'failed',
                'message'=>'user is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>$user
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
        $user=User::where('id',$id)->first();
        if(!$user){
            return response()->json([
                'status'=>'failed',
                'message'=>'users is not found'
            ],500);
        }

        $user->update($input);
        $user->save();
        
        return response()->json([
            'status'=>'success',
            'data'=>$user
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
        $user=User::where('id',$id)->delete();
        if(!$user){
            return response()->json([
                'status'=>'failed',
                'message'=>'user is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>User::all()
        ],200);
    }
}
