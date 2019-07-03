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
  
<form action="{{route('destination.add')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
        <label for="Destination">Destination</label>
        <input type="text" class="form-control" placeholder="Enter location of the place" name="name">
        </div>
        <div class="form-group">
          <label for="images">Select Images</label>
          <input type="file" class="form-control" name="images[]" multiple>
          </div>
        <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

</body>
</html>