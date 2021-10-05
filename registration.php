<?php 
 include ('template/header.php')
?>

<div class="container">
		<div class="row">
			<div class="col-lg-5 mx-auto">
				<h3 class="text-uppercase text-center text-danger py-3">Create a new Account</h3>
			<form action="" method="post">
            <div class="mb-3">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username" required >
            </div>
			<div class="mb-3">
				<label for="emailinput">Email adress</label>
				<input type="email" class="form-control" id="emailinput" aria-describedby="emailHelp" name="email" required >
			</div>
			<div class="mb-3">
				<label for="pwdinput">Password</label>
				<input type="password" class="form-control" id="pwdinput" name="pwd" required>
			</div>
            <div class="mb-3 ">
				<label for="cpwdinput">Conform Password</label>
                <div class="input-group">
                <input type="password" class="form-control " id="cpwdinput" name="cpwd" required>
                <div class="input-group-append " >
                    <i class="fas fa-eye-slash input-group-text" style="border-radius:2px 0px;padding:0.65rem 0.7rem; cursor:pointer; " id="shopwd"></i>
                 </div>

                </div>
				
                <div class="msg text-center text-danger">
                   
                </div>
			</div>
            
			<button type="submit" class="btn btn-primary sbtn ">Create</button>
			<a href="login.php" class="link-danger text-decoration-none ps-4">Alrady have an account?</a>
		</form>
			</div>
		</div>
		
	</div>
    <style>
        .sbtn{
            display:inline-block;
        }
    </style>

 <script>
   
   function checkinp(){
       
     if($('#pwdinput').val()==$('#cpwdinput').val()){
        $('#cpwdinput').removeClass(' border-danger shadow-none')
        $('.msg').html('');
        $('.sbtn').show(10);
      
      
     }else{
        $('#cpwdinput').addClass(' border-danger shadow-none')
        $('.msg').html("Not matched").addClass('bg-light');
        
        $('.sbtn').hide(10);
     }
    
    }   
 $('#cpwdinput').keyup(checkinp);
  
 let i=0;
 $('#shopwd').click(function(){
   
    i++;
    if(i%2==1){
        $('#shopwd').removeClass('fa-eye-slash');
        $('#shopwd').addClass('fa-eye');
        $('#pwdinput').attr('type',"text");
        $('#cpwdinput').attr('type',"text");
    }else{
        $('#shopwd').removeClass('fa-eye');
        $('#shopwd').addClass('fa-eye-slash');
        $('#pwdinput').attr('type',"password");
        $('#cpwdinput').attr('type',"password");
    }
    
 })


 </script>
 <?php 
 include ('template/footer.php')
?>