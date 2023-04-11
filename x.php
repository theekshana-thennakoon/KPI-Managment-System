<?php
session_start();
?>
<?php
include('database.php');
?>

<?php
if(isset($_POST['addmember'])){
    $employeenumber = $_POST['employeenumber'];
    $name = $_POST['name'];
    $cname = $_POST['cname'];
    $designation = $_POST['designation'];
    $roster = $_POST['roster'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $jobrole = $_POST['jobrole'];
    $department = $_POST['department'];
    $matrialstate = $_POST['matrialstate'];
    $goj = $_POST['goj'];
    $hod = $_POST['hod'];
    $epf = $_POST['epf'];
    $ol = $_POST['ol'];
    $al = $_POST['al'];
    $degree = $_POST['degree'];
    $course = $_POST['course'];
    $diploma = $_POST['diploma'];
    $hnd = $_POST['hnd'];
    $remark = $_POST['remark'];
    
    
    $img = $_POST['img'];
    $image = $_FILES['img']['name'];
	$filetmpname = $_FILES['img']['tmp_name'];
	$folder = 'images/';
    
    
    
    if ($degree == ''){
        $degree = '0';
    }
    
    if ($course == ''){
        $course = '0';
    }
    if ($diploma == ''){
        $diploma = '0';
    }
    if ($hnd == ''){
        $hnd = '0';
    }
    if ($remark == ''){
        $remark = '0';
    }
    
    
    $sqli = "insert into staff values('$employeenumber','$epf','$name','$cname','$designation','$jobrole','$department','$roster','$dob','$gender','$matrialstate','$goj','$hod','$image')";
    
	if($conn->query($sqli) === TRUE){
        
	    $sqlii = "insert into education values('$epf',$ol,'$al','$degree','$course','$diploma','$hnd','$remark')";
	    move_uploaded_file($filetmpname,$folder.$image);
    	if($conn->query($sqlii) === TRUE){	
            header('location:edit.php');
    	}
	}
}


if(isset($_GET['did'])){
    $did = $_GET['did'];
    $sqli = "delete from staff where epf = '{$did}'";
    if($conn->query($sqli) === TRUE){
        
        $sqld = "delete from education where epf = '{$did}'";
        if($conn->query($sqld) === TRUE){
        	header('location:view.php');
        }
    }
}



if(isset($_POST['editmember'])){
    $employeenumber = $_POST['employeenumber'];
    $name = $_POST['name'];
    $cname = $_POST['cname'];
    $designation = $_POST['designation'];
    $roster = $_POST['roster'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $jobrole = $_POST['jobrole'];
    $department = $_POST['department'];
    $matrialstate = $_POST['matrialstate'];
    $goj = $_POST['goj'];
    $hod = $_POST['hod'];
    $epf = $_POST['epf'];
    $ol = $_POST['ol'];
    $al = $_POST['al'];
    $hnd = $_POST['hnd'];
    $degree = $_POST['degree'];
    $diploma = $_POST['diploma'];
    $course = $_POST['course'];
    $remark = $_POST['remark'];
    
    $sqli = "Update staff set employee_number = '$employeenumber', name = '$name', calling_name = '$cname', designation = '$designation',job_role = '$jobrole', department = '$department', roster = '$roster', date_of_birth = '$dob', gender = '$gender', matrial_status = '$matrialstate', group_join = '$goj', hod = '$hod' where epf = '$epf'";
	if($conn->query($sqli) === TRUE){
	    //$_SESSION['addline'];
	    $sqla = "Update education set ol = $ol, al = $al, degree = '$degree', course = '$course',diploma = '$diploma', hnd = '$hnd', remark = '$remark' where epf = '$epf'";
    	if($conn->query($sqla) === TRUE){
    	    //$_SESSION['addline'];
            header('location:view1.php');
    	}
	}
}

if (isset($_POST['editkpi'])){
    $epff = $_POST['epf'];
    $month = $_POST['month'];
    $sqlc = "SELECT * FROM empkpi where epf = '$epff'";
    $resultc = $conn->query($sqlc);
    if ($resultc->num_rows > 0){
    	while($rowc = $resultc->fetch_assoc()){
    		$kpiid = $rowc['id'];
    		$kpiinputid = $_POST[$kpiid];
    		echo $kpiid . ' - ' . $kpiinputid . '<br>';
    		$sqlii = "insert into kpimonthemp(epf,kpiid,kpimark,month) values('$epff',$kpiid,$kpiinputid,'$month')";
    	    if($conn->query($sqlii) === TRUE){	
                header('location:view.php');
        	}
    	}
    }
}

?>