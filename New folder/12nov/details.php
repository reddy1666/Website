
<?php 
	include 'db.php';
?>

<?php  
	
		if(isset($_GET['submit'])){
		$DJ_no = mysqli_real_escape_string($conn, strip_tags($_GET['DJ_no'])) ;
		$DJ_name = mysqli_real_escape_string($conn, strip_tags($_GET['DJ_name'])) ;
		$from = mysqli_real_escape_string($conn,strip_tags($_GET['from']));
		$to = mysqli_real_escape_string($conn,strip_tags( $_GET['to']));
		$class = mysqli_real_escape_string($conn,strip_tags($_GET['class']));
		$date = mysqli_real_escape_string($conn,strip_tags($_GET['date'])) ;
		$name = mysqli_real_escape_string($conn,strip_tags($_GET['name'])) ;
		$age = mysqli_real_escape_string($conn,strip_tags($_GET['age'])) ;
		$sex = mysqli_real_escape_string($conn,strip_tags($_GET['sex'])) ;
		$bp = mysqli_real_escape_string($conn,strip_tags($_GET['bp'])) ;
		$sc = mysqli_real_escape_string($conn,strip_tags($_GET['sc'])) ;
		
		$details_ins_sql = "INSERT INTO details(DJ_no,DJ_name,from,to,class,date,name,age,sex,berth_preference,senior_citize) VALUES ('$DJ_no','$DJ_name','$from','$to','$class','$date','$name','$age','$sex','$bp','$sc')";
		mysqli_query($conn,$details_ins_sql);
	}
	
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
		<div> 
			<table> 
				<tr> 
					<th>DJ_no</th>
					<th>DJ_name</th>
					<th>from</th>
					<th>end.time</th>
					<th>to</th>
					<th>arr.time</th>
					<th>date</th>
				</tr>
				<tr> 
					<?php  
						if(isset($_GET['DJ_no'])){ 
							$sql = "SELECT * FROM music WHERE DJ_no='$_GET[DJ_no]'";
							$run = mysqli_query($conn,$sql);
							while($row=mysqli_fetch_assoc($run)) 
							{ 
								echo " <td>" . $row['DJ_no']. "</td>";
								echo " <td>" . $row['DJ_name']. "</td>";
								echo " <td>" . $row['from']. "</td>";
								echo " <td>" . $row['end.time']. "</td>";
								echo " <td>" . $row['to']. "</td>";
								echo " <td>" . $row['arr.time']. "</td>";
								echo " <td>" . $_GET['date']. "</td>";
							}
						}
						
					?>
				</tr>
			</table>
			
		</div>
		<div> 
			<h1>DJ Audience Details</h1>
			<form action="" method="get">
			<div> 
				<h3> fill the details of the Audience</h3>
				<table> 
				<tr>
					<th>DJ_no</th>
					<th>DJ_name</th>
					<th>from</th>
					<th>to</th>
					<th>class</th>
					<th>date</th>
					</tr>
					<tr> 
						<td> <input type="number" name="train_no" id="DJ_no" ></td>
						<td> <input type="text" name="train_name" id="DJ_name" ></td>
						<td> <input type="text" name="from" id="from" ></td>
						<td><input type="text" name="to" id="to" ></td>
						<td> <input list="class" name="class" >
											<datalist id="class" >
												<option>Platinum</option>
												<option>Gold</option>
													<option>Silver</option>
												<option>2Class</option>
												<option>1Class</option> 
						</td>
						<td> <input type="date" name="date" id="date"></td>						
					</tr>
					
				</table>
			</div>
			<br> <br>
			<table> 
				<tr> 
					
					<th>name</th>
					<th>age</th>
					<th>sex</th>
					<th>seat preference</th>
					<th>VIP</th>
				</tr>
				
				<tr> 
					
					<td> <input type="text" name="name" id="name" ></td>
					<td> <input type="number" name="age" id="age" ></td>
					<td> <input list="sex" name="sex" >
											<datalist id="sex" >
												<option>Male</option>
												<option>female</option> 
												</td>
					<td><input list="bp" name="bp" >
											<datalist id="bp" >
												<option>Front Row</option>
												<option>Back Row</option>
													<option>Middle Row</option>
												<option>Right Side</option>
												<option>Left Side</option>
												</td>
					<td> <input list="sc" name="sc" >
											<datalist id="sc" >
												<option>yes</option>
												<option>no</option></td>
				</tr>
				
			</table>
			<br> 
			<input type="submit" name="submit" value="submit">
			</form>
		</div>
	</body>
</html>