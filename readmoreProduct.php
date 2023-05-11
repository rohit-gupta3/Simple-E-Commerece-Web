<?php
  
  session_start();
  require("connection.php");
  $id=$_GET['id'];
  #$name ="JEEBAN";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Product Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="readmoreStyles.css">
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
              <a href="signup.php">Sign Up</a>
            </div>
      </nav>
      </header>

    <h1>Product Details</h1>
    <?php
      $sql = "SELECT * FROM tbl_products WHERE product_id='$id';";
      $result =mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result))
      {
      ?>
      <div class="product-details">
        <img class="product-image" src="<?php echo $row['product_image'];?>" alt="Product image" width="50px" height="50px">
        <div class="product-description">
          <h2><?php echo $row['product_title']; ?></h2>
          <p><?php echo $row['product_desc']; ?></p>
          <p><b>Price:</b> <?php echo $row['product_price']; ?></p>
          <a href="cart.php?id=<?php echo $row['product_id']; ?>"><button class="buy-button">Buy Now</button></a>
        </div>
      <?php
      }

    ?>

      <div class="product-review">
      <h3>Customer Reviews</h3>
      <?php
        $sql = "SELECT * from tbl_review WHERE product_id='$id';";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result))
        {
          ?>
        <div class="review">
          <div class="review-header">
            <h4><?php echo $row['name']; ?>(<span class="Rated-Star"><?php echo $row['rating']; ?></span>)</h4>
            
          </div>
          <div class="review-body">
            <p><?php echo $row['description']; ?></p>
            
          </div>
        <?php
        }
      ?>
    </div>
      <!-- more reviews can be added here -->
      <?php
          if(isset($_POST['review']))
          {
            $username = strtoupper($_POST['username']);
            $id=$_POST['id'];
            $description= $_POST['description'];
            $rating = $_POST['rating'];
            $sql = "INSERT INTO `tbl_review`(`product_id`, `name`, `description`, `rating`) VALUES ('$id','$username','$description','$rating');";
            if(mysqli_query($conn,$sql))
            {
              header("location:products.php");
            }
            else{
              $_SESSION['error']="Please check email might be taken";
            }
          }
      ?>
      <form action="?" method="post">
      <!-- review section -->
      <tr>
        <td><label >Product Id:</label></td>
        <td><input type="text" name="id" value="<?php echo $id; ?>" disabled="disabled"></td>
      </tr>
      <tr>
        <td><label >Customer Name</label></td>
        <td><input type="text" name="username"><br></td>
      </tr>
        
        
        
        <label for="review">Write a Review:</label>
        <textarea id="review" name="description" rows="4" cols="50"></textarea><br>
        
        <label >Rating</label>
        <input type="number" name="rating" min="1" max="5"><br>
        <input type="submit" value="Submit" name="review">
      </form>
      
    </div>
    </div>
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
  </body>

</html>
