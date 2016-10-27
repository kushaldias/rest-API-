<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Car;
use App\Http\Requests;
use Exception;
use Input;


class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        //$data = Car::all();
            $data = Car::getCarsFromMultipleParms(Input::get('car_name'),Input::get('user_id'));
            
            if($data->isEmpty())
            {
                return response()->json(['status'=>404, 'message'=>'no data found']);
            }
            else
            {
                return response()->json(['status'=>200, 'data'=>$data]);
            }
        }
        catch(Exception $e){
            return response()->json(['status'=>500, 'message'=>$e]);
        }
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
        $data = $request->input('car_name');
        $dataone = $request->input('user_id');
        
        try{
            if(empty($data) || empty($dataone))
            {
                return response()->json(['status'=>404, 'message'=>'not enough input parameters']);
            }
            else
            {
                $created = Car::create([
                'car_name' => $data,
                'user_id' => $dataone
                ]);
                return response()->json(['status'=>200, 'data'=>$created]);
            }
        }
        catch(Exception $e){
            return response()->json(['status'=>500, 'message'=>$e]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toshow = Car::find($id);
        
        try{
            if(empty($toshow))
            {
                return response()->json(['status'=>404, 'message'=>'no record found']);
            }
            else
            {
                $show = User::all();
                $items = array();
                $count = 0;
                foreach($show as $s)
                {
                    $items[$count++] = $s->name.'='.$s->car;
                }
                return response()->json(['status'=>200, 'data'=>$items]);
            }
        }
        catch(Exception $e)
        {
            return response()->json(['status'=>500, 'message'=>$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $toupdate = Car::find($id);
        try{
            if(empty($toupdate))
            {
                return response()->json(['status'=>404, 'message'=>'no car found to update']);
            }
            else
            {
                 $data = $request->input('car_name');
                 $dataone = $request->input('user_id');
                
                $updated = Car::where('id', $id)->update(['car_name'=>$data, 'user_id'=>$dataone]);
                
                return response()->json(['status'=>200, 'data'=>$updated]);
            }
        }
        catch(Exception $e){
            return response()->json(['status'=>500, 'message'=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todelete = Car::find($id);
        try{
            if(empty($todelete))
            {
                return response()->json(['status'=>404, 'message'=>'no car found to delete']);
            }
            else
            {
                $deleted = $todelete->delete();
                return response()->json(['status'=>200, 'data'=>$deleted]);
                
            }
        }
        catch(Exception $e){
            return response()->json(['status'=>500, 'message'=>$e]);
        }
    }
}
