<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    
    public function index() {


        return Services::all();
    }

    public function show($id) {

       
        try {
            $services = Services::findOrFail($id);

            return $services;

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Service not found'
            ], 404);
        }
    }


    public function store(Request $request) 
    
    {

        $services = new Services;

        $services->name = $request->name;

        $services->description = $request->description;

        $services->save();

        $data = [

            'message' => 'Service created successfully',
            'service' => $services

        ];

        return response()->json($data, 201);
        
    }

    public function update(Request $request, $id) {

        $services = Services::findOrFail($id);
        $services->update($request->all());

        return $services;
    }

    public function destroy($id) {

        try {
            $services = Services::findOrFail($id);
            $services->delete();
            $data = [

                'message' => 'Service deleted successfully',
                'service' => $services
    
            ];
            return response()->json($data, 200);

        } catch (ModelNotFoundException $e) {
            
            return response()->json([
                'error' => 'Service not found'
            ], 404);
        }
    }
}
