

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.login-btn:hover,.login-btn:active,.login-btn:focus {
  background: #64b0f2;
}

.login-btn {
  font-family: sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #64b0f2;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}


.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #64b0f2; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #64b0f2, #64b0f2);
  background: -moz-linear-gradient(right, #64b0f2, #64b0f2);
  background: -o-linear-gradient(right, #64b0f2, #64b0f2);
  background: linear-gradient(to left, #64b0f2, #64b0f2);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>

<script type="text/javascript">
  $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>



<div class="login-page">
  <div class="form">
    
    <form class="login-form" id="login" method="post">
      <input type="text" placeholder="username" name="username">
      <input type="password" placeholder="password" name="password">

      <input type="button" name="" value="login" onclick="adminLogin();" class="login-btn" style=" background: #64b0f2;">
     
      
    </form>

    <div id="alert"></div>
  </div>
</div>


<script>
  function adminLogin()
  {

    $.ajax({
      type:'POST',
      url:'<?php echo base_url('')?>Admin/Authenticate',
      data:$("#login").serialize(),
      success:function(response)
      {
        $("#alert").html(response);
      }
    });
  }
</script>
