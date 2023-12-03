<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\TemplateResource;
use App\Models\Templates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemplateController extends BaseController
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        // if (!auth()->user()) {
        //    return $this->sendError('Access Denied.', ["You dont have privilege to access this page . Sorry Contact Administrator"]);
        // }

        $templates = Templates::all()->sortDesc();
        return $this->sendResponse("templates", TemplateResource::collection($templates),'1', 'Record retrieved successfully.');

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
        $input = $request->all();

        $validator = Validator::make($input, [
            'field_name' => ['required', 'max:25'],
            'name' => ['required'],
            'status' => ['max:25'],

        ]);
        $validatedValues = $validator->validated();

        $InputArray = ([
            'field_name' => $validatedValues['field_name'],
            'name' => $validatedValues['name'],
            'status' => 0
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }
        else {
            $templates = Templates::create($InputArray);
            return $this->sendResponse("templates", new TemplateResource($templates), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $templates = Templates::find($id);

        if (is_null($templates)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("templates", new TemplateResource($templates), '1', 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function edit(templates $templates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $templates = Templates::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'field_name' => ['required', 'max:25'],
            'name' => ['required'],
            'status' => ['max:25'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
 
        }
        else {
            $templates->field_name = $input['field_name'];
            $templates->name = $input['name'];
            $templates->status = $input['status'];
            $templates->save();           
            return $this->sendResponse("templates", new TemplateResource($templates), '1', 'Record Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $templates = Templates::find($id);

        if (is_null($templates)) {
            return $this->sendError('Record not found.');
        }
        $templates->delete();
        return $this->sendResponse("templates", new TemplateResource($templates), '1', 'Record Deleted successfully');

    }
}
