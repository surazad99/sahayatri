<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;
use App\Package;
use App\Group;
use App\Http\Resources\PackageResource;
use App\User;
// use Illuminate\Foundation\Auth\User;
class PackageController extends Controller
{
    public function add()
    {
        $destinations = Destination::all();
        return view('admin.package')->with('destinations', $destinations);
    }

    public function store(Request $request)
    {
        // add data to package table and package_destination pivot table 
        $pack = new Package;
        $pack->name = $request->name;
        $pack->num_of_days = $request->days;
        $pack->save();
        $dests = $request->get('destinations');
        $pack = Package::find($pack->id);
        $pack->destinations()->attach($dests);
    }

    public function show()
    {
        return PackageResource::collection(Package::all());  
    }

    

    public function select(Request $request)
    {
        //add to the user_package table
        $user = User::find($request->user_id);
        $user->packages()->attach($request->package_id);

        //check if package has a group
        if($this->isTherePackage($request->package_id))
       {
            //Add to the user_group table;

            $this->addUserToGroup($request->user_id, $request->package_id);
            return 'user is added to the group';
       }
       else
       {
            //form a new group
            $this->createGroup($request->user_id, $request->package_id);
            return 'new group created';
       }
      
        
    }

    protected function isTherePackage($package_id)
    {
        $package = Package::find($package_id);
        count($package->groups) > 0 ? true : false;
    }

    protected function addUserToGroup($user_id, $package_id)
    {
        $group = Group::orderBy('id','desc')->where('package_id',$package_id)->first();
        $group->users()->attach($user_id);
    }

    protected function createGroup($user_id, $package_id)
    {
        $group = new Group;
        $group->package_id = $package_id;
        $group->save();
        $this->addUserToGroup($user_id, $package_id);
    }
}   

