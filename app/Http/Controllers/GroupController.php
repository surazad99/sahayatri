<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\GroupResource;
use App\Group;
use App\User;

class GroupController extends Controller
{
    public function showGroup(User $user)
    {
        $group = $this->hasActiveGroup($user);
        if($group)
        {   
            // return $grp_id;
            return new GroupResource($group);  
        }
        else
        {
            return '{
                "data": 
                    {
                        "status": "empty",
                        "message": "User Group Not Created"   
                    }    
                }';       
            
        }
    }
    
    protected function hasActiveGroup($user)
    {
        $groups = $user->groups->where('is_active',1);
        
        if(count($groups)>0){
            return $groups[0];
        }
    }

    public function showActiveGroups()
    {
        $groups = Group::all()->where('bid_confirmed','0');
        if(count($groups)>0)
            return GroupResource::collection($groups);
        else
        {
            return '{
                "data": 
                    {
                        "status": "empty",
                        "message": "No Group Found to Bid"   
                    }    
                }';
        }
    }

    public function showConfirmedGroups(User $user)
    {
        return GroupResource::collection($user->group);  
    }

    public function showAgentToUser(User $user)
    {
        $groups = $user->groups->where('bid_confirmed','1');
        // return $groups;
        return new GroupResource($groups[0]);
    }
}
