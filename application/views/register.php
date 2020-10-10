<div class="container">
	<div class="row">
		   <span id="success"></span>
		   <!-- <span id="errors"></span> -->
   		<div class="col-md-6">
    			<h2>User Register Form</h2>
			<form name="user_form" class="user_form" id="user_form" enctype="multipart/form-data" accept-charset="utf-8" >
				<div class="form-group">
					<label>First Name</label>
					<input type="text" name="firstname" class="form-control" placeholder=" First Name">
				     <span id="firstname_error" class="text-danger"></span>
 					</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" name="lastname" class="form-control" placeholder=" Last Name">
				     <span id="lastname_error" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>UserName</label>
					<input type="text" name="username" class="form-control" placeholder=" User Name">
				     <span id="username_error" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="password ">
				     <span id="password_error" class="text-danger"></span>
				</div>
  		 		<div class="form-group"> 
					<input type="button" value="Submit" id="submit" class="btn btn-primary btn-submit">
				</div>
			</form>
		</div>
	</div> 	
</div>
 <script type="text/javascript">

   $( document ).ready(function() {
  	$(".btn-submit").click(function(){
 	var formData = new FormData();
 	formData.append('firstname', $("input[name='firstname']").val());
	formData.append('lastname', $("input[name='lastname']").val());
	formData.append('username', $("input[name='username']").val());
	formData.append('password', $("input[name='password']").val());
   	$.ajax({
  		url: '<?php echo base_url();?>user/dataInsert',
  		data:formData, 
  		type:'POST',
  		dataType:'json',
  		contentType:false,
  		processData:false,
        	success: function(data){
   	 	 	if(data.success)
		   	{ //when success mesage occure that time error message is blank
		   		console.log(data.success+"sddsds");
	 		      $('#success').html(data.success).fadeOut(3000); 
				  	$('#firstname_error').html('');
				  	$('#lastname_error').html('');
				  	$('#username_error').html('');
				  	$('#password_error').html('');
	 		      $('#user_form')[0].reset();
 					if(data.success)
 					{ 
 				      swal("Good job!", "Insert Data Successfully", "success");
	 				  location.href = "<?php echo base_url()?>user/login"
 				  		// location.window.href = "http://www.google.com";
  				  	}else
 				  	{
 				      swal("OOps!", "Something Wrong", "error");
 				  	}	
			   }else
			   { 	  //$('#errors').html(data.error);
					if(data.error)
				   { //when error mesage occure that time error message Display in tag
 					   if(data.firstname_error != '')
					   {
					   	$('#firstname_error').html(data.firstname_error);
					   }
					   else
					   {
					    	$('#firstname_error').html('');
					   }
				 	   if(data.lastname_error != '')
					   {
					    	$('#lastname_error').html(data.lastname_error);
					   }
					   else
					   {
					   	$('#lastname_error').html('');
					   }
					   if(data.username_error != '')
					   {
					    	$('#username_error').html(data.username_error);
					   }
					   else
					   {
					   	$('#username_error').html('');
					   }
					   if(data.password_error != '')
					   {
					    	$('#password_error').html(data.password_error);
					   }
					   else
					   {
					   	$('#password_error').html('');
					   }
					}else
					{
					 	swal("Something Missing!", "Something went Wrong", "error");
					}
          		}
 			}  
  		}); //end ajax 	
    });
});
 
 </script>
<!-- 
<div class="container"> 
	<div class="row"> 
	      	<div class="well clearfix">
		        <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
		   </div>
	 	<form enctype="multipart/form-data">
	      <table class="table table-bordered" id="tbl_posts">
	        <thead>
	         <tr>
	            <th>#</th>
	            <th>Product Item</th>
	            <th>Quantity</th>
	            <th>Per Rate</th>
	            <th>Grand Amout</th>
	            <th>Total</th>
	         </tr>
	         </thead>
	         <tbody id="tbl_posts_body">
	         
	        </tbody>
	      </table>
 	 	<div style="display:none;">
	   	<table id="sample_table">
	      	<tr id="">
	      	<td><span class="sn"></span>.</td>
	       	<td><input type="text" name="product"></td>
	       	<td><input type="text" name="quantity"></td>
	      	<td><input type="text" name="per_rate"></td>
	       	<td><input type="text" name="total_rate"></td>
	       	<td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
	     		</tr>
	   	</table>
	 	</div>
	  	</form>
   </div> 
</div> -->
<script>


//add and delete row start
	jQuery(document).delegate('a.add-record', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#sample_table tr'),
     size = jQuery('#tbl_posts >tbody >tr').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'rec-'+size);
     element.find('.delete-record').attr('data-id', size);
     element.appendTo('#tbl_posts_body');
     element.find('.sn').html(size);
   });
 //delet row
   jQuery(document).delegate('a.delete-record', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      jQuery('#rec-' + id).remove();
      
    //regnerate index number on table
    $('#tbl_posts_body tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn').html(index+1);
    });
    return true;
  } else {
    return false;
  }
});
//add and delete row end   
 </script>