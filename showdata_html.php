
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --> 
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 	   -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script> -->
<!-- <script src="http://code.jquery.com/jquery-1.11.1.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<!-- <script type="text/javascript" src="form_validation.js"></script>
 --><!-- <script src="http://multidatespickr.sourceforge.net/jquery-ui.multidatespicker.js"/> -->

<?php include("establish.php");


//ESTABLISH.PHP   IS  USED FOR LINKING AND SPECIALLY CODE REUSABILITY//

$get_data = "SELECT  id,name,age,dob FROM users limit 10 offset 0";
$results = mysqli_query($conn,$get_data);

echo"<h1 style='text-align:center'>Users</h1>";
echo "<button class='btn btn-success'  id='NEWUSER'  onclick=newForm(); >Newuser</button>";

// <th style='txt-align:center'>ID</th>
 echo"<table id='mytable' align ='center'  border='2' cellpadding=1 width='70%'>

<tr>
<th >s.no</th>

<th style='text-align:center'>Name</th>
<th style='text-align:center'>Age</th>
<th style='text-align:center'>DOB</th>
<th style='text-align:center'>View</th>
<th style='text-align:center'>Delete</th>

</tr>";


// search filters for columns //
//sending the  column name in database as parameters to function filterData()//
 // min='0' step='1' in type=number to make sure there is no negative value.
echo "
<tr>
<th> </th>
<th><input type='text'   id='my_name'  placeholder= 'search' onkeyup=filterData('name')></th>
<th><input type='number' min='0' step='1' id='my_age'   placeholder= 'search' onkeyup=filterData('age');></th>
<th><input  id='my_dob'   placeholder=  'dob' onchange=filterData('dob')  onkeyup=filterData('dob');></th>
</tr>
<tbody id='table_body'>";
$counter=1;
while($row=mysqli_fetch_assoc($results))
{
	// changing date format from y-m-d to d-m-y//
$temp=strtotime($row['dob']);
$newdate =date('d-m-Y', $temp);
	     		
echo "<tr id='table_row".$row['id']."'>";

echo "<td >".$counter."</td>";
// echo "<td style=' text-align : center'>".$row['id'] ."</td>";
echo "<td style=' text-align : center'>".$row['name']." </td>";
echo "<td style=' text-align : center'>" .$row['age']."</td>";
echo "<td style=' text-align : center'>".$newdate."</td>";
//adding icons for view and delete
echo "<td style=' text-align:center'><button  class='btn btn-default' id='editusers' name='view' onclick= editUsers(".$row['id'].");><i class='fa fa-eye'></i></button></td>";
// $row_id="table_row".$row['id'];
echo "<td style=' text-align:center'><button  class='btn btn-default' id='deleteusers' name='delete' onclick=deleteUser(".$row['id'].",'table_row".$row['id']."');><i class='fa fa-trash'></i></button></td>";

$counter++;
}

// <i class='fas fa-trash'></i>
//,\"table_row\".$row['id']
echo "</tbody>";	 

echo "</table>";


mysqli_close($conn);


?>
<!-- table styles in PHP table -->

<style >
	#NEWUSER{

		float:right;
		margin-bottom:20px;
		margin-right: 30px;

	}
	#mytable{
		margin-top: 67px;
	}
</style>

