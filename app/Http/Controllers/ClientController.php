<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
       
         $client = client::index();
         return view('client/index', compact('client'))->with('i', (request()->input('page', 1) - 1) * 10);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client/add');
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
            'name'=>'required',
            'email'=>'email',
            'phone'=>'max:15'
        ]);
      $clint = Client::create($request->all());
     return redirect()->route('clients.index')->with('success', 'client is successfully saved');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $edit_client = client::find($id);       
        return view('Client.edit',compact('edit_client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Client $Client)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'email',
            'phone'=>'max:15'
        ]);
  
        $Client->update($request->all());
  
        return redirect()->route('clients.index')
                        ->with('success','client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $Client)
    {
         $Client->delete();
  
        return redirect()->route('clients.index')
                        ->with('success','Client deleted successfully');
    }
}
