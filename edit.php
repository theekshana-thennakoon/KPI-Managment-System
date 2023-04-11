<?php
session_start();
?>
<?php
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <!-- custom css file link  -->
	
	<link href="assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    	.inputBox input , .inputBox select{
    	  padding:1rem;
    	  font-size: 1.7rem;
    	  text-transform: none;
    	  margin:1rem 0;
    	  border:.1rem solid #4A89DC;
    	  width: 49%;
      }
      a:hover{background:#fff;}
  
    </style>
</head>
<body>
<script src="sweetalert.min.js"></script>
<!-- header section starts  -->

<header>


    
    <div class="header-2">


        <div class="icons">
            
			<a style = 'color:#4A89DC;'><b>Staff Management System</b></a>
            
        </div>

        <div class="icons">
            
			<a href = 'view.php'><i class='fa fa-eye' style = 'color:#4A89DC;'></i></a>
            
        </div>

    </div>


</header>

<!-- header section ends -->

<!-- Pickup section starts  -->
<br>
<br> 

<section id = 'addemployee'>
    <span><center><h1>Add New Staff Member</h1></center></span>
    <form action='x.php' method = 'post' enctype="multipart/form-data">
        
        <div class='inputBox'>
           <input type='text' name = 'epf' placeholder='Type EPF' required>
           <input type='text' name = 'employeenumber' placeholder='Type Employee Number' required>
        </div>
        
        <div class='inputBox'>
           <input type='text' name = 'name' placeholder='Type Name with Initials' required>
           <input type='text' name = 'cname' placeholder='Type Calling Name' required>
        </div>
        
        <div class='inputBox'>
           <input type='text' name = 'designation' placeholder='Type Designation' required>
           <input type='text' name = 'jobrole' placeholder='Type Job Role' required>
        </div>
        
        <div class='inputBox'>
           <input type='text' name = 'department' placeholder='Type Department' required>
           <input type='text' name = 'roster' placeholder='Type Roster' required>
        </div>
        
        <div class='inputBox'>
            <input type='date' name = 'dob' placeholder='Date of Birth' required>
           <select name = 'gender' required>
               <option value = '#'>Select Your Gender</option>
               <option value = 'Male'>Male</option>
               <option value = 'Female'>Female</option>
           </select>
        </div>
        
        <div class='inputBox'>
           <select name = 'matrialstate' required>
               <option value = '#'>Select Your Civil State</option>
               <option value = 'Married'>Married</option>
               <option value = 'Unmarried'>Unmarried</option>
           </select>
           <input type='date' name = 'goj' placeholder='Type Group Join Date' required>
        </div>
        
        <div class='inputBox'>
           <input type='text' name = 'hod' placeholder='Type Head Of Department' required>
           <select name = 'ol' required>
               <option value = '#'>Select O/Level Status</option>
               <option value = '1'>Pass</option>
               <option value = '0'>None</option>
           </select>
        </div>
        
        <div class='inputBox'>
           <select name = 'al' required>
               <option value = '#'>Select A/Level Status</option>
               <option value = '1'>Pass</option>
               <option value = '0'>None</option>
               <input type='text' name = 'degree' style = 'margin-left:3px;' placeholder='Degree'>
           </select>
        </div>
        
        <div class='inputBox'>
           <input type='text' name = 'hnd' placeholder='Higher National Diploma'>
           <input type='text' name = 'diploma' placeholder='Diploma'>
        </div>
        
         <div class='inputBox'>
           <input type='text' name = 'course' placeholder='Course'>
           <input type='text' name = 'remark' placeholder='remark'>
        </div>
        
        <div class='inputBox'>
           <input type="file" name="img" placeholder = "Upload Image" class = "upload-box" placeholder = 'Select Image' id="files">
           <input type='submit' name = 'addmember' value='Add Member' class='btn' style = ';background:#4A89DC;'>
        </div>
        
        <center>
        
        </center>
    </form>
</section>

<section class="footer">

    <h1 class="credit"> Developed By <span> <a href = 'https://theekshana.lacelanelk.com/' style = 'text-decoration:none;Color:#4A89DC;'>Theekshana Thennakoon</span></h1>

</section>
</body>
</html>