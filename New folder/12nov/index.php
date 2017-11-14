<?php  
include 'db.php';
include 'header.php';
 ?>
 <html> 
	<head> 
		<title>DJ Booking</title>
	</head>
		<style> 
			#form{ 
				border:2px solid grey;
				padding:10px;
			}
		</style>
	<body>
		<div> 
			<h1>Start your Booking from here</h1>
			<h1>book your Show</h1>
			
		</div>
		<div id="form"> 
		
			<form action="search.php" method="get"> 
			
		      <tr>
			   <label for="from">Select your Location</label>
											<input list="from" name="from">
											<datalist id="from" >
												<option>Harayana</option>
												<option>Punjab</option>
												<option>AndhraPradesh</option>
												<option>Telangana</option>
												<option>Gujarat</option>
												<option>Rajasthan</option>
												<option>Kerala</option>
												<option>Goa</option>
												<option>TamilNadu</option>
												<option>Karnataka</option>
												<option>Uttarpradesh</option>
												<option>Madhyapradesh</option>
												<option>Uttarakhand</option>
												<option>Meghalaya</option>
												<option>Manipur</option>
												<option>Nagaland</option>
											</datalist> 
											
											<label for="to">Select your destination</label>
											<input list="to" name="to">
											<datalist id="to" >
												<option>Hyderabad</option>
												<option>Kolkata</option>
												<option>Banglore</option>
												<option>visakhapatnam</option>
												<option>Vijayawada</option>
												<option>Rajahmundry</option>
												<option>Jalandhar</option>
												<option>Madras</option>
												<option>Trivendrum</option>
												<option>Bhopal</option>
												<option>Nagpur</option>
												<option>Chandigarh</option>
												<option>Dehradun</option>
												<option>Manali</option>
												<option>Shimla</option>
												<option>Mumbai</option>
											</datalist>
											
											</tr>
											
												<br> <br> 
			
			<tr> 
				<label for="date">Date</label>
				<input type="date" id="date" name="date">
			</tr>
			
			
			<tr> 
			<label for="class">select class</label>
			<input list="class" name="class">
			<datalist id="class">
				<option >Platinum</option>
				<option >Gold</option>
				<option >Silver</option>
				<option >2Class</option>
				<option >1Class</option>
		    </datalist>
			
			</tr>
			<br> <br> 
			
			<tr> 
				
			
			</tr>
				<br> <br>
			<tr> 
				<input type="submit" name="submit" value="Search">
			</tr>
				
				
		</form>  
		</div>
	</body>
 </html> 
  

