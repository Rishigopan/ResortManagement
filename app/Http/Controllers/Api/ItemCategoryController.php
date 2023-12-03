<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ItemCategoryResource;
use App\Models\ItemCategory;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemCategoryController extends BaseController
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

        $itemCategorys = ItemCategory::all()->sortDesc();
        return $this->sendResponse("itemCategories", ItemCategoryResource::collection($itemCategorys),'1', 'Record retrieved successfully.');

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
            'name' => ['required', 'max:25'],
            'remarks' => ['max:250'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = ItemCategory::select('name')->where(['name' => $input['name']])->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("department", 'Exists' , '0', 'ItemCategory Already Exists');
        } else {
            $itemCategory = ItemCategory::create($input);
            return $this->sendResponse("itemCategory", new ItemCategoryResource($itemCategory), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\ItemCategory  $ItemCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemCategory = ItemCategory::find($id);

        if (is_null($itemCategory)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("itemCategory", new ItemCategoryResource($itemCategory), '1', 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ItemCategory  $ItemCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\ItemCategory  $ItemCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itemCategory = ItemCategory::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required', 'max:25'],
            'remarks' => ['max:250'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = ItemCategory::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("roomType", 'Exists' , '0', 'Record Already Exists');
        } else {
            $itemCategory->name = $input['name'];
            $itemCategory->remarks = $input['remarks'];
            $itemCategory->save();         
            return $this->sendResponse("itemCategory", new ItemCategoryResource($itemCategory), '1', 'Record Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\ItemCategory  $ItemCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemCategory = ItemCategory::find($id);

        if (is_null($itemCategory)) {
            return $this->sendError('ItemCategory not found.');
        }
        $CheckItemExists = Item::select('item_category') -> where( 'item_category', '=' , $id) -> get();
        if (count($CheckItemExists) > 0) {
            return $this->sendResponse("department", 'Exists' , '0', 'Can`t delete this record because it is in use');
        } else {  
            $itemCategory->delete();
            return $this->sendResponse("itemCategory", new ItemCategoryResource($itemCategory), '1', 'Record Deleted successfully.');
        }
    }
}
