<?php
include('database.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Cedra Pharmacy</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="sb-nav-fixed">
<?php
$epf = 12763;
$nm = array();
$sql = "SELECT * FROM empkpi WHERE epf = '{$epf}'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
	    $id = $row['id'];
	    $kpi = $row['kpi'];
	    $nm[] = $id;
	    
	    echo $id;
		echo "<p>{$kpi}</p><canvas id='myChart{$id}' style = 'width:40%;'></canvas>";
	}
	echo $nm;
}
?>
 <script type="text/javascript">
        var nm = <?php echo json_encode($nm); ?>;
        console.log(nm.length);
        
        for (let cid = 0; cid < nm.length; cid ++){
            let chartnameid = 'myChart' + nm[cid];
            console.log(chartnameid);
            var myChartid = myChart + stk;
        	console.log(myChartid);
        	var myChartid = new Chart(
                document.getElementById('myChartid'),
            config
            );
        }
        /*var myChartid = myChart + stk;
    	console.log(myChartid);
    	var myChartid = new Chart(
            document.getElementById('myChartid'),
        config
        );*/
        
    </script>

<?php
echo "<script>
        const labels = ['Jan','Feb','Mar','Apr','May','Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'];
         const data = {
            labels: labels,
            datasets: [{
              label: 'KPI Report',
              data: [55,72,68,93,47,55,72,68,93,47,100,99],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
              ],
              borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
                
        const config = {
            type: 'bar',
            data: data,
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            },
          };
                    
          
    </script>";
    /*$sqla = "SELECT * FROM empkpi WHERE epf = '{$epf}'";
    $resulta = mysqli_query($conn, $sqla);
    if(mysqli_num_rows($resulta)>0){
    	while ($rowa = mysqli_fetch_assoc($resulta)) {
    	    $ida = $rowa['id'];
    	    echo "<script>
    	    
    	        var stk = echo json_encode($ida);
    	        var myChartid = myChart + stk;
    	        console.log(myChartid);
    		    var myChartid = new Chart(
                    document.getElementById('myChartid'),
                    config
                );
                  
    		</script>";
    	}
    }*/
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    </body>
    </html>