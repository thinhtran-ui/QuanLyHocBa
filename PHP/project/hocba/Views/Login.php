<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'link.php' ?>
  <title>SanPham</title>
</head>

<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg>
      </div>

      <!-- Login Form -->
      <form action="" method="Post">
        <input type="text" id="login" class="fadeIn second" name="name" placeholder="login">
        <input type="text" id="password" class="fadeIn third" name="pass" placeholder="password"> <br>
       <span class="mb-3 text-danger">  <?php echo $this->err; ?>  </span> <br> <br>
        <div class="form-check form-check-inline">
          <label class="form-check-label mr-2" for="inlineRadio1" >Admin</label>
          <input class="form-check-input " type="radio" name="role" id="inlineRadio1" value="admin" checked>
        
        </div>
        <div class="form-check form-check-inline">
        <label class="form-check-label  mr-2" for="inlineRadio1">Giáo viên</label>
          <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="giaovien">
       
        </div>
        <div class="form-check form-check-inline">
        <label class="form-check-label  mr-2" for="inlineRadio1">Học sinh</label>
        <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="hocsinh">
        </div>
        <br>  <br>
        <input type="submit" name="submit" class="fadeIn fourth" value="LogIn">

      </form>
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>
</body>

</html>