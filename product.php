<?php include_once('header.php');
 include('hms/include/config.php');
  ?>
  <link rel="stylesheet" href="css/product.css">
    <div id="Products" class="products">
        <div class="container">
         <h1>Products</h1>
         <div class="row">
         <?php
            // $procat='breakfast';
$sql=mysqli_query($con,"select * from product");


while($row=mysqli_fetch_array($sql))
{ 
?>
            <div class="col-md-4" id="Products">
              <div class="product">
                <h4><?php echo $row['proname'];?></h4><br>
                <img src="hms/images/<?php echo $row['proimg'];?>" alt=" " ><br><br>
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
<?php }?>
            
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
    <?php include_once('footer.php');
  ?>