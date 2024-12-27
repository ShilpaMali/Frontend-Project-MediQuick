 <?php include_once('header.php');
 include('hms/include/config.php');

  ?>
  <div class="main-slider">
    <div class="slider" id="slider">
      <div>
       <div class="slider-img">
         <img src="img/img8.jpg" height="800" width="1200">	
         <div class="slider-text">
            <div class="container" id="slide">	
              <div class="col-md-8 textside position-relative">
                <div class="content text-center">
                  <h1 class="mb-0 ">Welcome to MediQuick</h1>
                  <h5 class="mb-0 ">We are thrilled to have you with us. Get ready for a memorable time and a great experience.</h5>
                  <a class="more_btn " href="#index.php">Buy Now</a>
                </div>
              </div>   		
            </div>                
          </div>	
        </div>	<!-- img -->
      </div><!-- slider -->
      <div>
        <div class="slider-img ">
          <img src="img/img10.jpg"height="800" width="1200">	
          <div class="slider-text">
            <div class="container" id="slide">	
              <div class="col-md-8 textside position-relative">
                <div class="content text-center">
                  <h1 class="mb-0 ">Welcome to MediQuick</h1>
                  <h5 class="mb-0 ">We are thrilled to have you with us. Get ready for a memorable time and a great experience.</h5>
                  <a class="more_btn" href="#index.php">Buy Now</a>
                </div>
              </div>
            </div>               
          </div>	
        </div>	
      </div>
      <div>
       <div class="slider-img ">
          <img src="img/img6.jpg"height="800" width="1200">	
          <div class="slider-text">
            <div class="container" id="slide">	
              <div class="col-md-8 textside position-relative">
                <div class="content text-center">
                  <h1 class="mb-0">Welcome to MediQuick</h1>
                  <h5 class="mb-0">We are thrilled to have you with us. Get ready for a memorable time and a great experience.</h5>
                  <a class="more_btn" href="#index.php">Buy Now</a>
                </div>
              </div>               
            </div>                
          </div>	
        </div>	
      </div>     
      <div>
        <div class="slider-img ">
          <img src="img/img14.jpg" height="800" width="1200">	
          <div class="slider-text">
            <div class="container" id="slide">	
              <div class="col-md-8 textside position-relative">
                <div class="content text-center">
                  <h1 class="mb-0">Welcome to MediQuick</h1>
                  <h5 class="mb-0">We are thrilled to have you with us. Get ready for a memorable time and a great experience.</h5>
                  <a class="more_btn" href="#index.php">Buy Now</a>
                </div>
              </div>               
            </div>               
          </div>	
        </div>	
      </div>
    </div> 
  </div>
  <div id="about" class="about">
    <div class="container">
      <div class="section-title" data-aos="zoom-out">
       <h1>About Us</h1>
      </div>
      <div class="row content" data-aos="fade-up">
        <div class="col-lg-6">
          <img src="img/img4.webp" height="400" width="500">
        </div>
          <div class="col-lg-6">          
            <p>we are dedicated to providing top-quality pharmaceutical care and services to our community.
            Our mission is to promote health and wellness by offering a comprehensive range of prescription medications, over-the-counter products, and pharmaceutical services.
            <br>At<span> MediQuick</span>, we are more than just a pharmacy, we are your partners in health. Thank you for choosing us for all your pharmaceutical needs.</span>
            </p>
            <a class="more_btn" href="#index.php">Learn More</a>
          </div>
        </div>
      </div>
    </div>

<!--Product Section-->

  <br>
  <div id="Products" class="capsule">
    <div class="container">
     <h1>Products</h1><br>
     <div class="row">
     <?php
            // $procat='breakfast';
$sql=mysqli_query($con,"select * from product LIMIT 3");


while($row=mysqli_fetch_array($sql))
{ 
?>
        <div class="col-md-4">
          <div class="product">
            <h4><?php echo $row['proname'];?></h4><br>
            <img src="hms/images/<?php echo $row['proimg'];?>" height="150px" width="150px" alt="Product 2" ><br><br>
            <p><?php echo $row['prodesc'];?>
            </p>
            <h3>$ <?php echo $row['proprice'];?></h3>
            <form class="form-submit">
                                       <input type="hidden" class="pname" value="<?php echo $row['proname'];?>">
                                        <input type="hidden" class="pprice" value="<?php echo $row['proprice'];?>">
                                        <input type="hidden" class="pimage" value="<?php echo $row['proimg'];?>">
                                        <input type="hidden" class="pcode" value="<?php echo $row['id'];?>">

                                        <button id="addItem" class=" more_btn btn-success btn button">Add To Cart</button>
                                                                              <div class="alert-message"></div>

                                      </form>
          </div>
        </div>
<?php 
}
 ?>
      </div>
    </div>
  </div>
  <script>
  $(document).ready(function(){
 $(document).on('click','#addItem',function(e){
e.preventDefault();
var form=$(this).closest(".form-submit");
var pcode=form.find('.pcode').val();
var pname=form.find('.pname').val();
var pimage=form.find('.pimage').val();

var pprice=form.find('.pprice').val();
//var $this = $(this);
var alertmsg=form.find('.alert-message');
$.ajax({
url:'action.php',
method:'post',
data:{pcode:pcode,pname:pname,pimage:pimage,pprice:pprice},
success:function(response){
  console.log(response);
  alertmsg.html(response);

  // $this.closest('.alert-message').html(response)
  //$(this).closest('.alert-message').html(response);
 //alertmsg.html(response);
  //window.scrollto(0,0);
  load_cart_item_number();
}
});

 });

  load_cart_item_number();
function load_cart_item_number(){
  $.ajax({
url:'action.php',
method:'get',
data:{cartItem:"cart_item"},
success:function(response){

  $("#cart-item").html(response);
  
}
});
}

  });
 
</script>
  <?php include_once('footer.php');
  ?>
  