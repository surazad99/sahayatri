<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;
use App\Package;
use App\Group;
use App\Http\Resources\PackageResource;
use App\User;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

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
        if($this->checkUserGroup($request->user_id))
        {
            return '{
                "data": 
                    {
                        "status": "error",
                        "message": "You already Have Active Group Created"   
                    }    
                }';
        }

        else
        {
            //add to the user_package table
            $user = User::find($request->user_id);
            $user->packages()->attach($request->package_id);
            // $package = Package::find($request->package_id);
            //check if package has a group
            $grp_id = $this->getGroupId($request->package_id, $request->start_date);
            if($grp_id!=-2)
            {
                //Add to the user_group table;
                $this->addUserToGroup($request->user_id, $grp_id);
                return 'user is added to the group';
            }
            else
            {
                //form a new group
                $this->createGroup($request->user_id, $request->package_id,$request->start_date);
                return 'new group created';
            }

        }
      
        
    }

    protected function getGroupId($package_id, $start_date)
    {
        $package = Package::find($package_id);

        $group= Group::where('package_id',$package_id)->where('is_active',1)->where('start_date',$start_date)->first();
        if($group)
        return $group->id;
        else return -2;
    }

    protected function addUserToGroup($user_id, $grp_id)
    {
        $group = Group::find($grp_id);
        $group->users()->attach($user_id);
    }

    protected function createGroup($user_id, $package_id, $start_date)
    {
        $group = new Group;
        $group->package_id = $package_id;
        $group->start_date = $start_date;
        $group->save();
        $this->addUserToGroup($user_id, $group->id);
    }

    protected function checkUserGroup($user_id)
    {
        $user = User::find($user_id);
        $groups = $user->groups;
        foreach($groups as $group)
        {
            if($group->is_active==1)
            return true;
        }
        return false;
    }
    
    public function details()
    {
        $image_url = '"'.url('/images/sample.jpg').'"';
        // $image_url = '""';
        $data= '[
            {
                "type":"PackageDestination",
                "title":"Kathmandu",
                "daysOfStayCount":"2",
                "coverImage":'.$image_url.'
            },
            {
                "type":"InterDestinationTransport",
                "vehicle":"plane",
                "timeMagnitude":"1.5",
                "timeUnit":"hours"
            },
            {
                "type":"PackageDestination",
                "title":"PasupatiNath",
                "daysOfStayCount":"1",
                "coverImage":'.$image_url.'
    
    
            },
            {
                "type":"InterDestinationTransport",
                "vehicle":"car",
                "timeMagnitude":"60",
                "timeUnit":"minutes"
    
                
            },
            {
                "type":"PackageDestination",
                "title":"Chitwan",
                "daysOfStayCount":"3",
                "coverImage":'.$image_url.'
    
    
            }
        ]
    ';
        return $data;
    }

    public function toMaley()
    {
        $data = '{
            "data": [
                {
                    "id": 1,
                    "name": "kathmandu",
                    "category": "city world-heritage honeymoon temples" ,
                    "country": "nepal"
                },
                {
                    "id": 2,
                    "name": "Pokhara",
                    "category": "city lake mountain-view honeymoon tour boating",
                    "country": "nepal"
                },
                {
                    "id": 3,
                    "name": "Butwal",
                    "category": "city industrial",
                    "country": "nepal"
                },
                {
                    "id": 4,
                    "name": "Chitwan",
                    "category": "city adventure tour national-park world-heritage",
                    "country": "nepal"
                },
                {
                    "id": 5,
                    "name": "Biratnagar",
                    "category": "city industrial",
                    "country": "nepal"
                },
                {
                    "id": 6,
                    "name": "Manang",
                    "category": "mountain-view trek tour bike-ride",
                    "country": "nepal"
                },
                {
                    "id": 7,
                    "name": "Mustang",
                    "category": "mountain-view trek tour bike-ride honeymoon temples",
                    "country": "nepal"
                },
                {
                    "id": 8,
                    "name": "Rolpa",
                    "category": "remote-area village home-stay",
                    "country": "nepal"
                },
                {
                    "id": 9,
                    "name": "Dolpa",
                    "category": "remote-area village home-stay",
                    "country": "nepal"
                },
                {
                    "id": 10,
                    "name": "ABC",
                    "category": "mountain-view trek base-camp",
                    "country": "nepal"
                },
                {
                    "id": 11,
                    "name": "Illam",
                    "category": "city lake tea-garden",
                    "country": "nepal"
                },
                {
                    "id": 12,
                    "name": "Jhapa",
                    "category": "city tea-garden",
                    "country": "nepal"
                },
                {
                    "id": 13,
                    "name": "Okhaldhunga",
                    "category": "remote-area village trek",
                    "country": "nepal"
                },
                {
                    "id": 14,
                    "name": "Nagarkot",
                    "category": "honeymoon hill-station",
                    "country": "nepal"
                },
                {
                    "id": 15,
                    "name": "Dhulikhel",
                    "category": "honeymoon",
                    "country": "nepal"
                },
                {
                    "id": 16,
                    "name": "Sukute",
                    "category": "adventure beach",
                    "country": "nepal"
                },
                {
                    "id": 17,
                    "name": "Markhu",
                    "category": "lake honeymoon boating",
                    "country": "nepal"
                },
                {
                    "id": 18,
                    "name": "Baglung",
                    "category": "city temples",
                    "country": "nepal"
                }
            ]
        }';

        return $data;
    }
}   

