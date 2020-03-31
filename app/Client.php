<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $guarded = ['id']; 

	//display client data
	public function scopeindex(){
     	$client = client::latest()->paginate(10);
     	return $client;
   }
  
}

     
