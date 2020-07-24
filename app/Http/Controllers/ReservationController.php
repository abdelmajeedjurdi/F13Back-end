<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reservation::all();
        if(!$reservation){
            return response()->json([
                'status'=>'failed',
                'message'=>'reservation is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>$reservation
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
        $reservation=new Reservation();
        $reservation->fill($input);
        $reservation->save();
        if(!$reservation){
            return response()->json([
                'status'=>'failed',
                'message'=>'reservation is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>Reservation::all()
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
        $reservation=Reservation::where('id',$id)->first();
        if(!$reservation){
            return response()->json([
                'status'=>'failed',
                'message'=>'reservation is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>$reservation
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmed($id)
    {
        $reservation=Reservation::where('id',$id)->first();
        $reservation->request = "true";
        $reservation->save();
        if(!$reservation){
            return response()->json([
                'status'=>'failed',
                'message'=>'reservation is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>$reservation
        ],200);
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
        $reservation=Reservation::where('id',$id)->first();
        if(!$reservation){
            return response()->json([
                'status'=>'failed',
                'message'=>'reservation is not found'
            ],500);
        }

        $reservation->update($input);
        $reservation->save();
        
        return response()->json([
            'status'=>'success',
            'data'=>$reservation
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
        $reservation=Reservation::where('id',$id)->delete();
        if(!$reservation){
            return response()->json([
                'status'=>'failed',
                'message'=>'reservation is not found'
            ],500);
        }
        return response()->json([
            'status'=>'success',
            'data'=>Reservation::all()
        ],200);
    }
}
