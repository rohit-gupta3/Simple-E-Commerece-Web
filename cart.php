<?php
  session_start();
  require("connection.php");
  if($_GET['id'] !='')
  {
    $_SESSION['id'] =$_GET['id'];
  }
  
  $id = $_SESSION['id'];
  
  $result=0;
  if(isset($_POST['login']))
  {
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $sql = "SELECT * FROM tbl_users WHERE user_email='$email' and user_pass='$password';";
    $row=mysqli_query($conn,$sql);
    $result =mysqli_num_rows($row);
    if($result ==1)
    {
      echo '<script>alert("Successfully logged in")</script>';
      $_SESSION['email']=$email;
    }
    else{
      $_SESSION['error']="Your email or password is invalid";
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>UCLan Student Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cartStyle.css">
    <script src="script.js"></script>
  </head>
  <body>
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
    <header>

        <h2>Cart</h2>
        <?php
        if($_SESSION['removed']=='removed')
        {
          echo '<h3 style="color:red;">Your Order is removed !</h3>';
        }
        else if($_SESSION['bought']=='placed' && $_SESSION['email']!='')
        {
          echo '<h3 style="color:green;">Your Order is placed successfully !</h3>';
        }
        else if($_SESSION['email']==''){
          echo '<h3 style="color:red;">Please first login !</h3>';
        }
        if($id !='')
        {
          $sql ="SELECT * FROM tbl_products WHERE product_id='$id';";
          $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_assoc($result))
          {
            ?>
        <div class="shopping-cart-container">
          <div class="shopping-cart">
            <div class="item">
              <a href="#">
                <img src="<?php echo $row['product_image'];?> " alt="Purple UCLan Hoodie">
              </a>
              <div class="product-info">
                <h3 class="product-name"><?php echo $row['product_title'];?> <span class="product-price"><?php echo $row['product_price'];?> </span><a href ='remove.php'><button class="remove-button">Remove</button></a>
                <?php
                if($_SESSION['email']!='')
                {?>
                <a href ='buy.php'><button class="buy-button">BUY</button></h3></a>
                <?php
                }
                
          }
        }
        else{
          echo "<h3>Your cart is empty right now</h3>";
        }
        ?>
                
              </div>
            </div>
          </div>
        </div>
        <?php
        if($_SESSION['email']=='')
        {
          
        ?>
        <form action="?" class="login-form" method="post">
          <p style="color:red;"><?php echo $_SESSION['error']; ?></p>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        
          <input type="submit" value="Submit" name='login'>
        </form> 
        <?php
        }
        ?>       
        
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
