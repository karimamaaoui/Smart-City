<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<script src="main.js"></script>


<body>


<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <h3>  Add new City</h3>
    </div>
    <div class="card-body">

    <div class="">


<form action="cityProcess.php" method="post" style="width:30%;height:450px;" enctype="multipart/form-data">

<input type="text" name="label" class="box" placeholder="enter your label" />
    <br>
    <br>
	<input type="file" class="form-control" name="pic"  required="true">
        	<span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        
            <br>
            <br>
    <input type="submit" value="Add" class="btn" name="addcity" />
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>