<?php
  session_start();
  require("connection.php");
  
  if(isset($_POST['SignUp']))
  {
    $username = strtolower($_POST['fullname']);
    $email = strtolower($_POST['email']);
    $address= $_POST['address'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `tbl_users`(`user_id`, `user_full_name`, `user_address`, `user_email`, `user_pass`, `user_timestamp`) VALUES ('','$username','$address','$email','$password','');";
    if(mysqli_query($conn,$sql))
    {
      
      echo '<script>alert("Created successfully")</script>';
      //header("location:products.php");
    }
    else{
      $_SESSION['error']="Please check email might be taken";
    }

  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signupStyle.css">
  </head>
  <body>
    <header>
        <!-- Navbar code here -->
        <nav>
          <div class="student-shop"><img src="uclan.png" alt="UCLan logo"> Student Shop</div>
          
          <div>
            <!-- <a href="#">Student Shop</a> -->
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="cart.php?id=''">Cart</a>
<?php if($_SESSION['email']=='')
{
  ?>
    <a href="signup.php">Sign Up</a>
  <?php
}
  else{
    ?>
    <a href="logout.php">Logout</a>
  <?php
  }
?>        
     </div>
      </nav>
      </header>
    <h1>Sign Up Page</h1>
    <form action="signup.php" method="post">
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" required >
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required >
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required >
        <span class="error-message" id="password-error"></span>
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" required >
        <span class="error-message" id="confirm-password-error"></span>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <textarea id="address" name="address" required></textarea>
      </div>
      <input type="submit" value="submit" name="SignUp">
    </form>


    <footer>
      <div class="footer-contacts">
        <p>Link</p>
        <a href="students'union.php"> Student's Union</a>
    </div>

    <div class="footer-contacts">
      <p>Contact</p>
      <p>Mail Us<a href="mailto:@uclan.ac.uk">@uclan.ac.uk</a></p>
      <p>Phone <a href="tel:01772893000">01772893000</a></p>
    </div>
    <div class="footer-location">
      <p>Location</p>
      <p>University of Central Lancashire Students' Union </p>
      <p>Fylde Road , Preston.PR1 7BY</p>
      <p>Registered in England</p>
      <p>Company Number:7623917</p>
      <p>Registered Charity Number: 1142616</p>
    </div>
    </footer>

 <!-- <script>
 const form = document.querySelector("form");
 const passwordInput = document.querySelector("#password");
 const confirmPasswordInput = document.querySelector("#confirm-password");
 const passwordError = document.querySelector("#password-error");
 const confirmPasswordError = document.querySelector("#confirm-password-error");

 form.addEventListener("submit", function (event) {
  // Check if any field is empty
  const emptyFields = document.querySelectorAll("input:required:invalid, textarea:required:invalid");
  if (emptyFields.length > 0) {
    event.preventDefault();
    alert("Please fill out all required fields.");
  }

  // Validate password
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
  if (!passwordRegex.test(passwordInput.value)) {
    event.preventDefault();
    passwordError.textContent = "Password must contain at least 8 characters, one uppercase letter, one lowercase letter, and one number.";
  } else {
    passwordError.textContent = "";
  }

  // Confirm password
  if (passwordInput.value !== confirmPasswordInput.value) {
    event.preventDefault();
    confirmPasswordError.textContent = "Passwords do not match.";
  } else {
    confirmPasswordError.textContent = "";
  }
 });

    </script> -->

</html>
