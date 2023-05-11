<?php
  session_start();
  $_SESSION['bought']='';
  $_SESSION['removed']='';
  require("connection.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>My Company - Products</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="productStyle.css">
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
    <main>
    <section class="products-section">
      <?php
        $sql = "SELECT * FROM tbl_products";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
          ?>
        
        <div class="product-card">
          <img src="<?php echo $row['product_image'];?>" alt="Product image" width="300px" height="500px">
          <h3><?php echo $row['product_title'];?></h3>
          <p><?php echo $row['product_desc'] ;?><a href="readmoreProduct.php?id=<?php echo $row['product_id'];?>">read more</a></p>
          <p><b><?php echo $row['product_price'];?></b></p>
          <span><a href="cart.php?id=<?php echo $row['product_id']; ?>"><button>Buy</button></span></a>
        </div>
          <?php
        }
      ?>
        <!-- More product cards here -->
      </section>
    </main>
    <footer>
      <!-- Footer code here -->
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
