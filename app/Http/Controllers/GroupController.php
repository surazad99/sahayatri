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

    protected function showGroupUsers($group_id)
    {
        
    }
}
