<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Units;
use App\Models\ItemCategory;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function item(Request $request) {

        if ($request->ajax()) {
            $data = Item::select( 'items.id','items.name','item_categories.name AS ItemCat','items.selling_price','items.mrp','items.gst','item_categories.id AS itemid')
                            ->join('item_categories', 'items.item_category', '=', 'item_categories.id')
                            ->orderBy('id', 'desc')
                            ->get(); 
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap"> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            }) 
            ->rawColumns(['action'])
            ->make(true);
        }
        $ListItemCat['itemc'] = ItemCategory::select('id','name')->get();
        $ListItemUnit['units'] = Units::select('id','name')->get();

        return view('ItemMaster',$ListItemCat, $ListItemUnit);      
        
    }
}
