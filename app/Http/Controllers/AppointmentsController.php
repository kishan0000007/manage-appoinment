<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use Auth;
class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.

     *
     * @return \Illuminate\Http\Response
     */
     
    public function index($guard = null)
    {
        
             $Appointments = Appointment::index();
         return view('Appoinment/index', compact('Appointments'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        $get_clients=Appointment::getclient();
        return view('Appoinment/add',compact('get_clients'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client'=>'required',
            'employee'=>'required',
            'start_time'=>'required',
            'finish_time'=>'required',

        ]);

        $appointment = Appointment::create($request->all());
     return redirect()->route('appoinments.index')->with('success', 'Appointment is successfully saved');
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
        $get_clients=Appointment::getclient();
        $edit_appoinment = Appointment::find($id); 
        return view('Appoinment.edit',compact('get_clients','edit_appoinment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'client'=>'required',
            'employee'=>'required',
            'start_time'=>'required',
            'finish_time'=>'required',

        ]);


         $Appointment=Appointment::find($id);
         $Appointment->update($request->all());
  
        return redirect()->route('appoinments.index')
                        ->with('success','appoinments updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Appointment=Appointment::find($id);
        $Appointment->delete();
  
        return redirect()->route('appoinments.index')
                        ->with('success','Appoinments deleted successfully');
    }
}
