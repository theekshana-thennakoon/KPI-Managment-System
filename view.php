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
    <title>All Members</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
	
	<link href="assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
	.inputBox input{
	  padding:12px;
	  font-size: 14px;
	  text-transform: none;
	  border:.1rem solid #4A89DC;
	  width: 100%;
  }
  table{width:100%;}
  th,td{padding:1%;border:1px solid #000;font-size:14px;}
  th{text-align:center;}
  .thead{color:#fff;}
  @media(max-width:1196px){
      .thead{display:none;}
      
      table tr, table th{display:block;width:100%;}
      
      table th{
          text-align:right;
          padding-left:50%;
          text-align:right;
          position:relative;
      }
      
      table tr{margin-bottom:15px;}
      
      table th::before{
          content:attr(data-label);
          position:absolute;
          left:0;
          width:50%;
          padding-left:15px;
          font-size:15px;
          font-weight:bold;
          text-align:left;
      }
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
            
			<form action = 'view.php' method = 'post'>
                <div class = 'inputBox'>
                    <input type = 'text' name = 'searchepf' placeholder = 'Search From EPF'>
                    <input type = 'submit' name = 'searchbtn' value = 'Search' style = 'display:none;'>
                </div>
            </form>
            
        </div>

    </div>


</header>

<!-- header section ends -->

<!-- Pickup section starts  -->
<br>
<br> 

<section>
    <br>
	<table>
	    <tr class = 'thead'>
	        <th style = 'background:#4A89DC;'>EPF</th>
	        <th style = 'background:#4A89DC;'>Name</th>
	        <th style = 'background:#4A89DC;'>Department</th>
	        <th style = 'background:#4A89DC;'>Action</th>
	    </tr>
	    
	    <?php
	    
	    if (isset($_POST['searchbtn'])){
        $searchepf = $_POST['searchepf'];
        $sqla = "SELECT * FROM staff where epf = $searchepf";
	    }
	    else{
	        $sqla = "SELECT * FROM staff order by name ASC";
	    }
	    
	    
		$resulta = $conn->query($sqla);
		if ($resulta->num_rows > 0){
			while($rowa = $resulta->fetch_assoc()){
				$name = $rowa['name'];
				$epf = $rowa['epf'];
				$department = $rowa['department'];
				
				echo "<tr>
            	        <th data-label = 'EPF' style = 'text-align:left;'>{$epf}</th>
            	        <th data-label = 'Name' style = 'text-align:left;'>{$name}</th>
            	        <th data-label = 'Department' style = 'text-align:left;'>{$department}</th>
            	        <th data-label = 'Action'>
            	            <a href = 'editkpi.php?kpiid={$epf}'><i class='fas fa-plus'></i></a> 
            	            <a href = 'editmember.php?eid={$epf}'><i class='fas fa-pen'></i></a> 
            	            <a href = 'x.php?did={$epf}'> <i class='fas fa-trash-alt' style = 'color:#f00;'></i></a>
            	        </th>
            	   </tr>";
			}
		}
		else{
		    echo "<h3>No Leaves Yet</h3>";
		}
	    
	    ?>
    </table>
</section>
<br><br><br><br>
<center>
<section class="footer">

    <h1 class="credit"> Developed By <span> <a href = 'https://theekshana.lacelanelk.com/' style = 'text-decoration:none;Color:#f00;'>Theekshana Thennakoon</span></h1>

</section>
</body>
</html>