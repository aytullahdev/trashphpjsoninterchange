<?php 
 include ('template/header.php')
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-5 mx-auto">
				<h1 class="text-uppercase text-center text-danger py-3">Login Form</h1>
			<form>
			<div class="mb-3">
				<label for="emailinput">Email adress</label>
				<input type="email" class="form-control" id="emailinput" aria-describedby="emailHelp" name="email" required autocomplete="off">
			</div>
			<div class="mb-3">
				<label for="pwdinput">Password</label>
				<input type="password" class="form-control" id="pwdinput" name="pwd" required>
			</div>
			<button type="submit" class="btn btn-primary"  id="sub">Log in</button>
			<a href="registration.php" class="link-danger text-decoration-none ps-4">Create a new account</a>
		</form>
			</div>
		</div>
		
	</div>
	<script>
		
		
		$('#sub').click(function(e){
				e.preventDefault();
				const data ={
				name :$('#emailinput').val(),
				age : $('#pwdinput').val()
				}
				console.log(data);
				const json = JSON.stringify(data);
				const xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function(){
					if(xhr.readyState==4){
						if(xhr.status==200){
							let res = xhr.responseText;
							
							let response = null;
							try{
								response = JSON.parse(res);
								console.log(response);
							}catch(e){
								console.log(e);


							}
						}else{
							console.log(xhr.status);
						}
					}
				}
		xhr.open('POST','recive.php');
		xhr.setRequestHeader('content-Type','appliction/json');
		xhr.send(json);
		
		});
	</script>

<?php 
 include ('template/footer.php')
?>