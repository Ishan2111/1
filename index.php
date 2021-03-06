
<?php  include "config.php"; ?>


<!-- insertion of data -->
<?php
if((isset($_POST['submit'])))
{
  $name=$_POST['name'];
  $items=$_POST['item'];
  $mobile=$_POST['mobile'];

  $sql = "INSERT INTO product (name,items,mobile) VALUES ('$name','$items', '$mobile')";
  $fire=mysqli_query($con,$sql) or die("can not insert data.".mysqli_error($con));
}

?>
<!-- deletion of data -->
<?php
if((isset($_GET['del'])))
{
  $id = $_GET ['del'];
  $sql="DELETE FROM product where id = $id";
 $fire=mysqli_query($con,$sql) or die("can not insert data.".mysqli_error($con)); 
}

 
?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>  


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
  </div>
  <br>
    

  <div class="form-group">
    <label for="exampleInputPassword1">items</label>
    <input type="text"name="item" class="form-control" id="exampleInputPassword1" placeholder="items">
  </div>
  <br>

  <div class="form-group">
    <label for="exampleInputPassword1">Mobile</label>
    <input type="text" name="mobile" class="form-control" id="exampleInputPassword1" placeholder="Mobile">
  </div>
  <br>

  

  <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>
<table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>Item</th>
    <th>Mobile</th>
  </tr>
<?php
   
   $sql ="select * from product";
   $fire=mysqli_query($con,$sql)or die("can not Retrive data.".mysqli_error($con));

   if(mysqli_num_rows($fire)>0)
   {

    while ($abc=mysqli_fetch_assoc($fire)) 
    {
      # code...
    
   ?>


  <tr>
    <td><?php echo $abc["name"] ?></td>
    <td><?php echo $abc["items"] ?></td>
    <td><?php echo $abc["mobile"] ?></td>
    <td>
      <a href="<?php $_SERVER['PHP_SELF']?> ?del=<?php echo $abc['id']?>" class="btn btn-danger">delete</a> 


    </td> 

  </tr>
  <?php
  }
}
?>
</table>

</body>
</html>