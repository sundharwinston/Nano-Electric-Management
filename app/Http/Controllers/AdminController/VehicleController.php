<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Vehicle;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      if(request()->ajax()){
            $Vehicle =  Vehicle::get();
            return DataTables::of($Vehicle)
              ->addColumn('action',
                    '<a href="{{ action(\'AdminController\VehicleController@edit\',[$id]) }}" class="btn btn-info text-right py-10 align-middle btn-group btn-group-sm" ><i class="fas fa-eye"></i></a>
                    <a href="{{ action(\'AdminController\VehicleController@destroy\',[$id]) }}" class=" text-right py-10 align-middle btn-group btn-group-sm btn btn-danger Delete" data-toggle="tooltip" data-placement="right" DeleteMessage="Delete Vehicle"><i class="fa fa-trash"></i></a>'
                )
                ->rawColumns(['action'])->make(true);
        }
        return view('admin.vehicle.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicle.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate(request(),[
            'customer_name'=>'required',
            'mobile_number'=>'required',
            'address'=>'required',
            'vehicle_id'=>'required',
            'vehicle_model'=>'required',
            'vehicle_number'=>'required',
           
        ]);

         // return request()->all();
         try {
            $Vehicle = new Vehicle;
            $Vehicle->customer_name = request('customer_name');
            $Vehicle->address = request('address');
            $Vehicle->mobile1 = request('mobile1');
            $Vehicle->mobile2 = request('mobile2');
            $Vehicle->vehicle_id = request('vehicle_id');
            $Vehicle->vehicle_model = request('vehicle_model');
            $Vehicle->vehicle_number = request('vehicle_number');
            $Vehicle->save();
            return redirect(action('AdminController\VehicleController@index'))->with('success',['Vehicle','Created Successfully']);
        }catch (\Exception $e){
            return back()->with('danger','Something went wrong!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         try {
            $Data['Vehicle'] = Vehicle::findorfail($id);
            return view('admin.vehicle.create',$Data);
        }catch (\Exception $e){
            return back()->with('sorry','Sorry,Something went wrong!');
        }
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
       $this->validate(request(),[
            'customer_name'=>'required',
            'mobile_number'=>'required',
            'address'=>'required',
            'engine_id'=>'required',
            'vehicle_model'=>'required',
            'vehicle_number'=>'required',
           
        ]);

         try {
            $Vehicle_update =Vehicle::findorfail($id);
            $Vehicle_update->customer_name = request('customer_name');
            $Vehicle_update->address = request('address');
            $Vehicle_update->mobile1 = request('mobile1');
            $Vehicle_update->mobile2 = request('mobile2');
            $Vehicle_update->vehicle_id = request('vehicle_id');
            $Vehicle_update->vehicle_model = request('vehicle_model');
            $Vehicle_update->vehicle_number = request('vehicle_number');
            $Vehicle_update->save();
            return redirect(action('AdminController\VehicleController@index'))->with('success',['Vehicle','Updated Successfully']);
        }catch (\Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
          try {
            Vehicle::findorfail($id)->delete();
            return $output = ['status' => 'success','msg' => 'Vehicle Deleted Successfully'];
        }catch (Exception $e){
            return back()->with('sorry','Sorry,Something went wrong!');
        }
    }
}
