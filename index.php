<?php
    include 'template/header.php';
    session_start();
?>

<div class="container">
    <div class="row">
   
        <h1 class="text-center text-light text-uppercase bg-primary">
            Srarch Location By email
        </h1>   
        <div class="col-lg-5 mx-auto">
				<h1 class="text-uppercase text-center text-danger py-3">Search Form</h1>
			<form>
			<div class="mb-3">
				<label for="emailinput">Email adress</label>
				<input type="email" class="form-control" id="emailinput" aria-describedby="emailHelp" name="email" required autocomplete="off">
			</div>
			
			<button type="submit" class="btn btn-primary d-block mx-auto"  id="sub">Search</button>
			
		</form>
			</div>
    </div>
    <div class="row my-3">
        <div class="container">
        <table class=" table table-hover">
            <thead>
                <th>Street</th>
                <th>Suite</th>
                <th>City</th>
                <th>Zipcode</th>
               
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>
        </div>
        <div class="container">
            
        </div>
      
    </div>
</div>
<script>
		//session handle//
        let msg = "<?php
               echo $_SESSION['msg'];
                ?>";
                console.error(msg);

        //
		
		$('#sub').click(function(e){
				e.preventDefault();
				const data ={
				email :$('#emailinput').val(),
				
				}
				
				const json = JSON.stringify(data);
				const xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function(){
					if(xhr.readyState==4){
						if(xhr.status==200){
							let res = xhr.responseText;
							
							let response = null;
							try{
								response = JSON.parse(res);
								printtable(response);
							}catch(e){
								console.error("Data not found");


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
        function printtable(res){
            let tbody = document.getElementById("tbody");
            while(tbody.firstChild){
                tbody.removeChild(tbody.firstChild);
            }
            const tr = document.createElement("tr");
            let rest = JSON.parse(res[0]['address']);
            
           let td = document.createElement('td');
            td.textContent = rest['street'];
            tr.append(td);
            td = document.createElement('td');
            td.textContent = rest['suite'];
            tr.append(td);
             td = document.createElement('td');
            td.textContent = rest['city'];
            tr.append(td);
             td = document.createElement('td');
            td.textContent = rest['zipcode'];
            tr.append(td);
            tbody.append(tr);
         
            
            const lat =rest['geo']['lat'];
            const lng = rest['geo']['lng'];
            
            


        }
	</script>

<?php
    include 'template/footer.php';
?>