<html lang="en">
<head>
  <title>CRUD operations using ajax calls.</title>
  <style type="text/css">
  		#myModal{
  			position: fixed;
  			width: 100%;
  			bottom:30%;
  			display:none;
  		}
  	.modal-content {
	  		margin-top: 30px;
	  		margin-left: 265px;
	    	max-width: 642px;
	    	display: flex;
	    	flex-direction: column;
	    	background-color: #fff;
	    	background-clip: padding-box;

	    	border: 1px solid rgba(0,0,0,.2);
	    	border-radius: .3rem;
	        outline:0;
        }
        .modal-header{
       	
        	
        	text-align: center;
        	padding-top: 1px;
        	padding-right: 1px;
        	padding-bottom: 1px;
        	padding-left: 1px;
        	border-top-left-radius: .3rem;
    		border-top-right-radius: .3rem;
        }
    	.modalbody{
    		padding-top: 10px;
    	}
    	.modal-header{
    		background-color: lightgrey;
    	}
    	.paginate{
    		padding-top: 20px;
    		padding-right: 20px;
    		float: right;
    	}

    	#label1
    	{	
    		padding-left: 40px;
    		padding-right: 35px;
    	}
    	#label2
    	{
    		padding-left: 40px;
    		padding-right:25px;
    	}
        #label3
        {	padding-left: 40PX;
        	padding-right: 40px;
        }
        #label4{
        	padding-left: 40PX;
        	padding-right: 35px;
        }
        #label5{
        	padding-left: 40PX;
        	padding-right: 2px;
       
        }
        #myModal1{
        	position: fixed;
           bottom:30% ;
           display: none;
        }

        /*button for new form generation*/
        #newForm{
        	
        	padding-top: 20PX;
        	/*display: none;
*/
        }
        #create_form{
        	margin-left:  500px;
        }
        #button_paging{
        	width:50%;
        	margin-bottom: 10px;

        }

   
        #pagination{
        	position:relative;
        	margin-left:5px;


        }
        /*#logoutbutton{
        	width:50%;
        	margin-top: 80px;
        	float:right;
        }
*/
        #logout{
        	float:right;
        
		margin-left:10px;
		/*width:50%;*
        	}

        
</style>



<!-- MODAL TO DISPLAY FORM on click of View  -->

		<div class="modal-content"  id="myModal" >
		    <div class="modal-header">
		        <h4  style='text-align:center' class="modal-title">Edit user</h4>
		    	<button type="button" class="close" data-dismiss="modal"
		    	 onclick="Closed()" >&times;</button>
		    </div>

		<!-- <div  class ="modalbody"  id='myrow' > -->
			<form   method='POST'id='myform'>
				<!-- <label id="label1">ID </label>   -->
				<input type='hidden' id='id' name='id'><br>
				<label id="label2">NAME</label>
				<input type='text' id='name' name="name"><br>
				<label id="label3">AGE</label>
				<input type='number' id='age' name="age"><br>
				<label id="label4">DOB</label>
				<input id='to'>
				</form>


			<div class="modal-footer">
				
				<button type="submit" class="btn btn-success" id="updatedata" onclick="update()">Update</button>
			
		        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Closed()" >Cancel</button>
		        
		    </div>
		    
		</div>

		<!--  division  to show buttons for paging -->
		<div class="paginate" id="button_paging">

			    </div>

			    <!-- <div  id="logoutbuttton"> 
			    	<button type="button" class="btn btn-success" id="logout" onclick="location.href='loginform.html'">Logout</button>
			    </div>
 -->
		    <!-- new form generation  ON CLICK OF A BUTTON  -->

		<div class="modal-content"  id="myModal1" >
		    	<div class="modal-header">
		        	<h4  style='text-align:center'class="modal-title">Create user</h4>
		    		<button type="button" class="close" data-dismiss="modal" onclick="Closed1()" >&times;</button>
		    	</div>
<!-- onsubmit="return addRow(event)" method="POST" -->
				<form  id='newform'   >				
					<div class="form-group">
						<label id="label2">NAME</label>
						<input type='text' id='create_name' name="create_name"><br>
					</div>
					<div class="form-group">
						<label id="label3">AGE</label>
						<input type='number'  min='0' step='1' id='create_age' name="create_age"><br>
					</div>
					<div class="form-group">
						<label id="label4">DOB</label>
	<!-- 				<input type="date" id='create_date' name ="create_date"><br>
	 -->				<input id='to_date' name="to_date"><br>
	 				</div>
					<label id="label5">Password</label>
					<input type="password"  id='create_password' name="create_password"><br>
					<button type="button"  class="btn btn-success"  id='create_form' onclick="addRow(event)" >submit</button>
					
 <!-- onclick="addRow(event)"onclick="now_Submit()  -->
				</form>
		</div>    

</head>
</body>

<script>
	//counting rows and generating buttons automatically//
	// # button_paging is the id for pagnation div   
	$(document).ready(function(){
		paging(0,0);



			$('#newform').validate({			
				rules:{
					create_name:{
						required: true
					},
					create_age:{
						required:true
						
					},
					create_dob:{
						required:true
					},
					create_password:{
						required:true,
						minlength:5
					}
				},
				messages:{
					create_name:{
						required:"Please enter username"
					},
					create_age:{
						required:"please enter numbers"
						
					},
					create_dob:{
						required:"don't leave it blank"
					},
					create_password:{
						required:"Please enter password",
						minlength:"Your password must consist atleast 5 chars",					
					},
				},
				// 	submitHandler:function(form){
				// 		 // $(form).ajaxSubmit();
				// form.submit();
			});
	});			
		$("#updatedata").on("click",function(){
			location.reload(true);

		});
		/*$("#create_form").click(function(){
			location.reload(true);
		});*/
		 $("#deleteusers").click(function(){
			location.reload(true);
			// console.log(datetime);
		});
		
    // changing date format by passing f=dob field id from  update and create forms//
	$(function(){
        $("#to").datepicker({ dateFormat: 'dd-mm-yy' });
    });
    $(function(){
        $("#to_date").datepicker({ dateFormat: 'dd-mm-yy' });
    });
    $(function(){
        $("#my_dob").datepicker({ dateFormat: 'dd-mm-yy' });
    });
    
    // { dateFormat: 'dd-mm-yy' }

       //generation of new form on click of a button//
	function newForm(){
    		 			
 		$('#myModal1').toggle();
 					
    	}

   //  	function now_Submit(){
    		
 		// if($("#newform").valid())
 		// 			{
 		// 				$('#myModal1').toggle(false);
 		// 			}
   //  	}


    	//paging buttons //
    function paging(prevpage,nextpage){
    	console.log('paging call',prevpage,nextpage);
    	let prev_page=prevpage;
    	let next_page=nextpage;
    	$.ajax({
    		url:"row_count.php",
    		type:"get",
    		success:function(data){
    			console.log(data);
    			if(data>0){
    				let number=data/10;
    				//number --> rows per page
    				console.log('numbers',parseInt(number));
    				let decimal = (number + "").split(".");
    				// split function  splits a numbers and returns an array//

    				console.log('num',decimal[1]);

    				//parseInt changes string to integer and returns it //

    				let pages=parseInt(number);
    				//if value in deciamal[1]>0
    				if(decimal[1]>0){
    					pages=pages+1;
    				}
    				//data is  total rows
    				if(prev_page == 0 && next_page ==0){
    					//present page//
	    				let r=$('<button id="pagination" class="btn btn-success"  onClick="Pagination('+1 +')">'+1 +'</button>');
	    					$('#button_paging').append(r);

	    					//next page icon 
	    				let next=$('<button id= "pagination" class="btn btn-success" onclick="Pagination('+2+');">&raquo;</button>');

	    				if(2<=pages){
							$('#button_paging').append(next);
	    				}
	    			}else{
	    				//html() returns the data of selected elements//

	    				$('#button_paging').html('');

	    				console.log(prev_page);
	    				let i=prev_page+1;
	    				console.log(i);
	    				console.log(next_page);
	    				let prev=$('<button id= "previous_page" class="btn btn-success" onclick="Pagination('+prev_page+');">&laquo;</button>');
	    				$('#button_paging').append(prev);
	    				let r=$('<button id="pagination" class="btn btn-success"  onClick="Pagination('+i +')">'+i +'</button>');
	    					$('#button_paging').append(r);	    				
	    				
	    				let next=$('<button id= "pagination" class="btn btn-success" onclick="Pagination('+next_page+');">&raquo;</button>');
	    				if(next_page<=pages){
							$('#button_paging').append(next);
	    				}
	    				//hiding the previous icon if page count is <1 //

	    				if(prev_page<1)

	    					$('#previous_page').hide();
		    		}
		    		if(next_page>pages){
		    		$('#button_paging').append(`<button type="button" class="btn btn-success" id="logout" onclick="location.href='loginform.html'">Logout</button>`)
		    	}
	    				
    				
    			}
    		}

    	});
    }
    
    function displayDate(){
    	
    	var p = today.split(/\D/);
				today= [p[2],p[1],p[0] ].join("/");
    	$('#dob').val(p);
    }

    
    function filterData(column){
    	// if(column == 'id'){
    	// 	var val = $('#my_id').val();
    	console.log('Changed');
    	if(column == 'name'){    	
    		var val = $('#my_name').val();
        }else if(column=='age'){
			var val=$('#my_age').val();
		}else if(column=='dob'){
			var val=$('#my_dob').val();
		}
		// paging();
	
    	$.ajax({
    		url:"search.php",
    		type:"POST",
    		data:{'key':column,'val':val},
    		success:function(dataarray){
    			let data=jQuery.parseJSON(dataarray);
    			// console.log('data',data);
    			if((data.length)>0){
    				$("#table_body").html("");
    			}let c=1;
    			for(let i in data){
    				console.log(i);
    				console.log(data[i]);
    				// <td style="text-align:center">${data[i]['id']}</td>
    				$('#table_body').append(`<tr id='table_row${data[i]['id']}'>
    						<td>${c}</td>	
    						
    						<td style="text-align:center">${data[i]['name']}</td>
    						<td style="text-align:center">${data[i]['age']}</td>
    						<td style="text-align:center">${data[i]['dob']}</td>
    						<td style="text-align:center"><button  class="btn btn-default" id='editusers' onclick="editUsers(${data[i]['id']});"><i class='fa fa-eye'></i></button></td>
    						
    					<td style="text-align:center"><button  class="btn btn-default" id='deleteusers' onclick="deleteUser(${data[i]['id']
    					},'table_row${data[i]['id']}');"><i class='fa fa-trash'></i></button></td>
    			
   	    
				</tr>`)
    				c++;
    			}
    		}
    	});
    }
     

    // pagination //
    function Pagination(i){
    	console.log(i);
    	paging(i-1,i+1);

    	let offset=(i-1)*10;
    	let x=1;
    	let limit=10;

    	$.ajax({
    		url:"pagination.php",
    		type:"POST",
    		data:{'offset':offset,'limit':limit},
    		success:function(dataarray)
    		{
    			let data=jQuery.parseJSON(dataarray);
    			if((data.length)>0){
    				$("#table_body").html("");
    			}
    			// add serial number to next pages 
    			var x=offset+1;
    			var p=parseInt(x);
    			for(let i in data)
    				
    			{   
    	// 		var temp=strtotime(data['dob']);
					// var newdate =date('d-m-Y', temp);

    				console.log(i);
    				console.log(data[i]);
    				$('#table_body').append(`<tr id='table_row${data[i]['id']}'>
    						<td >${p}</td>	
    						
    						<td style="text-align:center">${data[i]['name']}</td>
    						<td style="text-align:center">${data[i]['age']}</td>
    						<td style="text-align:center">${data[i]['dob']}</td>
    						<td style="text-align:center"><button  class="btn btn-default" id="editusers" onclick="editUsers(${data[i]['id']});"><i class='fa fa-eye'></i></button></td>
    						
    					<td style="text-align:center"><button  class="btn btn-default" id="deleteusers" onclick="deleteUser(${data[i]['id']
    					},'table_row${data[i]['id']}');"><i class='fa fa-trash'></i></button></td>
    					</tr>`)
    				//p is a serial number//
    				p++;
       				
    			}
    			// $('#button_paging').append(`<button type="button" class="btn btn-success" id="logout" onclick="location.href='loginform.html'">Logout</button>`)
    		}
    		
    	})
    }
	// to close  POP UP //
	function Closed(){			
		$('#myModal').toggle();
	}

	//to close new form popup//
	function Closed1(){
		$('#myModal1').toggle();
	}

