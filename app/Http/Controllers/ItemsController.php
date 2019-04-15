<?php

namespace App\Http\Controllers;

use App\ItemType;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    //

    /**
     * Listing and Searching Items
    */
    public function index(Request $request){
        view()->share(['types'=>ItemType::orderBy('type')->get()]);
        return view('items.index');
    }

    public function getItemsList(Request $request){

    }
}
