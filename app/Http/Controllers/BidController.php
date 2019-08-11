<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Group;
use App\Bid_details;
use Illuminate\Http\Request;
use App\Http\Resources\BidResource;
use App\Http\Resources\BidDetailsResource;

class BidController extends Controller
{
    public function store(Request $request)
    {
        $bid =new Bid;
        $bid->user_id = $request->user_id;
        $bid->group_id = $request->group_id;
        $bid->save();
        $details = new Bid_details;
        $details->bid_id = $bid->id;
        $details->attractions = $request->attractions;
        $details->facilities = $request->facilities;
        $details->save();
        return response(['error'=>'success','message'=>'Bid Placed Successfully']);
    }

    public function showBids()
    {
        
        $activeGroups = Group::all()->where('is_active','1'); 
        return view('admin.showBids')->with('activeGroups',$activeGroups);
        // return BidResource::collection(Bid::all());
        
    }
}
