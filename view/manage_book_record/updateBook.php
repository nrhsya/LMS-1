<?php
	$conn = mysqli_connect("localhost", "root", "", "lms_db");
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	$ISBN = $_GET['GetBook'];
	$query = "SELECT * FROM book
				WHERE ISBN='".$ISBN."'";

	$result = mysqli_query($conn, $query);
	
	while($row=mysqli_fetch_assoc($result))
	{
		$ISBN = $row['ISBN'];
		$Book_title = $row['Book_title'];
		$Book_author = $row['Book_author'];
		$Book_desc = $row['Book_desc'];
		$publication_date = $row['publication_date'];
		$totalPages = $row['totalPages'];
		$Book_rating = $row['Book_rating'];
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Book Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
  <style>
	input[type=text], input[type=number], input[type=date]
	{
	  width: 100%;
	  padding: 10px;
	}
	
	table, tr, th, td
	{
		border: 3px solid black;
		border-collapse: collapse;
		padding: 5px;
		text-align: left;
		background: white;
	}
	
	th
	{
		background: #00aea6;
		color: black;
		width: 20%;
	}
	
	td
	{
		width: 80%;
	}
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <h1 class="logo"><a href="../login/librarian.php">Library Management System</a></h1>

          <nav id="navbar" class="navbar">
            <ul>
              <li><a href="../login/librarian.php">Home</a></li>
			  <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="manage_book_record.php">Manage Book Record</a></li>
                  <li><a href="../manage_user/ManageUser.php">Manage User</a></li>
				  <li><a href="../manageFineModule/manageFineModule.php">Manage Fine</a></li>
				  <li><a href="../manage_reservation/managereserv.php">Manage Reservation</a></li>
				  <li><a href="../viewReport/ReportMain.php">Report</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="../login/logout_controller.php?logout">Log Out</a></li>
                </ul>
              </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <section id="hero">
    <div class="hero-container">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/book/book1.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Update Book Details</h2>
                <p class="animate__animated animate__fadeInUp">Please fill in the details below to update details about the book</p>
				
				<!-- form to update details of existing book records -->
				<form action="updateBookController.php?GetISBN=<?php echo $ISBN ?>" method="POST">
				<input type="hidden" name="action" value="update">
					<center>
						<table>
							<tr>
								<th>ISBN</th>
								<td><input type="text" id="ISBN" name="ISBN" value="<?php echo $ISBN ?>" disabled></td>
							</tr>
							
							<tr>
								<th>Book Title</th>
								<td><input type="text" id="Book_title" name="Book_title" value="<?php echo $Book_title ?>"></td>
							</tr>
							
							<tr>
								<th>Book Author</th>
								<td><input type="text" id="Book_author" name="Book_author" value="<?php echo $Book_author ?>"></td>
							</tr>
							
							<tr>
								<th>Book Description</th>
								<td><input type="text" id="Book_desc" name="Book_desc" value="<?php echo $Book_desc ?>"></td>
							</tr>
							
							<tr>
								<th>Book Publication Date</th>
								<td><input type="date" id="publication_date" name="publication_date" value="<?php echo $publication_date ?>"></td>
							</tr>
							
							<tr>
								<th>Number of Pages</th>
								<td><input type=number id="totalPages" name="totalPages" value="<?php echo $totalPages ?>"></td>
							</tr>
							
							<tr>
								<th>Book Rating</th>
								<td><input type=number id="Book_rating" name="Book_rating" value="<?php echo $Book_rating ?>"></td>
							</tr>
						</table><br>
						
						<input type="button" value="Back" onclick="location.href='./BookList.php'">
						<input type="submit" name="Update" value="Update" onclick="updateBook()">
					</center>
				</form>
              </div>
            </div>
          </div>

        </div>

    </div>
  </section>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>LIBRARY MANAGEMENT SYSTEM</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  <!-- Update Book Confirmation -->
  <script>
  function updateBook()
  {
	if (confirm("Please confirm all the details of the book is correct"))
	{
		alert("The book was successfully updated");
	}
	else
	{
		alert("Cancelled");
	}
  }
  </script>

</body>

</html>