<?php
  session_start();
  $_SESSION['error']='';
  $_SESSION['email']='';
  $_SESSION['id']='';
  $_SESSION['bought']='';
  $_SESSION['removed']='';
  require("connection.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>UCLan Student Shop</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>
  <body>
    <nav>
      <div class="student-shop"><img src="uclan.png" alt="UCLan logo" > Student Shop</div>
      
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
    <header>
        <header>
        <span><h2>Offers</h2></span>
            <div class="offer-container" style="background-color:yellow;">
            <?php
          
                $query = "SELECT * FROM tbl_offers LIMIT 3";
                $result = mysqli_query($conn, $query);
          
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<div class="offer">';
                  echo '<h3>'.$row['offer_title'].'</h3>';
                  echo '<p>'.$row['offer_dec'].'</p>';
                  echo '</div>';
                }
          
              ?>
            </div>
            <div class="success-message">
              <h2>Where Opportunity Meets Success</h2>
              <p class="join-message">Together</p>
              <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID" title="Video"></iframe>
              </div>
              <p class="join-message">Join Our Community</p>
              <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Zadp1zSMxns" title="Video"></iframe>
              </div>
            </div>
          </header>
          
          
    </header>
    <footer>
        <!-- <div class="footer-links">
            <p>Link</p><br>
            <a href="students'union.php"> Student's Union</a>
            
          </div> -->

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
      
  </body>
</html>
