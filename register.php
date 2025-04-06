<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>De La Salle University DASMARINAS</title>
    <link rel="icon" href="images/logo.png" type="image/png">

    <!-- Bootstrap 5.3 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .login-box {
            max-width: 420px;
            margin: 50px auto;
            background: #fff;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 24px;
            color: #3ea1db;
            font-weight: 600;
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
        .form-group {
            position: relative;
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
        #cys, #yrLvl {
            display: none;
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
        
       

        <p class="text-center text-muted mt-3">Create an account</p>

        <form action="controller/registerController.php" method="POST">
        <div class="mb-3">
            <select name="type" id="type" class="form-control placeholder-select" required>
                <option value="" selected hidden>Select User Type</option>
                <option value="2">Student</option>
                <option value="1">Adviser</option>
            </select>
        </div>

        <div class="mb-3">
            <select name="department" class="form-control placeholder-select" required>
                <option value="" selected hidden>Select Department</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Information Technology">Information Technology</option>
            </select>
        </div>

            <div class="mb-3" id="yrLvl">
                <select name="yr_lvl" id="yrLvlInput" class="form-control">
                    <option value="" selected disabled>Select Year Level</option>
                    <option value="3rd">3rd Year</option>
                    <option value="4th">4th Year</option>
                </select>
            </div>

            <div class="mb-3" id="cys">
                <input type="text" name="cys" id="cysInput" class="form-control" placeholder="Section">
            </div>

            <div class="mb-3">
                <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
            </div>
            <div class="mb-3">
                <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="mb-3">
                <input type="text" name="middlename" class="form-control" placeholder="Middle Name" required>
            </div>
            <div class="mb-3 position-relative">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <i class="fa fa-at toggle-password position-absolute top-50 end-0 translate-middle-y me-3"></i>
            </div>

            <div class="mb-3 position-relative form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <i class="fa fa-eye-slash toggle-password position-absolute"></i>
            </div>

            <div class="text-danger small d-none" id="password-error">
                Password must be at least 8 characters long, include an uppercase, lowercase, and a number.
            </div>
            <div class="text-success small d-none" id="password-valid">
                Password meets all requirements.
            </div>

            <div class="mb-3 position-relative form-group">
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
                <i class="fa fa-eye-slash toggle-password position-absolute"></i>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3" name="register">Signup</button>
            <hr class="my-4">

            <div class="text-center d-flex justify-content-center align-items-center">
                <p class="mb-0 me-2">Already have an account?</p>
                <a href="login.php" class="btn btn-link text-primary p-0">Click here</a>
            </div>
        </form>

    </div>
</div>
<div class="text-center mt-4">
    <p class="text-muted small">
        Designed & Developed by <strong>Thesis Tracker</strong> |  De La Salle University Dasmariñas &copy; 2025
    </p>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye-slash fa-eye");
            let input = $(this).prev("input");
            input.attr("type", input.attr("type") === "password" ? "text" : "password");
        });

        $("#type").on("change", function() {
            if ($(this).val() == 2) {
                $("#cys, #yrLvl").show();
                $("#cysInput, #yrLvlInput").attr("required", true);
            } else {
                $("#cys, #yrLvl").hide();
                $("#cysInput, #yrLvlInput").removeAttr("required");
            }
        });

        $("#password").on("keyup", function () {
            const password = $(this).val();
            const isValid = password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /\d/.test(password);

            $("#password-error").toggleClass("d-none", isValid);
            $("#password-valid").toggleClass("d-none", !isValid);
            $("button[name='register']").prop("disabled", !isValid);
        });
    });
</script>

=======
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>De La Salle University DASMARINAS</title>
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
  
  #cys, #yrLvl {
      display: none;
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
        <h3 class="text-center" style="width: 100%;padding: 5px;"><a href="login.php" class="text-decoration-none" style="color: #000;">Login</a></h3>

        <h3 class="text-center" style="border-bottom: 3px solid #3ea1db;width: 100%;padding: 5px;"><a href="register.php" class="text-decoration-none" style="color: #000;">Signup</a></h3>
        
      </div>
      <br>
      <p class="login-box-msg">Create an account?</p>
      <br>
      <form action="controller/registerController.php" method="POST">
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <select name="type" id="type" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
              <option value="">Select User Type</option>
              <option value="2">Student</option>
              <option value="1">Adviser</option>
              <!-- <option value="0">Admin</option> -->
            </select>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <select name="department" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
              <option value="">Select Department</option>
              <option value="Computer SCIENCE">Computer SCIENCE</option>
              <option value="Information Technology">Information Technology</option>
            </select>
          </div>
          
          <!--yr_lvl-->
          <div class="form-group has-feedback form-control" id="yrLvl" style="height: 45px;">
            <select name="yr_lvl" id="yrLvlInput" placeholder="Year Level" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;">
                <option value="" selected disabled>Select Year Level</option>
                <option value="3rd">3rd Year</option>
                <option value="4th">4th Year</option>
            </select>
          </div>
          <!--cys-->
          <div class="form-group has-feedback form-control" id="cys" style="height: 45px;">
            <input type="text" name="cys" id="cysInput" placeholder="Section" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;">
          </div>

          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="text" name="firstname" placeholder="First Name" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="text" name="lastname" placeholder="Last Name" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="text" name="middlename" placeholder="Middle Name" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
          </div>
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
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="password" name="confirmpassword" placeholder="******" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
            <i class="fa fa-eye-slash toggle-password2" style="position: absolute; right: 15px; top: 10px; cursor: pointer;margin-top: 6px;"></i>
          </div>
          
          <div class="row">
          <div class="col-xs-12">
                <button type="submit" class="btn btn-block btn-flat submit" style="background: #3ea1db; color: #fff; border: unset;height: 45px;font-size: 23px;" name="register" disabled>Signup</button>
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

  $(".toggle-password2").click(function() {
      $(this).toggleClass("fa-eye-slash fa-eye");
      var input = $(this).prev("input");
      if (input.attr("type") === "password") {
          input.attr("type", "text");
      } else {
          input.attr("type", "password");
      }
  });
  
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
          submitButton.prop("disabled", false);
        } else {
          errorMessage.show();
          validMessage.hide();
          submitButton.prop("disabled", true);
        }
      });
    });
    
    
    //show/hide section and yrLvl div
    $('#type').on('change', function() {
        let selectedType = $(this).val();
        
        if (selectedType != 2) {
            $('#cys').hide();
            $('#yrLvl').hide();
        } else {
            $('#cys').show();
            $('#cysInput').attr('required', true);
            $('#yrLvl').show();
            $('#yrLvlInput').attr('required', true);
        }
    });
    
  </script>
>>>>>>> second-repo/main
</body>
</html>
