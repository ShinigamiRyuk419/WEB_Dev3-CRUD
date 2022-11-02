<?php
include('handling.php');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ToDo | Register</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class='box'>
		<div class='box-form'>
			<div class='box-login-tab'></div>
			<div class='box-login-title'>
				<div class='i i-register'></div>
				<h2>REGISTER</h2>
			</div>
			<div class='box-login'>
				<div class='fieldset-body' id='login_form'>
					<button onclick="openLoginInfo();" class='b b-form i i-more' title='More' ></button>
			
					<?php include('errors.php');?>
					
					<form action="register.php" method="post">
					<p class='field'>
						<label for='first'>Firstname</label>
						<input type='text' id='pass' name='firstname' value="<?php echo $fname;?>" title='Firstname' required  minlength="2"
                			maxlength="25"/>
						<span id='valida' class='i i-close'></span>
					</p>
                    <p class='field'>
						<label for='user'>Lastname</label>
						<input type='text' id='user' name='lastname' value="<?php echo $lname;?>" title='Lastname' required minlength="2"
                			maxlength="25"/>
						<span id='valida' class='i i-warning'></span>
					</p>
                    <p class='field'>
						<label for='add'>Address</label>
						<input type='text' id='user' name='address' value="<?php echo $address;?>" title='Address' required minlength="2"
                			maxlength="25"/>
						<span id='valida' class='i i-warning'></span>
					</p>
					<p class='field'>
						<label for='email'>Email</label>
						<input type='text' id='mail' name='email'  title='Email' required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
						<span id='valida' class='i i-close'></span>
					</p>
                    <p class='field'>
						<label for='pass'>Password</label>
						<input type='password' id='pass' name='password' title='Password' required minlength="8" />
						<span id='valida' class='i i-close'></span>
					</p>
                    <p class='field'>
						<label for='confirm'>Confirm Password</label>
						<input type='password' id='pass' name='confirm' title='Confirm Password' required />
						<span id='valida' class='i i-close'></span>
					</p>

					  <input type='submit' id='do_login' value='Register' title='Register' name='reg-user' />
					</form>
				</div>
			</div>
		</div>
		<div class='box-info'>
			<p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Sign In'></button>
				<h3>Need Help?</h3>
			</p>
			<div class='line-wh'></div>
			<button onclick="" class='b-support' title='Forgot Password?'> Forgot Password?</button>
			<button onclick="" class='b-support' title='Contact Support'> Contact Support</button>
			<div class='line-wh'></div>
			<button onclick="window.location.href='index.php'" class='b-cta' title='Sign up now!'> Already have account?</button>
		</div>
	</div>

<script>

$(document).ready(function() {
    $("#do_login").click(function() { 
       closeLoginInfo();
       $(this).parent().find('span').css("display","none");
       $(this).parent().find('span').removeClass("i-save");
       $(this).parent().find('span').removeClass("i-warning");
       $(this).parent().find('span').removeClass("i-close");
       
        var proceed = true;
        $("#login_form input").each(function(){
            
            if(!$.trim($(this).val())){
                $(this).parent().find('span').addClass("i-warning");
            	$(this).parent().find('span').css("display","block");  
                proceed = false;
            }
        });
       
        if(proceed) //everything looks good! proceed...
        {
            $(this).parent().find('span').addClass("i-save");
            $(this).parent().find('span').css("display","block");
        }
    });
    
    //reset previously results and hide all message on .keyup()
    $("#login_form input").keyup(function() { 
        $(this).parent().find('span').css("display","none");
    });
 
  openLoginInfo();
  setTimeout(closeLoginInfo, 1000);
});

function openLoginInfo() {
    $(document).ready(function(){ 
    	$('.b-form').css("opacity","0.01");
      $('.box-form').css("left","-37%");
      $('.box-info').css("right","-37%");
    });
}

function closeLoginInfo() {
    $(document).ready(function(){ 
    	$('.b-form').css("opacity","1");
    	$('.box-form').css("left","0px");
      $('.box-info').css("right","-5px"); 
    });
}

$(window).on('resize', function(){
      closeLoginInfo();
});

</script>


</body>

</html>