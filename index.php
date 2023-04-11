<?php
session_start();
?>
<?php
include('database.php');
?>
<!DOCTYPE html>
<html lang='en-US'>
  <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>KPI Reports</title>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin='crossorigin'/>
    <link rel='preload' as='style' href='https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap'/>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap' media='print' onload='this.media='all''/>
    <noscript>
      <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap'/>
    </noscript>
    <link href='css/font-awesome/css/all.min.css?ver=1.2.0' rel='stylesheet'>
    <link href='css/bootstrap.min.css?ver=1.2.0' rel='stylesheet'>
    <link href='css/aos.css?ver=1.2.0' rel='stylesheet'>
    <link href='css/main.css?ver=1.2.0' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <noscript>
      <style type='text/css'>
        [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
        }
      </style>
    </noscript>
    
    <style>
    	.inputBox input{
    	  padding:10px;
    	  font-size: 14px;
    	  background:#f7f7f7;
    	  text-transform: none;
    	  border:.1rem solid #4A89DC;
    	  width: 100%;
      }
      
      .inputBox input:focus{
        border-color: #4A89DC;
        box-shadow:none;
    }
      
    </style>  
  </head>
  <body id='top'>
        <header class='d-print-none'>
            <div class='container text-center text-lg-left'>
                <div class='py-3 clearfix'>
                    <form action = 'index.php' method = 'post'>
                        <div class = 'inputBox'>
                            <input type = 'text' name = 'searchepf' placeholder = 'Search From EPF'>
                            <input type = 'submit' name = 'searchbtn' value = 'Search' style = 'display:none;'>
                        </div>
                    </form>
                    
                    <a href = 'edit.php'>
                        <i class='fa fa-user' aria-hidden='true' style = 'color:#4A89DC;font-size:25px;position:fixed;right:90px;top:40px;'></i>
                    </a>
                    <a href = 'view.php'><i class='fa fa-eye' style = 'color:#4A89DC;font-size:25px;position:fixed;right:50px;top:40px;'></i></a>
                </div>
            </div>
        </header>
    <?php
    
    if (isset($_POST['searchbtn'])){
        $searchepf = $_POST['searchepf'];
        $sqla = "SELECT * FROM staff where epf = $searchepf";
		$resulta = $conn->query($sqla);
		if ($resulta->num_rows > 0){
		    //echo "hi";
			while($rowa = $resulta->fetch_assoc()){
				$name = $rowa['name'];
				$job_role = $rowa['job_role'];
				$department = $rowa['department'];
				$epf = $rowa['epf'];
				$designation = $rowa['designation'];
				$hod = $rowa['hod'];
				$dob = $rowa['date_of_birth'];
				$gender = $rowa['gender'];
				$matrial_status = $rowa['matrial_status'];
				$image = $rowa['image'];
				$group_join = $rowa['group_join'];
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
			
			$sqlb = "SELECT * FROM education where epf = $searchepf";
    		$resultb = $conn->query($sqlb);
    		if ($resultb->num_rows > 0){
    		    while($rowb = $resultb->fetch_assoc()){
    				$ol = $rowb['ol'];
    				$al = $rowb['al'];
    				$degree = $rowb['degree'];
    				$diploma = $rowb['diploma'];
    				$course = $rowb['course'];
    				$hnd = $rowb['hnd'];
    				$remark = $rowb['remark'];
    			}
    		}
			
		    if ($ol == 1){
			    $olresult = "<i class='fa fa-check' aria-hidden='true' style = 'color:#0f0;'></i>";
			}
			else{
			    $olresult = "<i class='fa fa-times' aria-hidden='true' style = 'color:#f00;'></i>";
			}
			
			if ($al == 1){
			    $alresult = "<i class='fa fa-check' aria-hidden='true' style = 'color:#0f0;'></i>";
			}
			else{
			    $alresult = "<i class='fa fa-times' aria-hidden='true' style = 'color:#f00;'></i>";
			}
			
			if($degree != '0'){
			    $degreerslt = $degree . '<br>';
			}
			else{
			    $degreerslt = '';
			}
			if($diploma != '0'){
			    $diplomaerslt = $diploma . '<br>';
			}
			else{
			    $diplomaerslt = '';
			}
			if($hnd != '0'){
			    $hndrslt = $hnd . '<br>';
			}
			else{
			    $hndrslt = '';
			}
			if($course != '0'){
			    $courserslt = $course . '<br>';
			}
			else{
			    $courserslt = '';
			}
			if ($degree == '0' and $diploma == '0' and $hnd == '0' and $course == '0' and $ol == 0 and $al == 0){
			    $rmrk = $remark;
			}
			else{
			    $rmrk = '';
			}
			
			$fresult = $degreerslt . $diplomaerslt . $hndrslt . $courserslt . $rmrk;
			
			echo "
        
            <div class='page-content' id='invoice'>
                <div class='container'>
                    <div class='cover shadow-lg bg-white'>
                        <div class='cover-bg p-3 p-lg-4 text-white'>
                            <div class='row'>
                                <div class='col-lg-4 col-md-5'>
                                    <div class='avatar hover-effect bg-white shadow-sm p-1' style = 'border-radius:50%;'><img src='images/$avatarimage' width='200' height='200' style = 'filter: grayscale(0%);'/></div>
                                </div>
                                <div class='col-lg-8 col-md-7 text-center text-md-start'>
                                    <h2 class='h1 mt-2' data-aos='fade-left' data-aos-delay='0'>{$name}</h2>
                                    <p data-aos='fade-left' data-aos-delay='100'>{$designation}</p>
                                    <p data-aos='fade-left' data-aos-delay='100'>{$department}</p>
        
                                    <!--<div class='d-print-none' data-aos='fade-left' data-aos-delay='200'>
                                        <a class='btn btn-light text-dark shadow-sm mt-1 me-1' href='right-resume.pdf' download target='_blank'>Download KPI Report</a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class='about-section pt-4 px-3 px-lg-4 mt-1'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <h2 class='h3 mb-3'>Education Qualification</h2>
                                    <p>
                                        Ordinary Level {$olresult}<br>
                                        Advance Level {$alresult}</i><br>
                                        <b>{$fresult}</b>
                                    </p>";
                                
                                    $nm = array();
                                    $career = '';
                                    $sqla = "SELECT * FROM career where epf = '{$searchepf}'";
                            	    $resulta = $conn->query($sqla);
                            		if ($resulta->num_rows > 0){
                            		    echo "<br><ul><b>Career Path</b>";
                            			while($rowa = $resulta->fetch_assoc()){
                            				$path = $rowa['path'];
                            				for ($ipath = 0; $ipath < strlen($path); $ipath++){
                            				    if ($path[$ipath] == ',' or (($ipath + 1) == strlen($path))){
                            				        echo '<li>' . $career . '</li><br>';
                            				        //$nm[] = $career;
                            				        $career = '';
                            				    }
                            				    else{
                            				        $career = $career . $path[$ipath];
                            				    }
                            				}
                            			}
                            			echo "</ul>";
                            		}
                                echo "</div>
                                
                                <div class='col-md-5 offset-md-1'>
                                <div class='row mt-2'>
            
                                <div class='col-sm-4'>
                                    <div class='pb-1'>EPF No</div>
                                </div>
          
                                <div class='col-sm-8'>
                                    <div class='pb-1 text-secondary'>{$epf}</div>
                                </div>
          
                              
                                <div class='col-sm-4'>
                                <div class='pb-1'>Designation</div>
                                </div>
                              
                                <div class='col-sm-8'>
                                  <div class='pb-1 text-secondary'>{$designation}</div>
                                </div>
                                
                                <div class='col-sm-4'>
                                <div class='pb-1'>HOD</div>
                                </div>
                              
                                <div class='col-sm-8'>
                                  <div class='pb-1 text-secondary'>{$hod}</div>
                                </div>
                                
                                <div class='col-sm-4'>
                                <div class='pb-1'>Department</div>
                                </div>
                              
                                <div class='col-sm-8'>
                                  <div class='pb-1 text-secondary'>{$department}</div>
                                </div>
                                
                                <div class='col-sm-4'>
                                <div class='pb-1'>Date of Birth</div>
                                </div>
                              
                                <div class='col-sm-8'>
                                  <div class='pb-1 text-secondary'>{$dob}</div>
                                </div>
                                
                                <div class='col-sm-4'>
                                <div class='pb-1'>Gender</div>
                                </div>
                              
                                <div class='col-sm-8'>
                                  <div class='pb-1 text-secondary'>{$gender}</div>
                                </div>
                                
                                <div class='col-sm-4'>
                                <div class='pb-1'>Marital Status</div>
                                </div>
                              
                                <div class='col-sm-8'>
                                  <div class='pb-1 text-secondary'>$matrial_status</div>
                                </div>
                                
                                <div class='col-sm-4'>
                                    <div class='pb-1'>Joined Date</div>
                                </div>
                              
                                <div class='col-sm-8'>
                                    <div class='pb-1 text-secondary'>$group_join</div>
                                </div>
          
                            </div>
                        </div>
                    </div>
                </div>
                <hr class='d-print-none'/>
                <div class='work-experience-section px-3 px-lg-4'>
                    <center><h2 class='h3 mb-4'>KPI Reports</h2></center>
                    <div id = 'output' style = 'width:100%;backgroung:#fff;'></div>
                    
                </div>
            </div>
        </div>
        <hr class='d-print-none'/>
        <div class='page-break'></div>
        
    </div>
    
</div>
</div>
        
        <script src='scripts/bootstrap.bundle.min.js?ver=1.2.0'></script>
        <script src='scripts/aos.js?ver=1.2.0'></script>
        <script src='scripts/main.js?ver=1.2.0'></script>
    ";
		}
		else{
		    echo "Any Employee Hasn't For This EPF</center>";
		}
    }
    
    ?>
    <br>
    <footer class='pt-4 pb-4 text-muted text-center d-print-none'>
            
            <div class='container' style = 'margin-top:100%;'>
                <div class='text-small'>
                    <center><button class='btn btn-light text-dark shadow-sm mt-1 me-1' id='download' target='_blank'  style = 'background:#4A89DC;color:#fff;'><font style = 'color:#fff;'>Download Report</font></button></center>
                    <br><br>
                    <div class='mb-1'>&copy; Developed By <a href = 'http://theekshana.lacelanelk.com/' style = 'color:#3472f2 background:#4A89DC;'>Theekshana Thennakoon.</a></div>
                </div>
            </div>
        </footer>
    <script>
        window.onload = function () {
            document.getElementById("download")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("invoice");
                console.log(invoice);
                console.log(window);
                var opt = {
                    margin: 0.2,
                    filename: 'KPI_Report.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
                };
                html2pdf().from(invoice).set(opt).save();
            })
        }

$(document).ready(function(){
    var searchepf = <?php echo json_encode($searchepf); ?>;
    $.ajax({
        type:'POST',
        url:'search.php',
        data:{
          name:searchepf,
        },
        success:function(data){
          $("#output").html(data);
        }
      });
  });

</script>
  </body>
</html>