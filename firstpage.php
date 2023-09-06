<?php
include_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" class="css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-5/css/all.css" integrity="sha512-hfVul4ZiNO3U3dM4bwj4/dse2gq0mYM/zIIard7e9dc6raAJ3AEvskqwTWqCCORShcoFh+N1GUbgxoDb2ytuow==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<body>
    <form action="savedata.php" class="group" method="post" enctype="multipart/form-data">
   <div class="container">
<h2 class="py-3 text-center"><strong>DETAIL FORM</strong></h2>
<div class="row">
    <div class="col-md-6"><div class="form-group">
    <label class="form-label">Enter Full Name:</label><br>
    <input type="text" name="name" class="form-control">
</div>

<div class="form-group">
    <label class="form-label">Select Area:</label><br>
<?php 
$sql="SELECT * FROM area";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
?>

<select name="area" id="" class="form-select">
    <option selected  disabled value="">SELECT AREA</option>
<?php   
while($row=mysqli_fetch_assoc($result))
{
?>
<option value="<?php echo $row['id']; ?> " > <?php echo $row['name']?> </option>

<?php }?>
</select>
<?php }?></div>
   &nbsp;
   <div class="form-group">
    <label class="form-label">Enter Persentage:</label><br>
    <input type="text" name="per" class="form-control">
</div>

</div>
    <div class="col-md-6"><div class="form-group">
    <label class="form-label">Upload your pic:</label><br>

    <input type="file" name="photo" accept="image/*" class="form-control" onchange="loadFile(event)"/>
</br>
    <img height="100px" width="100px" src="selected" id="output" alt="" class="rounded-circle border border-dark">
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>

</div></div>
</div>

<div class="form-group"></br></div>
<div class="from-group text-center">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">    <input type="submit" name="SENT" class="form-control text-center btn btn-primary"></div>
</div>
<div class="col-md-4"></div>
    
</div></div>

   </div> </form>
</body>
</html>