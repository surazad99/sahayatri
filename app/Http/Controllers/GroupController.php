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
        if($this->hasGroup($user));
        {
           
            $group = $user->groups->last();
            return new GroupResource($group);  
        }
    }
    
    protected function hasGroup($user)
    {
        return count($user->groups) > 0 ? true : false;   
    }

    protected function showGroupUsers($group_id)
    {
        
    }
}
