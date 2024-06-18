<head>
    <?php include 'css.php'; ?>
    <title>Login</title>
    <style>
      .gradient-custom-2 {
    /* fallback for old browsers */
    background: #fccb90;
    
    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }
    
    @media (min-width: 768px) {
    .gradient-form {
    height: 100vh !important;
    }
    }
    @media (min-width: 769px) {
    .gradient-custom-2 {
    border-top-right-radius: .3rem;
    border-bottom-right-radius: .3rem;
    }
}
    </style>
</head>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h4 class="mt-1 mb-5 pb-1">Perpustal</h4>
                </div>

                <?php
                    ob_start();
                    include 'connection.php';
                    session_start();
                    if (isset($_SESSION['username'])) {
                        header("Location: dashboard.php");
                    }

                    if (isset($_POST['submit'])) {
                        $user = $_POST['username'];
                        $password = md5($_POST['password']);

                        $sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
                        $result = mysqli_query($con, $sql);
                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['username'] = $row['username'];
                            header("Location: dashboard.php");
                        } else {
                
                            echo "
                            <div class='d-flex align-items-center justify-content-center pb-4'>
                            invalid password or username
                            </div>
                            ";
                        }
                    }
                ?>

                <form action="" method="POST">
                  <p>Please login to your account</p>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form2Example11" class="form-control"
                      placeholder="Username" name="username"/>
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" name="password"/>
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit" value="submit" >Login</button>
                  </div>


                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="register.php">Create New</a>
                  </div>

                </form>
                

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<?php
    ob_start();
    include 'connection.php';
    session_start();
    if (isset($_SESSION['username'])) {
        header("Location: dashboard.php");
    }

    if (isset($_POST['submit'])) {
        $user = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
        } else {
            echo "invalid password or username";
        }
    }
?>