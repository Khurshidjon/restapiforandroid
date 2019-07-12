<?php

namespace App\Http\Controllers;

use App\Models\RestApiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestApiModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = RestApiModel::all();
        return response()->json($result, 200);
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
        $rules = [
          'title' => 'required|string:max:255',
          'body' => 'required|string',
        ];
        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()){
            return response()->json($validate->errors(), 400);
        }
        $result = RestApiModel::create($request->all());
        return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RestApiModel  $restApiModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = RestApiModel::find($id);
        if (is_null($result)){
            return response()->json('Record not found', 404);
        }
        return response()->json($result, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestApiModel  $restApiModel
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
     * @param  \App\Models\RestApiModel  $restApiModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = RestApiModel::find($id);
        if (is_null($result)){
            return response()->json('Record not found', 404);
        }
        $rules = [
            'title' => 'required|string:max:255',
            'body' => 'required|string',
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()){
            return response()->json($validate->errors(), 400);
        }

        $result->update($request->all());
        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestApiModel  $restApiModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = RestApiModel::find($id);
        if (is_null($result)){
            return response()->json('Record not found', 404);
        }
        $result->delete();
        return response()->json(null, 200);
    }
}
