
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>OBS</title>
<link rel="stylesheet" type="text/css" href="login.css">
<style>
body {
  width: 100wh;
  height: 90vh;
  color: #fff;
  background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
  background-size: 400% 400%;
  -webkit-animation: Gradient 15s ease infinite;
  -moz-animation: Gradient 15s ease infinite;
  animation: Gradient 15s ease infinite;
}

@-webkit-keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

@-moz-keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

@keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

/* h1,*/
h6 {
  font-family: 'Open Sans';
  font-weight: 300;
  /*text-align: center;*/
  position: absolute;
  top: 45%;
  right: 0;
  left: 0;
}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300" type="text/css" />

</head>
<body>

<div class="container" style = "padding-left: 250px">
  <h1 style = "font-family: 'Open Sans'">Online Book Store Recommendation System</h1>
  <p>
  <div>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button >
    <br/><br/>
      <form action = "admin.php">
        <button style="width:auto;">Admin Login</button >
      </form>
      <br/><br/> 
    <form action = "books.php">
    <button style="width:auto;">Browse Books</button >
  </form>
  <br/><br/>
    <form action = "contact.php">
    <button style="width:auto;">Need Help? Contact</button >
  </form>
  <br/><br/>
  <form action = "about.php">
    <button style="width:auto;">Want to know more about us?</button >
  </form>
    <?php include('server.php');?>
    <div id="id01" class="modal">
    
    <form class="modal-content animate" method = "post"action="login.php">
      <?php include('errors.php'); ?>
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="img_avatar.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <div class = "input-group">   
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
    </div>
        <div class = "input-group">
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
    </div>
      <div class = "input-group">  
        <button type="submit" name = "login_user">Login</button>
      </div>
        <p>Not yet a member? <a href="register.php">Sign up</a>
        </p>
      
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button class = "wrap" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </form>
    </div>
    <script src = "login_modal.js"></script>
  </div>
  </p>    
</div>
<footer style="position:  fixed ;bottom : 0;width : 100%">          
      <div style = "padding  : 50px">

      </div>
    </footer>
</body>
