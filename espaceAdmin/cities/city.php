<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">

</head>
<script src="main.js"></script>


<body>


<div class="sectionCity">
<div class="cities-form-containe">

<form action="cityProcess.php" method="post" style="width:30%;height:450px;" enctype="multipart/form-data">
<h3>  Add new city</h3>

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
</body>
</html>