<?php include_once("header.php");
include('hms/include/config.php');

 ?>
 <link rel="stylesheet" href="css/cart.css">

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <center><h1>Menu</h1></center>      
    <center><p>Today's Special</p></center>
  </div>
</div>

<div class="flex-container">
<a href="#row1"><button class="button2">BreakFast</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#row3"><button class="button2">Special Foods</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#row2"><button class="button2">Desert</button></a>
</div>
<!--<marquee direction="left">Hurry up!! Book Your Seat Now</marquee>
<marquee direction="right">Hurry up!! Book Your Seat Now</marquee>-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
         <!-- Topic Cards -->
         
         <div id="cards_landscape_wrap-2">
          <div id="row1">
          <div class="container">
            <h2>BreakFast</h2>
              <div class="row">
                <?php
             $procat='breakfast';
$sql=mysqli_query($con,"select * from product where procat='$procat'");


while($row=mysqli_fetch_array($sql))
{ 
?>

                  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                           <a href="">

                          <div class="card-flyer">
                              <div class="text-box">
                                  <div class="image-box">
                                      <img src="hms/images/<?php echo $row['proimg'];?>" alt="banana bread" />
                                  </div>
                                  <div class="text-container">
                                      <h6><?php echo $row['proname'];?></h6>
                                      <p> Rs. <?php echo $row['proprice'];?></p>
                                      <br>
                                     <form class="form-submit">
                                       <input type="hidden" class="pname" value="<?php echo $row['proname'];?>">
                                        <input type="hidden" class="pprice" value="<?php echo $row['proprice'];?>">
                                        <input type="hidden" class="pimage" value="<?php echo $row['proimg'];?>">
                                        <input type="hidden" class="pcode" value="<?php echo $row['id'];?>">

                                        <button id="addItem" class="btn-success btn button">Add To Cart</button>
                                                                              <div class="alert-message"></div>

                                      </form>
                                    </div>
                              </div>
                          </div>
                      </a>
                  </div>
                <?php } ?>
                  
              </div>
          </div>
      </div>
         </div>

       <!-- Topic Cards2 -->
       <div id="cards_landscape_wrap-2">
        <div id="row2">
        <div class="container">
          <h2>Desert</h2>
            <div class="row">
                      <?php
             $procat='desert';
$sql=mysqli_query($con,"select * from product where procat='$procat'");
if (!empty($sql)) {

while($row=mysqli_fetch_array($sql))
{ 
?>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <a href="">
                        <div class="card-flyer">
                            <div class="text-box">
                                <div class="image-box">
                                     <img src="hms/images/<?php echo $row['proimg'];?>" alt="banana bread" />
                                  </div>
                                  <div class="text-container">
                                      <h6><?php echo $row['proname'];?></h6>
                                      <p> Rs. <?php echo $row['proprice'];?></p>
                                      <br>
                                      <form class="form-submit">
                                       <input type="hidden" class="pname" value="<?php echo $row['proname'];?>">
                                        <input type="hidden" class="pprice" value="<?php echo $row['proprice'];?>">
                                        <input type="hidden" class="pimage" value="<?php echo $row['proimg'];?>">
                                        <input type="hidden" class="pcode" value="<?php echo $row['id'];?>">

                                        <button id="addItem" class="btn-success btn button">Add To Cart</button>
                                                   <div class="alert-message"></div>

                                      </form>
                                    </div>
                              </div>
                        </div>
                    </a>
                </div>
              <?php }}else{
                echo "No Records.";
              } ?>
               
            </div>
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
<?php include_once("footer.php"); ?>