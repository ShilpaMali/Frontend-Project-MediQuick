

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<form  method="POST" enctype="multipart/form-data" id="contactform">
		<div class="row">

							<div class="form-group col-6">				  

					    		<input type="text" class="form-control" id="name" name="name" placeholder="Name *" onkeyup="document.getElementById('nameErr').innerHTML=''" required>

									<label class="text-danger " id="nameErr"></label>

					  		</div>

					  		<div class="form-group col-6">				  

					    		<input type="text" class="form-control" id="email" name="email" placeholder="Your Email *" onkeyup="document.getElementById('emailErr').innerHTML=''" required>				   

								<label class="text-danger" id="emailErr"></label>

					  		</div>

					  		<div class="form-group col-6">				  

					    		<input type="number" class="form-control" id="phone" name="phone" placeholder="Mobile Number *" onkeyup="document.getElementById('phoneErr').innerHTML=''" required>				   

								<label class="text-danger" id="phoneErr"></label>

					  		</div>
					  		<div class="form-group col-6">				  

					    		<input type="text" class="form-control" id="subject" name="subject" placeholder="Your subject *" onkeyup="document.getElementById('subjectErr').innerHTML=''" required>				   

								<label class="text-danger" id="subjectErr"></label>

					  		</div>

					  		<div class="form-group col-12">				  

							   <textarea id="message" name="message" class="form-control" rows="3" placeholder="Your Message *" onkeyup="document.getElementById('messageErr').innerHTML=''" required="required"></textarea>	   

							   <label class="text-danger" id="messageErr"></label>

							  </div>
							</div>
<div class="submit">
      <p class="btnform">
 
 
							  <button type="submit" id="btnSubmit" class=" more_btn button">Send Message</button>
</p>
    </div>


					<div id="mail-status"></div>

						</form>


<script>

 $(document).ready(function () {

		$("#btnSubmit").click(function (event) {

			event.preventDefault();

			  var data = new FormData($('#contactform')[0]);

			  if($('#name').val().trim()==''){

				 document.getElementById("nameErr").innerHTML = "Please provide Name";

				 document.getElementById("name").focus();

				 return;

			  }

			  if($('#email').val().trim()==''){

				 document.getElementById("emailErr").innerHTML = "Please provide Email";

				 document.getElementById("email").focus();

				 return;

			  }

			  if($('#phone').val().trim()==''){

				 document.getElementById("phoneErr").innerHTML = "Please provide Mobile Number";

				 document.getElementById("phone").focus();

				 return;

			  }
			   if($('#subject').val().trim()==''){

				 document.getElementById("subjectErr").innerHTML = "Please provide subject";

				 document.getElementById("subject").focus();

				 return;

			  }

			  if($('#message').val().trim()==''){

				 document.getElementById("messageErr").innerHTML = "Please provide Message";

				 document.getElementById("message").focus();

				 return;

			  }

			  $("#btnSubmit").prop("disabled", true);

			  

   

    //alert(dataString);

     //var form = $(this);

			  $.ajax({

            type: "POST",

            url: "send_email.php",

            data: data,

            processData: false,

				contentType: false,

				cache: false,

				success: function(data) { 
 console.log(data);
               $("#mail-status").removeClass('text-danger');

						$("#mail-status").addClass('text-success');

						$("#mail-status").html("We have received your enquiry successfully!");

						$("#btnSubmit").prop("disabled", false);

						$('#name').val('');

						$('#email').val('');

						$('#phone').val('');
						$('#subject').val('');

						$('#message').val('');

            },

            error: function(error){

                $("#mail-status").removeClass('text-success');

						$("#mail-status").addClass('text-danger');

						$("#mail-status").html("Something went wrong..Please try again!");

            }  

        });

	});

      });

    </script>

   
