<?php
include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" class="css">

</head>
<body>
<form action="updatedatapage.php" class="group" method="POST" enctype="multipart/form-data">
   <div class="container">
<h2 class="py-3 text-center">UPDATE FORM</h2>
<div class="row">
<div class="col-md-6"><div class="form-group">
    <?php 
    $std_id=$_GET['id'];
    $sql="SELECT * FROM DETAIL WHERE `id`=$std_id";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result))
    {
        while($row1=mysqli_fetch_assoc($result))
        {
?>
    
    <label class="form-label">Enter Full Name:</label><br>
    <input type="hidden" name="id" value="<?php echo $row1['id'] ?>" >
    <input type="text" name="name" class="form-control" value="<?php echo $row1['name']; ?>">
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
<?php 
while($row=mysqli_fetch_assoc($result))
{
    $selected="";
    if($row['id']==$row1['area'])
    {
        $selected="selected";
    }
?>
<option value="<?php echo $row['id'] ?>" <?php echo $selected ?> > <?php echo $row['name'] ?></option>

<?php }?>
</select>
<?php }?></div>
   &nbsp;
   <div class="form-group">
    <label class="form-label">Enter Persentage:</label><br>
    <input type="text" name="per" class="form-control" value="<?php echo $row1['per'] ?>" >
</div>

</div>
    <div class="col-md-6"><div class="form-group">
    <label class="form-label">Upload your New pic:</label><br>
    <input type="text" disabled  class="form-control" value="<?php echo $row1['photo'] ?>" >
    <input type="file" name="photo" class="form-control" accept="image/*" class="form-control" onchange="loadFile(event)"/>
</br>
    <img height="100px" width="100px" id="output" alt="" src="upload/<?php echo $row1['photo']; ?>" class="rounded-circle border border-dark">
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
<?php } ?>

<div class="form-group"></br></div>
<div class="from-group text-center">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">    <input type="submit" name="SENT" value="UPDATE" class="form-control text-center btn btn-primary"></div>
</div>
<div class="col-md-4"></div>
    
</div></div>

   </div> 
   <?php }?>

</form>
</body>
</html>