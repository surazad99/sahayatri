
@extends('admin.layout')
    @section('content')
        <table class="table table-striped">
            <thead>
                <th>Package</th>
                <th>Destinations</th>
                <th>Start_date</th>
                <th>View Bids</th>
            </thead>
            <tbody>
                @foreach($newBidGroups as $group)
                    <tr>
                        <td>{{$group->package->name}}</td>
                            <td>
                                @foreach ($group->package->destinations as $destination)
                                    {{$destination->name.'| '}}
                                @endforeach   
                            </td>
                        <td>{{$group->start_date}}</td>
                        <td><a href="{{url('/admin/bids/'.$group->id)}}"><button class="btn btn-info">View Bids </button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection