@extends('admin.layout')
    @section('content')
        <table class="table table-hover">
            <thead>
                <th>SN</th>
                <th>Agency Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Price</th>
                <th>Facilities</th>
                <th>Attractions</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $i=1?>
                @foreach ($bids as $bid)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$bid->agency->name}}</td>
                        <td>{{$bid->agency->email}}</td>
                        <td>{{$bid->agency->phone_number}}</td>
                        <td>${{$bid->details->price}}</td>
                        <td>{{$bid->details->facilities}}</td>
                        <td>{{$bid->details->attractions}}</td>
                        <td><a href="{{url('/admin/assign-bid/'.$bid->id)}}"><button class="btn btn-success">Confirm</button></a></td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    @endsection

   