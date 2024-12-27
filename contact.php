<?php include_once('header.php'); ?>
<link rel="stylesheet" href="css/product.css">
<form method="POST" enctype="multipart/form-data" id="contactform">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="product">
          <img src="img/map.png" height="500px" width="100%" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="product" id="products">
          <div class="wrapper">
            <h2>Contact Info</h2>
            <div class="input box">
              <input type="text" class="form-control" id="name" name='name' placeholder="Enter your name*" required>
              <label class="text-danger" id="nameErr"></label>
            </div>
            <div class="input box">
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email*" required>
              <label class="text-danger" id="emailErr"></label>
            </div>
            <div class="input box">
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your Contact No.*" required>
              <label class="text-danger" id="phoneErr"></label>
            </div>
            <div class="input box">
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject*" required>
              <label class="text-danger" id="subjectErr"></label>
            </div>
            <div class="input box">
              <textarea class="form-control" id="message" name="message" placeholder="Write your query*" required></textarea>
              <label class="text-danger" id="messageErr"></label>
            </div>
            <input type="submit" class="btn" id="btnSubmit">
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<?php include_once('footer.php'); ?>
