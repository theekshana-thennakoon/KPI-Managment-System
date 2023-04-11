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
    table{width:100%;}
    td{padding:0.5%;font-size:16px;}
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
    <span><center><h1>Add / Edit KPI</h1></center></span>
    
    <?php
        $searchepf = $_GET['kpiid'];
        $sqla = "SELECT * FROM staff where epf = '$searchepf'";
	    
		$resulta = $conn->query($sqla);
		if ($resulta->num_rows > 0){
			while($rowa = $resulta->fetch_assoc()){
				$name = $rowa['name'];
				$epf = $rowa['epf'];
				$gender = $rowa['gender'];
				$image = $rowa['image'];
			}
				if ($image != ''){
			    $avatarimage = $image;
    			}
    			else if($gender == 'Female'){
    			    $avatarimage = 'avatar_female.png';
    			}
    			else{
    			    $avatarimage = 'avatar_male.png';
    			}
		}
		?>
    <form action='x.php' method = 'post'>
        <center>
        <div class='col-lg-4 col-md-5'>
            <div class='avatar hover-effect bg-white shadow-sm p-1' style = 'border-radius:50%;'><img class = 'img' src='images/<?php echo $avatarimage;?>' width='100' height='100' style = 'filter: grayscale(0%);'/></div>
        </div>
        </center>
        <div class='inputBox'>
           <input type='text' name = 'epf' placeholder='Type EPF' value = '<?php echo $epf; ?>' readonly required>
           <input type='text' name = 'name' placeholder='Type Name with Initials' value = '<?php echo $name; ?>' readonly required>
        </div>
        
        <div class='inputBox'>
            <center>
               <input type='month' name = 'month'>
            </center>
        </div>
        
        <div class='inputBox'>
           
           <?php
           echo "<table>";
            $sqlb = "SELECT * FROM empkpi where epf = '$searchepf'";
    		$resultb = $conn->query($sqlb);
    		if ($resultb->num_rows > 0){
    			while($rowb = $resultb->fetch_assoc()){
    				$kpi = $rowb['kpi'];
    				$kpid = $rowb['id'];
    				echo "<tr><td>{$kpi}</td><td><input type='number' name = '{$kpid}' placeholder='Type KPI achievement (%)' required style = 'width:100%;'></td></tr>";
    			}
    		}
           
           ?>
           
        </div>
        
        <center>
           <input type='submit' name = 'editkpi' value='Add / Edit KPI' class='btn' style = ';background:#4A89DC;'>
        </center>
        
        
    </form>
</section>

</body>
</html>