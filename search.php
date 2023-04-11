<?php
include('database.php');
?>
<?php
$epf = $_POST['name'];
$sql = "SELECT * FROM empkpi WHERE epf = '{$epf}'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $nm = array();
    while ($row=mysqli_fetch_assoc($result)) {
	    $id = $row['id'];
	    $kpi = $row['kpi'];
	    $nm[] = $id;
	    $myChardidname = 'myChart' . $id;
		echo "<div style = 'float:left;width:45%;margin:2%'><p>{$kpi}</p><canvas id = '$myChardidname'></canvas></div>
		";
		//echo "<p>{$kpi}</p><canvas id = '$myChardidname'></canvas>";
	}
}
$kpiodarray = array();
$kpimarkarray = array();
$kpimontharray = array();
$sqlj = "SELECT * FROM kpimonthemp WHERE epf = '{$epf}'";
$resultj = mysqli_query($conn, $sqlj);
if(mysqli_num_rows($resultj)>0){
    
	while ($rowj=mysqli_fetch_assoc($resultj)) {
	    $idofkpimonth = $rowj['kpiid'];
	    $kpimark = $rowj['kpimark'];
	    $kpimonth = $rowj['month'];
	    $kpiidarray[] = $idofkpimonth;
	    $kpimarkarray[] = $kpimark;
	    $kpimontharray[] = $kpimonth;
	}
	//echo $epf;
}

?>
 <script type="text/javascript">
        var nm = <?php echo json_encode($nm); ?>;
        var kpiidarray = <?php echo json_encode($kpiidarray); ?>;
        var kpimarkarray = <?php echo json_encode($kpimarkarray); ?>;
        var kpimontharray = <?php echo json_encode($kpimontharray); ?>;
        var noofkip = kpiidarray.length / nm.length;
        var sub_array = [];
        //change 1 & <=
        for (var jayani = 0; jayani < kpimontharray.length;jayani = jayani + nm.length){
            sub_array.push(kpimontharray[jayani]);
            //console.log(kpimontharray[jayani]);
        }
        console.log(sub_array)
        
        //console.log(mrkary);
        //console.log(nm);
        //console.log(noofkip);
        //console.log(kpiidarray);
        //console.log(kpimarkarray);
        //console.log(kpimontharray);
</script>
<?php
echo "<script>
        var mrkary = [];
        for (var mrk = 0; mrk < nm.length;mrk++){
            for (var mrkk = 0; mrkk < kpimarkarray.length; mrkk = mrkk + nm.length){
                mrkary.push(kpimarkarray[mrkk+mrk]);
                //console.log(mrkk+mrk);
            }
            //console.log(mrkk);
        }
        console.log(mrkary);
        var divkpi = [];
        for (var a = 0; a < nm.length; a++){
            divkpi.push(mrkary.slice(a * noofkip,(a + 1) * noofkip));
        }
        
        console.log(divkpi);
        
          
        for (let cid = 0; cid < nm.length; cid ++){
        
            const labels = sub_array;
            const data = {
                labels: labels,
                datasets: [{
                  label: 'KPI Report Chart',
                  data: divkpi[cid],
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
            type: 'line',
            data: data,
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            },
          };
            
            var chartnameid = 'myChart' + nm[cid];
            new Chart(
                document.getElementById(chartnameid),
            config
            );
            
        }
        
    </script>";
    ?>
    <script type="text/javascript">
        var nm = <?php echo json_encode($nm); ?>;
        //console.log(nm);
    </script>