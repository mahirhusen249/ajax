<?php    
include 'conn.php';   
 
if(isset($_GET['update'])){  
    $uid=$_GET['update'];   
      
    $sql=" SELECT * FROM utbl where id= $uid";   
    $result=mysqli_query($con,$sql);   
    while($row=mysqli_fetch_assoc($result)){    
         
    $fname = $row['fname'];   
    $lname = $row['lname'];   
    $mobileno = $row['mobileno'];   
    $email = $row['email'];  
    $password = $row['password'];  
    // $cpassword = $row['cpassword']; 
    $gender = $row['gender'];   
    $date = $row['date'];  


    }
 
if (isset($_POST['submit'])) {    
    $fname = $_POST['fname'];   
    $lname = $_POST['lname'];   
    $mobileno = $_POST['mobileno'];   
    $email = $_POST['email'];  
    $password = $_POST['password'];  
    $cpassword = $_POST['cpassword']; 
    $gender = $_POST['gender'];   
    $date = $_POST['date'];    
     

$sql="UPDATE utbl SET fname='$fname',lname='$lname',mobileno='$mobileno',email='$email', password='$password', gender='$gender', date='$date' where id=$uid ";   

// print_r($sql);exit;
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Update successfully...";  
        header("location:search.php");
      } else {
        die(mysqli_error($con));
      }
} 
}


?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body> 
    <div class="container">   
        <div class="col-md-6 m-auto">  
            <h1 class="text-center">update record</h1>  
            <form action="" id="registrationForm" method="post" onsubmit="return validateForm()">  
                <div class="mb-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $fname ?>" placeholder="Enter your first name" required>
                    <small class="text-danger" id="fnameError"></small> 
                </div>  
                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $lname ?>" placeholder="Enter your last name" required>
                    <small class="text-danger" id="lnameError"></small>
                </div> 
                <div class="mb-3">
                    <label for="mobileno" class="form-label">Mobile No</label>
                    <input type="number" name="mobileno" id="mobileno" class="form-control"value="<?php echo $mobileno ?>" placeholder="Enter your mobile number" required>
                    <small class="text-danger" id="mobilenoError"></small>
                </div> 
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="email" name="email" id="username" class="form-control" value="<?php echo $email ?>" placeholder="Enter your email" required>
                    <small class="text-danger" id="emailError"></small>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="<?php echo $password ?>" placeholder="Enter your password" required>
                    <small class="text-danger" id="passwordError"></small>
                </div> 
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword" id="cpassword" class="form-control" value=" <?php echo isset($cpassword)==($password)  ?>" placeholder="Confirm your password" required>
                    <small class="text-danger" id="cpasswordError"></small>
                </div>  
                <div class="radio mb-3">
           Gender<input type="radio" name="gender" value="male"<?php echo $gender=='male'?'checked="checked"':''?>>
           <label for="male">male</label>
           <input type="radio" name="gender" value="female"<?php echo $gender=='female'?'checked="checked"':''?>>
           <label for="female">female</label>
      
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" id="date" class="form-control"value="<?php echo $date ?>" required>
                    <small class="text-danger" id="dateError"></small>
                </div>   
                <div class="mb-3">  
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>   
    <script> 
    function validateForm() {
        let isValid = true;

        // Clear previous error messages
        document.querySelectorAll('.text-danger').forEach(el => el.innerText = '');

        // Validate first name
        const fname = document.getElementById('fname').value.trim();
        if (!fname) {
            document.getElementById('fnameError').innerText = 'First name is required.';
            isValid = false;
        }

        // Validate last name
        const lname = document.getElementById('lname').value.trim();
        if (!lname) {
            document.getElementById('lnameError').innerText = 'Last name is required.';
            isValid = false;
        }

        // Validate mobile number
        const mobileno = document.getElementById('mobileno').value.trim();
        if (!mobileno) {
            document.getElementById('mobilenoError').innerText = 'Mobile number is required.';
            isValid = false;
        }

        // Validate email
        const email = document.getElementById('username').value.trim();
        if (!email) {
            document.getElementById('emailError').innerText = 'Email is required.';
            isValid = false;
        } else if (!validateEmail(email)) {
            document.getElementById('emailError').innerText = 'Invalid email format.';
            isValid = false;
        }

        // Validate password
        const password = document.getElementById('password').value.trim();
        if (!password) {
            document.getElementById('passwordError').innerText = 'Password is required.';
            isValid = false;
        }

        // Validate confirm password
        const cpassword = document.getElementById('cpassword').value.trim();
        if (!cpassword) {
            document.getElementById('cpasswordError').innerText = 'Please confirm your password.';
            isValid = false;
        } else if (password !== cpassword) {
            document.getElementById('cpasswordError').innerText = 'Passwords do not match.';
            isValid = false;
        }

        // Validate gender
        const gender = document.querySelector('input[name="gender"]:checked');
        if (!gender) {
            document.getElementById('genderError').innerText = 'Gender is required.';
            isValid = false;
        }

        // Validate date
        const date = document.getElementById('date').value;
        if (!date) {
            document.getElementById('dateError').innerText = 'Date is required.';
            isValid = false;
        }

        return isValid; // Prevent form submission if validation fails
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }
    </script>
</body>
</html>