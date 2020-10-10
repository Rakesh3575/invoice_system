<div class="container">
	<div class="row">
		   <span id="success"></span>
		   <!-- <span id="errors"></span> -->
   		<div class="col-md-6">
    			<h2>User Login Form</h2>
			<form name="user_login_form" class="user_login_form" id="user_login_form" enctype="multipart/form-data" accept-charset="utf-8" >
			 	<div class="form-group">
					<label>UserName</label>
					<input type="text" name="username" class="form-control" id="username" placeholder=" User Name">
				     <span id="username_error" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" id="password" placeholder="password ">
				     <span id="password_error" class="text-danger"></span>
				</div>
  		 		<div class="form-group"> 
					<input type="button" onclick="submitform()"  value="Submit" id="submit" class="btn btn-primary btn-submit">
				</div>
			</form>
		</div>
	</div> 	
</div>

<script type="text/javascript">
	function submitform() {
        /*falg to check the data, if there is an error, flag will turn to 1*/
        var flag = 0;
        /*Checking the value of inputs*/
        var username = $('#username').val();
        var password = $('#password').val();
        /*Validating the values of inputs that it is neither null nor undefined.*/
        if (username == '' || username == undefined) {
            $('#username').css('border', '1px solid red');
            flag = 1;
        }
        if (password == '' || password == undefined) {
            $('#password').css('border', '1px solid red');
            flag = 1;
        }
        /*if there is no error, go to flag==0 condition*/
        if (flag == 0) {
            /*Ajax call*/
            $.ajax({
                url: "<?php echo base_url('user/getLogin') ?>",
                method: 'POST',
                data: "UserName=" + username + "&Password=" + password,
                success: function (result) {
                    /*result is the response from LoginController.php file under getLogin.php function*/
                    if (result == 1) {
                        /*if response result is 1, it means it is successful.*/
                        $('#username').css('border', '1px solid green');
                        $('#password').css('border', '1px solid green');
                        setTimeout(function () {
                            /*Redirect to login page after 1 sec*/
                            window.location.href = '<?php echo base_url("user/dashboard") ?>';
                        }, 1000)
                    } else if (result == 2) {
                        /*if response result is 2, it means, username is invalid.*/
                        $('#username').css('border', '1px solid red');
                        alert('Invalid Username');
                    } else if (result == 3) {
                        /*if response result is 3, it means, password is invalid.*/
                        $('#password').css('border', '1px solid red');
                        alert('Invalid Password');
                    } else if (result == 4 || result == 5) {
                        /*if response result is 4 or 5, it means, username & password are invalid.*/
                        $('#username').css('border', '1px solid red');
                        $('#password').css('border', '1px solid red');
                        alert('Invalid Username & Passowrd');
                    } else {
                        alert('Something went wrong');
                    }
                }
            });
        } else {
            alert('Something went wrong');
        }
    }
</script>