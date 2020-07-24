<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Table::all();
        if(!$table){
            return response()->json([
                'status'=>'failed',
                'message'=>'table is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>$table
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
        $table=new Table();
        $table->fill($input);
        $table->save();
        if(!$table){
            return response()->json([
                'status'=>'failed',
                'message'=>'table is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>Table::all()
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
        $table=Table::where('id',$id)->first();
        if(!$table){
            return response()->json([
                'status'=>'failed',
                'message'=>'table is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>$table
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
        $table=Table::where('id',$id)->first();
        if(!$table){
            return response()->json([
                'status'=>'failed',
                'message'=>'table is not found'
            ],500);
        }

        $table->update($input);
        $table->save();
        
        return response()->json([
            'status'=>'success',
            'data'=>$table
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
        $table=Table::where('id',$id)->delete();
        if(!$table){
            return response()->json([
                'status'=>'failed',
                'message'=>'table is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>Table::all()
        ],200);
    }
}
