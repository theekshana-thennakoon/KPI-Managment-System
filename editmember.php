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
    .img{
        border:8px solid #dcdcdc;
        border-radius:50%;
    }
    .round{
        position:absolute;
        background:#4A89DC;
        width:35px;
        height:35px;
        line-height:40px;
        text-align:center;
        border-radius:50%;
        overflow:hidden;
        top:43%;
        right:45%;
    }
    .round input[type = 'file']{
        position:absolute;
        transform:scale(2);
        opacity:0;
        
    }
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
            
			<!--<a href = 'view.php'><i class='fa fa-eye' style = 'color:#4A89DC;'></i></a>-->
            
        </div>

    </div>


</header>

<!-- header section ends -->

<!-- Pickup section starts  -->
<br>
<br> 

<section id = 'addemployee'>
    <span><center><h1>Edit Member Details</h1></center></span>
    
    <?php
        $searchepf = $_GET['eid'];
        $sqla = "SELECT * FROM staff where epf = '$searchepf'";
	    
		$resulta = $conn->query($sqla);
		if ($resulta->num_rows > 0){
			while($rowa = $resulta->fetch_assoc()){
				$name = $rowa['name'];
				$epf = $rowa['epf'];
				$cname = $rowa['calling_name'];
				$employee_number = $rowa['employee_number'];
				$designation = $rowa['designation'];
				$jobrole = $rowa['job_role'];
				$department = $rowa['department'];
				$roster = $rowa['roster'];
				$dob = $rowa['date_of_birth'];
				$gender = $rowa['gender'];
				$matrial_state = $rowa['matrial_status'];
				$god = $rowa['group_join'];
				$hod = $rowa['hod'];
				$image = $rowa['image'];
			}
				if ($image !== ''){
			    $avatarimage = $image;
    			}
    			else if($gender == 'Female'){
    			    $avatarimage = 'avatar_female.png';
    			}
    			else{
    			    $avatarimage = 'avatar_male.png';
    			}
    			
    			
    			$sqlb = "SELECT * FROM education where epf = '$searchepf'";
	            $resultb = $conn->query($sqlb);
        		if ($resultb->num_rows > 0){
        			while($rowb = $resultb->fetch_assoc()){
        				$ol = $rowb['ol'];
        				$al = $rowb['al'];
        				$degree = $rowb['degree'];
        				$diploma = $rowb['diploma'];
        				$course = $rowb['course'];
        				$hnd = $rowb['hnd'];
        			}
        		}
		}
		//echo $avatarimage;
		?>
		<form action='' method = 'post' enctype="multipart/form-data" id = 'imgform'>
    		<center>
            <div class='col-lg-4 col-md-5'>
                <div class='avatar hover-effect bg-white shadow-sm p-1' style = 'border-radius:50%;'><img class = 'img' src='images/<?php echo $avatarimage;?>' width='125' height='125' style = 'filter: grayscale(0%);'/></div>
                
                <div class = 'round'>
                    <input type = 'file' name = 'img' id = 'img' accept = '.jpg, .jpeg, .png'>
                    <i class = 'fa fa-camera' style = 'font-size:16px;color:#fff;'></i>
                </div>
            </div>
            </center>
        </form>
        
    <form action='x.php' method = 'post'>
        <div class='inputBox'>
           <input type='text' name = 'epf' placeholder='Type EPF' value = '<?php echo $epf; ?>' required>
           <input type='text' name = 'employeenumber' placeholder='Type Employee Number' value = '<?php echo $employee_number; ?>' required>
        </div>
        
        <div class='inputBox'>
           <input type='text' name = 'name' placeholder='Type Name with Initials' value = '<?php echo $name; ?>' required>
           <input type='text' name = 'cname' placeholder='Type Calling Name' value = '<?php echo $cname; ?>' required>
        </div>
        
        <div class='inputBox'>
           <input type='text' name = 'designation' placeholder='Type Designation' value = '<?php echo $designation; ?>' required>
           <input type='text' name = 'jobrole' placeholder='Type Job Role' value = '<?php echo $jobrole; ?>' required>
        </div>
        
        <div class='inputBox'>
           <input type='text' name = 'department' placeholder='Type Department' value = '<?php echo $department; ?>' required>
           <input type='text' name = 'roster' placeholder='Type Roster' value = '<?php echo $roster; ?>' required>
        </div>
        
        <div class='inputBox'>
            <input type='text' name = 'dob' placeholder='Date of Birth' value = '<?php echo $dob; ?>' required>
           <select name = 'gender' required>
               <option value = '<?php echo $gender; ?>'><?php echo $gender; ?></option>
               <option value = 'Male'>Male</option>
               <option value = 'Female'>Female</option>
           </select>
        </div>
        
        <div class='inputBox'>
           <select name = 'matrialstate' required>
               <option value = '<?php echo $matrial_state;?>'><?php echo $matrial_state; ?></option>
               <option value = 'Married'>Married</option>
               <option value = 'Unmarried'>Unmarried</option>
           </select>
           <input type='text' name = 'goj' placeholder='Type Group Join Date' value = '<?php echo $god;?>' required>
        </div>
        
        <div class='inputBox'>
           <input type='text' name = 'hod' placeholder='Type Head Of Department' value = '<?php echo $hod; ?>' required>
           <select name = 'ol' required>
               <?php
               
               if ($ol == '1'){
                   $olr = 'Pass';
               }
               else{
                   $olr = 'Fail';
               }
               
               ?>
               <option value = '<?php echo $ol;?>'><?php echo $olr;?> O / Level</option>
               <option value = '1'>Pass</option>
               <option value = '0'>None</option>
           </select>
        </div>
        
        <div class='inputBox'>
            <?php
               
               if ($al == '1'){
                   $alr = 'Pass';
               }
               else{
                   $alr = 'Fail';
               }
               
               ?>
           <select name = 'al' required>
               <option value = '<?php echo $al;?>'><?php echo $alr;?> A / Level</option>
               <option value = '1'>Pass</option>
               <option value = '0'>None</option>
               <input type='text' name = 'degree' style = 'margin-left:3px;' placeholder='Degree' value = <?php echo $degree;?>>
           </select>
        </div>
        
        <div class='inputBox'>
           <input type='text' name = 'hnd' placeholder='Higher National Diploma' value = <?php echo $hnd;?>>
           <input type='text' name = 'diploma' placeholder='Diploma' value = <?php echo $diploma;?>>
        </div>
        
         <div class='inputBox'>
           <input type='text' name = 'course' placeholder='Course' value = <?php echo $course;?>>
           <input type='text' name = 'remark' placeholder='remark' value = <?php echo $remark;?>>
        </div>
           
        <center>
           <input type='submit' name = 'editmember' value='Edit Details' class='btn' style = ';background:#4A89DC;'>
        </center>
        
        
    </form>
</section>

<section class="footer">

    <h1 class="credit"> Developed By <span> <a href = 'https://theekshana.lacelanelk.com/' style = 'text-decoration:none;Color:#4A89DC;'>Theekshana Thennakoon</span></h1>

</section>

<script>
    document.getElementById('img').onchange = function(){
        document.getElementById('imgform').submit();
    }
</script>
<?php
    if(isset($_FILES['img']['name'])){
        $image = $_FILES['img']['name'];
    	$filetmpname = $_FILES['img']['tmp_name'];
    	$folder = 'images/';
    	
    		$sqli = "update staff set image = '{$image}' where epf = '{$searchepf}'";
        	if($conn->query($sqli) === TRUE){
        		move_uploaded_file($filetmpname,$folder.$image);
        	}	
    }
?>
</body>
</html>