<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Items extends Model
{
    //
    protected  $table      =   'items';
    public static function dataOperation($request)
    {
        if ($request->method() == 'GET') {
            if ($request->datatable == 'yes') {

                $sql = self::select('items.id as id','items.name as name','item_type.type as type','item_price.us_price')->Join('item_price','item_price.item_id','=','items.id')->Join('item_type','item_type.id','=','items.type');

                return Datatables::of($sql)
                    ->addColumn('action', function ($data) {
                        $route  = route('ask_question',encode($data->id));
                        $string = '<a href="'.$route.'" class="btn btn-primary" id="sendMessageButton">Ask your question</a>';
                        return $string;
                    })
                    ->filter(function ($query) use ($request) {

                        if ($request->has('name') && $request->name != "" ) {
                            $query->where('items.name', 'like', "%{$request->get('name')}%");
                        }
                        if ($request->has('type') && $request->type != "") {
                            $query->where('items.type', '=', $request->get('type'));
                        }

                        if ($request->has('price') && $request->price != "") {
                            $query->where('item_price.us_price', '<=', $request->get('price'));
                            $query->orderBy('item_price.us_price', 'desc');
                        }
                    })
                    ->make(true);
            }
        }
    }
}
