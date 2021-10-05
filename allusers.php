<?php
    include 'template/header.php';
?>

<div class="container">
    <div class="row my-3">
        <div class="container">
         <input type="text" class="" placeholder="Type for search" id="myInput">
        <table class=" table table-striped caption-top" id="myTable">
        <caption class="text-uppercase text-danger">User information</caption>    
        
        <thead>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
               
            </thead>
            <tbody id="tbody" >

            </tbody>
        </table>
        </div>
        <div class="container">
            
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div id="smsg">
                            
                    </div>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="uname">User Name</label>
                        <input type="text" class="form-control" id="uname">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control"  id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="website">Website</label>
                        <input type="url" class="form-control" id="website">
                    </div>
                    <div class="mb-3">
                        <input type="button" class="btn btn-primary mx-auto" id="update" value="Update">
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>
<script>
        let td;
		$(function(){

            // update the fieled;
           
            $('#update').click(function(){
                let udata = {
                name: $("#name").val(),
                uname: $("#uname").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                web: $("#website").val()

                
            }
            const json = JSON.stringify(udata);
				const xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function(){
					if(xhr.readyState==4){
						if(xhr.status==200){
							let res = xhr.responseText;
							
							let response = null;
							try{
								response = JSON.parse(res);
                                let ap = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                
  <strong> ${ response['msg'] }</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>`
                                document.getElementById("smsg").innerHTML=ap;
							}catch(e){
								console.error(e);


							}
						}else{
							console.log(xhr.status);
						}
					}
				}
		xhr.open('POST','api/updateuser.php');
		xhr.setRequestHeader('content-Type','appliction/json');
		xhr.send(json);
            });
           $(document.body).on("click","#tbody tr",function(){
               td =this.cells;
                document.getElementById("name").value = td[0].innerHTML;
                document.getElementById("uname").value = td[1].innerHTML;
                document.getElementById("email").value = td[2].innerHTML;
                document.getElementById("phone").value = td[3].innerHTML;
                document.getElementById("website").value = td[4].getElementsByTagName('a')[0].href.slice(8,-1);
           });
            //
            updatetableandgetdata();
            var  x= setInterval(function(){
                updatetableandgetdata();
            },1000);
            $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    if(value.length==0){
        x= setInterval(function(){
                updatetableandgetdata();
            },1000);
    }else{
        clearInterval(x);
        $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    }
  
  });
       
        });
	
       
        function updatetableandgetdata(){
            //update table
            function printtable(res){
            let tbody = document.getElementById("tbody");
            while(tbody.firstChild){
                tbody.removeChild(tbody.firstChild);
            }
            for(let v in res){
                let tr = document.createElement("tr");
                let td = document.createElement('td');
                td.textContent = res[v].name;
                tr.append(td);
                td = document.createElement('td');
                td.textContent = res[v].username;
                tr.append(td);
                td = document.createElement('td');
                td.textContent = res[v].email;
                tr.append(td);
                td = document.createElement('td');
                td.textContent = res[v].phone;
                tr.append(td);
                td = document.createElement('td');
                let a = document.createElement('a');
                a.href = "https://www."+ res[v].website;
                a.textContent = res[v].website;
                a.target="_blank";
                
                td.append(a);
                tr.append(td);
                tbody.append(tr);

            }

        }
        // get and recive data
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
								console.error(e);


							}
						}else{
							console.log(xhr.status);
						}
					}
				}
		xhr.open('POST','api/getalluser.php');
		xhr.setRequestHeader('content-Type','appliction/json');
		xhr.send(json);

        }
	</script>

<?php
    include 'template/footer.php';
?>