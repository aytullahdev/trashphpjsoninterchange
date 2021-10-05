<?php include('template/header.php');
 session_start();


?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 mx-auto py-5">
            <div class="mb-3 fs-5 text-center text-danger" id="msg">
                
            </div>
        <div class="mb-3">
				<h1 class="text-center text-muted h4">ENTER YOUR OTP</h1>
				<input type="text" valu="" class="form-control" id="otpinput" name="otp" required autocomplete="off" minlength="6" maxlength="6" title="Enter the 6 digit" placeholder="Enter your otp">
               
		</div>
        <div class="my-2 text-center" id="timer">
               
        </div>
            
        </div>
    </div>
</div>
<script>
$(function(){
     
      let msg = $("#msg");
      let otpinput = $("#otpinput");
      console.log(msg);
      otpinput.keyup(function(){
           let otp = otpinput.val();
           if(otp.length==6){
                console.log(otp);
           }
      });
      //timer
   
// Set the date we're counting down to
var countDownDate = new Date().getTime();
var countDownDate = new Date(countDownDate+0.1*60000);

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="timer"
//   document.getElementById("timer").innerHTML = days + "d " + hours + "h "
//   + minutes + "m " + seconds + "s ";
document.getElementById("timer").innerHTML =minutes + "m " + seconds + "s "+" Left";


  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
    document.getElementById("timer").style.color="red";
    location.href="index.php";
    <?php $_SESSION['msg']="101";?>
    
  }
}, 1000);

});

</script>






<?php include('template/footer.php')
?>