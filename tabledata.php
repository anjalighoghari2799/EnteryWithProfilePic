<?php 
include_once 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-5/css/all.css" integrity="sha512-hfVul4ZiNO3U3dM4bwj4/dse2gq0mYM/zIIard7e9dc6raAJ3AEvskqwTWqCCORShcoFh+N1GUbgxoDb2ytuow==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>tabledata</title>
</head>
<body>
    <div class="container text-center ">
        <div class="row">
            <h2 class="py-3 text-center"><strong>TABLEDATA</strong></h2>
        </div>
 <?php
 $sql="SELECT detail.id AS id,detail.name,area.name AS area ,detail.per,detail.photo FROM `detail` JOIN `area` ON detail.area=area.id ";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
 {

 ?>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col"><i class="fa fa-user"></i></th>
                <th scope="col">Name</th>
                <th scope="col">Area</th>
                <th scope="col">Percentage</th>
                <th scope="col">EDIT</th>
                <th scope="col" class="text-danger">DELETE</th></h5>


            </tr>
        </thead>
        <tbody>
            <?php 
            while($row=mysqli_fetch_assoc($result))
            {
            ?>
            <?php $row['id']; ?>
            <tr>
                <td scope="row">
                    <img class="rounded rounded-circle" height="40px" width="40px" src="upload/<?php echo $row['photo']; ?>" alt="">
                    
                </td>
                <td scope="row"><?php echo $row['name']; ?></td>
                <td scope="row"><?php echo $row['area']; ?></td>
                <td scope="row"><?php echo $row['per']; ?></td>
                <td scope="row"><a href="updatedata.php?id=<?php echo $row['id']; ?>">
                    <i class="fas fa-pencil-alt"></i></a></td>
                <td scope="row">
                <a href="deletedata.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i>
</a></td>
                
            </tr><?php }?>

           
        </tbody>
    </table> 
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">    <a href="firstpage.php">
        <input type="button" name="ADD" value="ADD" class="form-control text-center btn btn-primary"></a></div>
</div><?php }?>  </div>
</body>
</html>