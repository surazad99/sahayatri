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
        $details->price = $request->price;
        $details->save();
        return response(['error'=>'success','message'=>'Bid Placed Successfully']);
    }

    public function showGroups()
    {
        
        $newBidGroups = Group::all()->where('bid_confirmed','0'); 
        return view('admin.showGroups')->with('newBidGroups',$newBidGroups);
        // return BidResource::collection(Bid::all());
        
    }

    public function showBids(Group $group)
    {
        $bids = $group->bids;
        // return $bids[0]->agency->name;
        if(count($bids)>0)
            return view('admin.showBids')->with('bids',$bids);
        else
            return back()->with('error','no bids is done to this group yet');
    }

    public function assignBid(Bid $bid)
    {
        $confirmedAgencyId = $bid->user_id;
        $bid->group->agent_id = $confirmedAgencyId;
        $bid->group->bid_confirmed = '1';
        $bid->group->save();
        return back()->with('success','Your bid has been done');
    }
}
