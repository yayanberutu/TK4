<!DOCTYPE html>
<html>
<head>
	<title><?= $data['title'] ?></title>
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <a class="navbar-brand" href="#page.com">GoJualan</a>
            <!-- Bootstrap Icons-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
            <!-- Google fonts-->
            <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
            <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
            <!-- SimpleLightbox plugin CSS-->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
            <!-- Core theme CSS (includes Bootstrap)-->
            <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/Style.css">
</div>
</nav>
</head>
<body>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="<?= BASEURL; ?>/login/process" method="post">

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Sign in</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter Username" name="username"/>
            <label class="form-label" for="form3Example3">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password"/>
            <label class="form-label" for="form3Example4">Password</label>
          </div>


          <div class="text-center text-lg-start mt-4 pt-2">
            <!-- <button type="button" class="btn btn-primary btn-lg" a href="wwww.google.com"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button> -->
              <button type="submit" class="btn btn-primary btn-xl">Login</button>
          </div>

        </form>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <?php
              Flasher::message();
            ?>
          </div>
      </div>
      </div>
      
</div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    
    <!-- Right -->
  </div>
</section>

</body>
</html>