<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorsController extends Controller
{
     
     public function index()
     {
       return Sensor::paginate();
     }

     public function show($id){
         return Sensor::find($id);
 
     }
    
     public function store(Request $request){
         $this->validate($request,[
             'name' => 'required|unique:sensors',
             'type' => 'required',
             'value' => 'required',
             'date' => 'required',
             'user_id' => 'required',

         ]);
         $sensor = new Sensor();
         $sensor->fill($request->all());
         $sensor-> date = ('Y-m-d H:i:s');
         $sensor-> user_id = $request->user()->id;
         $sensor->save();
         return $sensor;
     }
    
     public function update(Request $request, $id){
        $sensor = Sensor::find($id);
         if(!$sensor) return response('', 404);
        $sensor->fill($request->all());
        $sensor->save();
         return$sensor;
     }
    
     public function delete($id){
        $sensor = Sensor::find($id);
         if(!$sensor) return response('', 404);
        $sensor->delete();
         return$sensor;
     }
 }