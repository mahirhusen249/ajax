<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data</title> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body> 
<nav class="navbar navbar-light bg-light justify-content-end">
<form class="form-inline d-flex d-block me-5" method="GET" action="">
<input class="form-control mr-sm-2" name="search" type="search" id="search" placeholder="Search" aria-label="Search"> 



         <button class="btn btn-outline-success my-2 mx-2 my-sm-0" type="submit">Search</button>

</form>
</nav>
<div class="m-3">  
         <a button type="submit" name="submit" class="btn btn-primary" href="index.php">add record</a></button>
     </div>   
     <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>


    <?php     

  include 'conn.php';   
  
  $search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';

  $sql = "SELECT * FROM utbl";
  if ($search) {
      $sql .= " WHERE fname LIKE '%$search%' OR lname LIKE '%$search%' OR mobileno LIKE '%$search%' OR email LIKE '%$search%'";
  }

 $result = mysqli_query($con, $sql);   
 $num = mysqli_num_rows($result);   
 
if ($num > 0) {    
    echo '<table class="table table-bordered">';
    echo '<thead class="thead-light">';
     echo '<tr>
            <th>Id</th> 
            <th>First Name</th>
            <th>Last Name</th> 
            <th>Mobile No</th>
            <th>Email</th>
            <th>Password</th>
            <th>Gender</th> 
            <th>Date</th>
            </tr>'; 
    echo '</thead>';

   echo '<tbody>';   
while($row=mysqli_fetch_array($result)){   
echo '<tr> 
<td>'.($row["id"]).'</td>  
    <td>'.($row["fname"]).'</td>
   <td>'.($row["lname"]).'</td>
         <td>'.($row["mobileno"]).'</td>
         <td>'.($row["email"]).'</td>
             <td>'.($row["password"]).'</td>
           <td>'.($row["gender"]).'</td>
               <td>'.($row["date"]).'</td>   
<td><a class="text-decoration-none" href="delete.php?delete='.($row["id"]).'"><button type="submit" onclick="return checkdelete();" class="btn btn-danger" name="delete " value="delete ">Delete</button></a></td>  
<td><a class="text-decoration-none" href="update.php?update='.($row["id"]).'"><button type="submit" class=" btn btn-primary" name="update" value="update">update</button></a></td>   
<tr>';  
}  
 echo'</tboday>'; 
 echo  '</table>';   
    
} else{    
    echo"record not found";
 }
 ?> 
      <script> 
//         $('#search').on('keyup', function(){
//            $value= $(this).val();
//             if($value){
//                 $('.alldata').hide();
//                 $('.searchdata').show();
//             }else{
//                 $('.alldata').show();
//                 $('.searchdata').hide();
//             }

//            $.ajax({
//             type:'get',
//             url:"search.php",
//             data:{
//                 'search':$value
//             },
//             success:function(data){
//                 console.log(data);
//                 $('#tbody').html(data);
                
//             }
//            })
//         });
//     </script>  
   
 </body>
 </html>
 <script>   
 
function checkdelete(){    
     return confirm('Are you sure you want to delete this record ?');
 }
</script> 


