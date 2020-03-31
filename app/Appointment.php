<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\client;
class Appointment extends Model
{
	protected $guarded = ['id'];
    public function scopegetclient(){
     	$client = client::latest()->paginate(10);
     	return $client;
   }

   //display client data
	public function scopeindex(){
     	$appointment = Appointment::join('clients','clients.id','appointments.client')->select('appointments.id','appointments.start_time','appointments.employee','appointments.finish_time','appointments.price','appointments.comments','clients.id as client_id','clients.name','appointments.created_at')->latest()->paginate(10);
     	return $appointment;
   }
}
