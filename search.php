<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 
</head>
<body>
<nav>
    <form class="form-inline d-flex" method="POST" action=""> 
        <div class="col-lg-4">
            <input class="form-control" name="search" type="search" id="search" placeholder="Search"> 
        </div>

        <div class="date-part col-lg-4 border-0" style="margin-left:20%">
            <div class="col-lg-12">   
                <div class="form-group"> 
                    <input type="date" name="start_date" class="form-control" required>
                </div>
            </div>

            <div class="col-lg-12">   
                <div class="form-group" style="margin-left:100%"> 
                    <input type="submit" name="submit_date" class="btn btn-primary" value="Filter">
                </div>
            </div> 
            
            <div class="col-lg-12">   
                <div class="form-group"> 
                    <input type="date" name="end_date" class="form-control" required>
                </div>
            </div>   
        </div>
    </form> 
</nav>

<div class="alldata">
    <div class="m-3">   
        <a class="btn btn-primary" href="index.php">Add Record</a>
    </div>   

    <table class="table table-bordered">
        <thead class="thead-light"> 
            <tr>
                <th>Id</th> 
                <th>First Name</th>
                <th>Last Name</th> 
                <th>Mobile No</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th> 
                <th>Date</th>
                <th>Actions</th>
            </tr> 
        </thead>
        <tbody id="data">
            <?php
            include 'conn.php';   
            $sql = "SELECT * FROM utbl";   
            
            if(isset($_POST['submit_date'])){   
                $start_date = $_POST['start_date']; 
                $end_date = $_POST['end_date'];   

                if($start_date && $end_date){  
                    $sql = "SELECT * FROM utbl WHERE date BETWEEN '$start_date' AND '$end_date'"; 
                }  
            }

       
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) { 
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>
                            <td>' .$row["id"] . '</td>
                            <td>' .$row["fname"] . '</td>
                            <td>' .$row["lname"] . '</td>
                            <td>' .$row["mobileno"] . '</td>
                            <td>' .$row["email"] . '</td>
                            <td>' .$row["password"] . '</td>
                            <td>' .$row["gender"] . '</td>
                            <td>' .$row["date"] . '</td>
                            <td>
                                <a class="text-decoration-none" href="delete.php?delete=' . $row["id"] . '"><button type="button" onclick="return checkdelete();" class="btn btn-danger">Delete</button></a>
                                <a class="text-decoration-none" href="update.php?update=' . $row["id"] . '"><button type="button" class="btn btn-primary">Update</button></a>
                            </td>
                          </tr>'; 
                }
            } else {
                echo "<tr><td colspan='9'>No records found</td></tr>";
            } 
            ?>
        </tbody>
    </table>
</div>

<script>
    function checkdelete() {    
        return confirm('Are you sure you want to delete this record?');
    }

    $('#search').on('keyup', function() {
        var value = $(this).val();
        $.ajax({
            type: 'GET',
            url: "data.php", 
            data: {
                'search': value
            },
            success: function(data) {
                $('#data').html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
    });
</script>
</body>
</html>
