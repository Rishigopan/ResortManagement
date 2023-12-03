<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;
use App\Models\Item;
class ItemController extends BaseController
{
     /**
     * Display a listing o$item of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if (!auth()->user()) {
        //    return $this->sendError('Access Denied.', ["You dont have privilege to access this page . Sorry Contact Administrator"]);
        // }

        $items = Item::all()->sortDesc();
        return $this->sendResponse("items", ItemResource::collection($items),'1', 'Record retrieved successfully.');

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
            'name' => ['required'],
            'item_category' => ['required'],
            'unit' => ['required'],
            'selling_price' => ['max:8'],
            'mrp' => ['max:8'],
            'gst' => ['nullable'],
            'batch_no' => ['nullable'],
            'exp_date' => ['nullable'],
            'opening_stock' => ['nullable'],
            'reorder_level' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }
        $CheckExists = Item::select('name')->where(['name' => $input['name']])->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("item", 'Exists' , '0', 'Item Already Exists');
        } else {
            $item = Item::create($input);
            return $this->sendResponse("item", new ItemResource($item), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);

        if (is_null($item)) {
            return $this->sendError('Item  not found.');
        }

        return $this->sendResponse("items", new ItemResource($item), '1', 'Record  Retrieved Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required'],
            'item_category' => ['required'],
            'unit' => ['required'],
            'selling_price' => ['max:8'],
            'mrp' => ['max:8'],
            'gst' => ['nullable'],
            'batch_no' => ['nullable'],
            'exp_date' => ['nullable'],
            'opening_stock' => ['nullable'],
            'reorder_level' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = Item::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("item", 'Exists' , '0', 'Record Already Exists');
        } else {
            $item->name = $input['name'];
            $item->item_category = $input['item_category'];
            $item->unit = $input['unit'];
            $item->selling_price = $input['selling_price'];
            $item->mrp = $input['mrp'];
            $item->gst = $input['gst'];
            $item->batch_no = $input['batch_no'];
            $item->exp_date = $input['exp_date'];
            $item->opening_stock = $input['opening_stock'];
            $item->reorder_level = $input['reorder_level'];
            $item->save();
                
            return $this->sendResponse("item", new ItemResource($item), '1', 'Record Updated successfully');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        if (is_null($item)) {
            return $this->sendError('Record not found.');
        }

        $item->delete();

        return $this->sendResponse("item", new ItemResource($item), '1', 'Record  Deleted successfully.');
    }
}