//TO UPDATE DATABASE VALUE
	function update()
	{console.log($('#id').val());
		var id= $('#id').val();
		var name=$('#name').val();
		var age=$('#age').val();
		var dob=$('#to').val();
		var d=new Date(dob.split("-").reverse().join("-"));
		var dd=d.getDate();
		var mm=d.getMonth()+1;
		var yy=d.getFullYear();
		var newdate=yy+"-"+mm+"-"+dd;

		$.ajax({
			url:"update.php",
			data:{'id':id,'name':name,'age':age,'dob':newdate},
			type:"POST",
			success:function(data)
			{
				//console.log(data);
				alert(data);
			},
		});
	}

	// adding a row to data base on click of a button
// if(($("#newform").valid())){
	 function addRow(e) {
		e.preventDefault();
		
	 	var name=$('#create_name').val();
	 	var age=$('#create_age').val();
	 	var dob=$('#to_date').val();
	 	// var date= '21/01/2015';
		var d=new Date(dob.split("-").reverse().join("-"));
		var dd=d.getDate();
		var mm=d.getMonth()+1;
		var yy=d.getFullYear();
		var newdate=yy+"/"+mm+"/"+dd;

	 	var password=$('#create_password').val();
		if($("#newform").valid()){

	 	$.ajax({
	 		url:"create.php",
	 		data:{'name':name,'age':age,'dob':newdate,'password':password},
	 		type:"POST",
		 	success:function (data) 
		 	{
		 		alert(data);
		 		$("#create_form").click(function(){
			location.reload(true);
		});
		 		
		 	},
	 	});
		}else{
			console.log('hello');
			//		e.preventDefault();

			return;
		}


		
	}

	 	// else{
	 	// 	alert(data);
	 	// }
	 
 //to GET DATA FROM DATABASE//

    function editUsers(id)
	{
		console.log(id);
		$.ajax({
			url:"ajaxx.php",
			data: {'id':id},    
			type :"POST",
			success: function(data){
				console.log(data);
	     		let userdata=jQuery.parseJSON(data);
	     		// var today=userdata['dob'];
	     		var z=userdata['dob'];
	     		//console.log(z);
	     		//console.log(z.split('-'));
	     		let temp=z.split('-');
	     		console.log(temp);
	     		let newdate=temp[2]+"-"+temp[1]+"-"+temp[0];

	     		console.log(newdate);
	     		$('#id').val(userdata['id']);
	     		$('#name').val(userdata['name']);
	     		$('#age').val(userdata['age']);
	     		// #to is the ID IN view form//
	     		$('#to').val(newdate);
	     		//$('#to').val('1997-07-25');
	     		
	     		// console.log(displayDate(z));
	     		  // $('#dob').val(new_DOB);
	     		// $('#dob').val(userdata['dob']);
                $('#myModal').toggle();
                
			},
		});
    }

    function deleteUser(id,row){
    	//id.preventDefault();

    	console.log(id);
    		$.ajax({
    			url:"delete.php",
    			data:{'id':id},
    			type:"POST",
    			success:function(data){
    				console.log(data);

    				if(data)
    				{
    					console.log(row);
    					$('#'+row).remove();
    					alert('success');
    				}
    				else
    				{
    					alert("not possible to delete data ");
    				}
    			},
    		});
    	}

</script>
