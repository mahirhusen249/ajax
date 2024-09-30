<?php   
include 'conn.php';   
if(isset($_GET['delete'])){   
    $did=$_GET['delete'];   

$sql="DELETE  from  utbl where id=$did " ; 

$result=mysqli_query($con,$sql);     

if($result){    

    header("location:search.php");
} 

}  
  
  
  ?>  
