<?php
include 'conn.php';

if(isset($_GET['search'])){
   $search=$_GET['search'];
}
$output = "";
$sql = "SELECT * FROM utbl";

if ($search) {
    $sql .= " WHERE fname LIKE '%$search%' OR lname LIKE '%$search%' OR mobileno LIKE '%$search%' OR email LIKE '%$search%'";
}

$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>  
                    <td>' . $row["id"] . '</td>  
                    <td>' . $row["fname"] . '</td>
                    <td>' . $row["lname"] . '</td>
                    <td>' . $row["mobileno"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["password"] . '</td>
                    <td>' . $row["gender"] . '</td>
                    <td>' . $row["date"] . '</td>   
                    <td>
                        <a class="text-decoration-none" href="delete.php?delete=' . $row["id"] . '"><button type="button" onclick="return checkdelete();" class="btn btn-danger">Delete</button></a>
                        <a class="text-decoration-none" href="update.php?update=' . $row["id"] . '"><button type="button" class="btn btn-primary">Update</button></a>
                    </td>  
                  </tr>';
    }
} else {
    $output .= "<tr><td colspan='9'>No records found</td></tr>";
}

echo $output; 
?>
