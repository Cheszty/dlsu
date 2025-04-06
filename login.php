<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>De La Salle University DASMARINAS</title>
    <link rel="icon" href="images/logo.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f4f6f9;
        }
        .login-box {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 22px;
            color: #3ea1db;
            font-weight: bold;
            letter-spacing: 2px;
            text-align: center;
        }
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
        }
        .toggle-password:hover {
            color: #3ea1db;
        }
        .form-control {
            height: 45px;
            padding-right: 40px;
        }
        .btn-primary {
            background: #3ea1db;
            border: none;
            height: 45px;
            font-size: 18px;
            font-weight: bold;
        }
        .btn-primary:hover {
            background: #2b82b5;
        }
        .login-links a {
            color: #3ea1db;
            text-decoration: none;
        }
        .login-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-box">
        <div class="text-center">
            <img src="images/thesishub_logo2.png" width="30%">
            <p class="title mt-2">THESIS TRACKER</p>
            <img src="images/logo2.png" width="50%">
        </div>
        
        <div class="text-center my-3">

        </div>
        
        <p class="text-center text-muted">Sign in to start your session</p>

        <form action="controller/loginController.php" method="POST">
            <div class="mb-3 position-relative">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <i class="fa fa-at position-absolute top-50 end-0 translate-middle-y me-3"></i>
            </div>

            <div class="mb-3 position-relative">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <i class="fa fa-eye-slash toggle-password"></i>
            </div>

            <div class="error-message text-danger small d-none" id="password-error">
                Password must be at least 8 characters long, include an uppercase, lowercase, and a number.
            </div>
            <div class="valid small text-success d-none" id="password-valid">
                Password meets all requirements.
            </div>

            <div class="text-end login-links">
                <a href="forgotpassword.php">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3" name="signin">Login</button>
            <hr class="my-4">

            <div class="text-center d-flex justify-content-center align-items-center">
                <p class="mb-0 me-2">Don't have an account?</p>
                <a href="register.php" class="btn btn-link text-primary p-0">Click here</a>
            </div>

           
        
        </form>
    </div>
</div>

<div class="text-center mt-4">
    <p class="text-muted small">
        Designed & Developed by <strong>Team ACE</strong> |  De La Salle University Dasmariñas &copy; 2025
    </p>
</div>
<!-- Bo

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery (Required for Toggle Script) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye-slash fa-eye");
            let input = $("#password");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        const passwordInput = $("#password");
        const errorMessage = $("#password-error");
        const validMessage = $("#password-valid");

        function validatePassword(password) {
            return password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password);
        }

        passwordInput.keyup(function () {
            const password = $(this).val();
            if (validatePassword(password)) {
                errorMessage.addClass("d-none");
                validMessage.removeClass("d-none");
            } else {
                errorMessage.removeClass("d-none");
                validMessage.addClass("d-none");
            }
        });
    });
</script>


=======
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>De La Salle University DASMARINAS</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
 <style>
    .form-group {
      position: relative;
    }
    .error-message {
      color: red;
      font-size: 1.2rem;
      margin-top: 5px;
      display: none;
    }
    .valid {
      color: green;
      font-size: 1.2rem;
      display: none;
    }
    .toggle-password {
      position: absolute;
      right: 15px;
      top: 12px;
      cursor: pointer;
    }
    .title {
    font-size: 24px; 
    color: #3ea1db; 
    font-weight: 600;
    letter-spacing: 3px;
  }
  </style>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-box-body" style="padding: 20px 30px;">
      <div style="width: 100%;text-align: center;">
        <img src="images/thesishub_logo2.png" width="30%">
        <p class="text-center title">THESIS TRACKER</p>
        <img src="images/logo2.png" width="30%">
      </div> 
      <div style="display: flex;justify-content: space-evenly;padding: 0px 50px;">
        <h3 class="text-center" style="border-bottom: 3px solid #3ea1db;width: 100%;padding: 5px;"><a href="login.php" class="text-decoration-none" style="color: #000;">Login</a></h3>
        <h3 class="text-center" style="width: 100%;padding: 5px;"><a href="register.php" class="text-decoration-none" style="color: #000;">Signup</a></h3>
      </div>
      <br>
      <p class="login-box-msg">Sign in to start your session</p>
      <br>
      <form action="controller/loginController.php" method="POST">
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="email" name="email" placeholder="Email" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
            <span class="fa fa-at form-control-feedback" style="margin-top: 6px;"></span>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;margin-bottom: 10px;">
            <input type="password" name="password" id="password" placeholder="******" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
            <i class="fa fa-eye-slash toggle-password" style="position: absolute; right: 15px; top: 10px; cursor: pointer;margin-top: 6px;"></i>
          </div>
          <div class="error-message text-danger" id="password-error" style="margin-bottom: 10px;">
            Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, and one number.
          </div>
          <div class="valid" id="password-valid" style="margin-bottom: 10px;">
            Password meets all requirements.
          </div>
          <div>
            <a href="forgotpassword.php" class="text-decoration-none" style="color: #3ea1db;">Forgot Password?</a>
          </div><br>
          <div class="row">
          <div class="col-xs-12">
                <button type="submit" class="btn btn-block btn-flat submit" style="background: #3ea1db; color: #fff; border: unset;height: 45px;font-size: 23px;" name="signin"  disa>Login</button>
              </div>
          </div>
      </form>
      <br>
    </div>
</div>

<script src="dist/js/jquery.js"></script>
<script>
  $(".toggle-password").click(function() {
      $(this).toggleClass("fa-eye-slash fa-eye");
      var input = $(this).prev("input");
      if (input.attr("type") === "password") {
          input.attr("type", "text");
      } else {
          input.attr("type", "password");
      }
  });
</script>

<script>
    $(document).ready(function () {
      const passwordInput = $("#password");
      const errorMessage = $("#password-error");
      const validMessage = $("#password-valid");
      const submitButton = $(".submit");

      // Password validation rules
      const validatePassword = (password) => {
        const minLength = 8;
        const hasUpperCase = /[A-Z]/.test(password);
        const hasLowerCase = /[a-z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        return password.length >= minLength && hasUpperCase && hasLowerCase && hasNumber;
      };

      // Validate password on input
      passwordInput.keyup(function () {
        const password = $(this).val();
        if (validatePassword(password)) {
          errorMessage.hide();
          validMessage.show();
       //   submitButton.prop("disabled", false);
        } else {
          errorMessage.show();
          validMessage.hide();
       //   submitButton.prop("disabled", true);
        }
      });
    });
  </script>
>>>>>>> second-repo/main
</body>
</html>
