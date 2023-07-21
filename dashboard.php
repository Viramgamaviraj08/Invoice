<html>
<head>
	<title>Dashboard</title>
    <script>
        const logoutBtn = document.querySelector('.logout-btn');

logoutBtn.addEventListener('click', () => {
	// Code to log out the user
	//window.location.href = 'login.html';
});
        </script>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h1>Dashboard</h1>
			<!-- <button class="logout-btn">Logout</button> -->
		</div>
		<div class="cards-container">
			<div class="card admin">
				<h2>Manage Customer Detail</h2>
				<!-- <a href="admin_display.php"><button class="access-btn">Admin Display</button></a> -->
			</div>
			<div class="card faculty">
				<h2>Invoice</h2>
				<!-- <a href="faculty_display.php"><button class="access-btn">Faculty Display</button></a> -->
			</div>
			<div class="card student">
				<h2>Bill</h2>
				<!-- <a href="student_display.php"><button class="access-btn">Student Display</button></a> -->
			</div>
			<!-- /<div class="card subject"> -->
				<!-- <h2>Uploaded by Subject</h2> -->
				<!-- <a href="subject_display.php"><button class="access-btn">Subject Display</button></a> -->
			</div>
			<!-- <div class="card class">
				<h2>Uploaded by Class</h2> -->
				<!-- <a href="class_display.php"><button class="access-btn">Class Display</button></a> -->
			</div>
		</div>
	</div>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>