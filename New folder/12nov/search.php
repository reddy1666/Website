<?php  

include 'db.php';
 ?>
<html> 
	<head> 
	
		<title></title>
	</head>
		<style> 
			table{ 
				border:2px solid black;
				width:1000px;
				 
				
			} 
			table td { 
				text-align:center;
				 border-collapse: collapse;
			} 
		   th,td{ 
					border:2px solid black;
				cell-padding:10px;
			}
		</style>
	<body>
		<h1>Music Concerts List</h1>
		
		<?php   
		
		if(isset($_GET['submit']))
{
    $from = $_GET['from'] ;
}
		 
			if(mysqli_connect_errno())
			{ 
			echo "failed to connect :" .mysqli_connect_error();
		}
			
		$result = mysqli_query($conn,"SELECT * FROM music");
		if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }

		echo " 
			<div id='tab'>
			<table> 
			<tr> 
				<th></th>
				<th>DJ_name</th>
				<th>from</th>
				<th>end.time</th>
				<th>to</th>
				<th>arr.time</th>
				<th>date</th>
				
			</tr>";
		
			while($row = mysqli_fetch_array($result))
			{ 
			
			
			echo "<tr>";
            echo "<td>" . $row['DJ_no'] . "</td>";
			
            echo "<td>" . $row['DJ_name'] . "</td>";
			  echo "<td>" . $row['from'] . "</td>";
			    echo "<td>" . $row['end.time'] . "</td>";
				  echo "<td>" . $row['to'] . "</td>";
				    echo "<td>" . $row['arr.time'] . "</td>";
					
						echo "<td>" .$_GET['date'].  "</td>";
						echo " <td> 
						<a href='details.php?Dj_no=$row[DJ_no]&date=$_GET[date]'>book</a>
					</td> ";
			}
				
		
			echo " 
			</tr>
			</table>
			</div>
		";
		?>
	</body>
</html>
