<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;
use App\Image;
use App\Package;
use App\Http\Resources\DestinationResource;
use App\Http\Resources\ImageResource;
class DestinationController extends Controller
{
    public function store(Request $request)
    {   
        
        $this->validate($request, [
            'name' => 'required',
            'images'=>'required',
            ]);
        
        $dest = new Destination;
        $dest->name = $request->name;
        $dest->save();
        $destination = Destination::find($dest->id);
        $datas = null;
        //handle images
        
         if($request->hasfile('images'))
          {
            
            foreach($request->file('images') as $image)
            {

                $name=$image->getClientOriginalName();

                $image->move(public_path().'/images/', $name);
                
                $datas =  array(
                    new Image(array('url' => $name)),
                );
                $destination->images()->saveMany($datas);
            }
        }     
    }

    public function showImages(Destination $destination)
    {
        return ImageResource::collection($destination->images);
    }

    public function showDestination(Package $package)
    {
        //show the transformed destinations which is in array
        return DestinationResource::collection($package->destinations);
    }
}
