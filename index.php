<?php
	session_start();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ToDo | Login</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class='box'>
		<div class='box-form'>
			<div class='box-login-tab'></div>
			<div class='box-login-title'>
				<div class='i i-login'></div>
				<h2>LOGIN</h2>
			</div>
			<div class='box-login'>
				<div class='fieldset-body' id='login_form'>
					<button onclick="openLoginInfo();" class='b b-form i i-more' title='More' ></button>
					<form action="connection.php" method="post">
					<p class='field'>
						<label for='user'>Email</label>
						<input type='text' id='user' name='email' title='email' value= "<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email']; }?>" required/>
						<span id='valida' class='i i-warning'></span>
					</p>
					<p class='field'>
						<label for='pass'>PASSWORD</label>
						<input type='password' id='pass' name='password' title='Password' value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; }?>" required />
						<span id='valida' class='i i-close'></span>
					</p>

					<p class='field'>
						<input type='checkbox' id='rem' name='remember'  />Remember me
					</p>

					  <input type='submit' id='do_login' value='Login' title='Login' name='submit' />
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
			<button onclick="window.location.href='register.php'" class='b-cta' title='Sign up now!'> CREATE ACCOUNT</button>
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