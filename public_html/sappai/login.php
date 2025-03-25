<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SAPPAI BBPOM Makassar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/x-icon" href="logos/icosappai-07.ico">

    <link rel="stylesheet" href="font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <style>
         .auth-card .image-side {
    width: 40%;
    background: url("logos/sappaibackground2-06-06.jpg") no-repeat center top;
    background-size: cover;
    padding: 80px 40px; }
    .auth-card .image-side .h3 {
      line-height: 0.8rem; }
      @media (max-width: 991px) {
    .auth-card {
      flex-direction: column; }
      .auth-card .image-side {
        width: 100%;
        padding: 60px; }
      .auth-card .form-side {
        width: 100%;
        padding: 60px; } }
        @media (max-width: 767px) {
    .auth-card p.h2 {
      font-size: 1.6rem; } }
  @media (max-width: 575px) {
    .auth-card {
      flex-direction: column; }
      .auth-card .image-side {
        padding: 35px 30px; }
      .auth-card .form-side {
        padding: 35px 30px; }
      .auth-card .logo-single {
        margin-bottom: 20px; }
      .auth-card p.h2 {
        font-size: 1.4rem; } }
        .rounded .auth-card .image-side {
  border-top-left-radius: 0.75rem;
  border-bottom-left-radius: 0.75rem; }
  @media (max-width: 991px) {
    .rounded .auth-card .image-side {
      border-bottom-right-radius: initial;
      border-bottom-left-radius: initial;
      border-top-left-radius: 0.75rem;
      border-top-right-radius: 0.75rem; } }
      .rtl.rounded .auth-card .image-side {
    border-top-left-radius: 0.75rem;
    border-bottom-left-radius: 0.75rem; }
    .rtl.rounded .auth-card .image-side {
    border-top-left-radius: initial;
    border-bottom-left-radius: initial;
    border-top-right-radius: 0.75rem;
    border-bottom-right-radius: 0.75rem; }
    .fixed-background {
  background: url("logos/sappaibackgroundd-01-01.jpg") no-repeat center center fixed;
  background-size: cover;
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0; }
    </style>
    
</head>

<body class="background show-spinner no-footer">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">
                            <br>
                            <p class=" text-white h2"><b>SAPPAI</b></p>

                            <p class="white mb-0">
                              <b style="color:red;">S</b>earching St<b style="color:red;">A</b>tus <b style="color:red;">P</b>engujian
                              Sam<b style="color:red;">P</b>le Pih<b style="color:red;">A</b>k Ket<b style="color:red;">I</b>ga
                            </p>
                            <p>Inovasi SAPPAI adalah Sistem Informasi untuk menelusuri status sampel pengujian sampel pihak ketiga</p>
                            <p><i><b>Version 2.0</b></i></p>
                        </div>
                        <div class="form-side">
                            <a href="Dashboard.Default.html">
                                <img src="logos/sappaiii.png" style="width: 250px;">
                                <!-- <span class="logo-single"></span> -->
                            </a>
                            <h6 class="mb-4">Login</h6>
                            <?php
                            if(isset($_GET['status'])){
                                if($_GET['status']=="wrong_pass"){?>
                               <div class="alert alert-danger" role="alert">
                            Email atau Password anda Salah, Silakan mengisi Email atau Password dengan benar
                            </div>
                             <?php   
                             }}
                            ?>
                           
                          <p>
                            <form action="login_proses.php" method="post">
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="email"/>
                                    <span>E-mail</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" name="password" placeholder="" />
                                    <span>Password</span>
                                </label>
                                <div class="d-flex justify-content-between align-items-center">
                                    
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>