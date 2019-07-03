<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sahayatri Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
<form action="{{action('PackageController@store')}}" method="POST">
    @csrf
        <div class="form-group">
            <label for="name">Package Name</label>
            <input type="text" class="form-control" placeholder="Enter package name" name="name">
        </div>

        <div class="form-group">
            <label for="name">Number of days</label>
            <input type="number" class="form-control" placeholder="Enter Number of days" name="days">
        </div>

        <div class="form-group">
                <label for="name">Choose places for packages</label><br>
            <select class="custom-select" multiple="multiple" name="destinations[]">
                    
                    @foreach($destinations as $dest)
                        <option value="{{$dest->id}}">{{$dest->name}}</option>
                    @endforeach  
            </select><br>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>