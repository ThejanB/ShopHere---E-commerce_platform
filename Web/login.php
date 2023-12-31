<?php 
include('Database/userServer.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Login Page</title>

        <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">


                <!-- Bootstrap CDN -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

                <!-- Owl-carousel CDN -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
            
                <!-- font awesome icons -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
                      <!-- custome css file -->
                <link rel="stylesheet" href="style.css">
        
    </head>
    <body>

        <!-- Section: Design Block -->
    <section class=" text-center text-lg-start">
    <style>
        
      .rounded-t-5 {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
      }
  
      @media (min-width: 992px) {
        .rounded-tr-lg-0 {
          border-top-right-radius: 0;
        }
  
        .rounded-bl-lg-5 {
          border-bottom-left-radius: 0.5rem;
        }

        .container-div {
            width: 70%;
            height: 80%;
            margin: auto ;
            margin-top: 40px;
            box-shadow: 10px 10px 10px rgb(208, 206, 206);
            border: 2px solid rgb(230, 230, 230);
            border-radius: 2px;

        }

        .input-text-box-border{
            border: 1px solid black;
        }

        .button-shadow {
          box-shadow: 5px 5px 5px rgb(176, 174, 255);
        }

        .text-shadow {
          box-shadow: 1px 1px 3px rgb(201, 210, 254);
        }

        .error {
          width: 90%;
          margin: 0px auto;
          padding:10px;
          border: 1px solid #a94442;
          color: #a94442;
          background: #f2dede;
          border-radius: 5px;
          text-align: left;
        }
      }
    </style>

    <header id="header">

    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-raleway font-size-12 text-black-50 m-0">This is an intellectual property of ShopHere</p>
        <div class="font-raleway font-size-14">
            <a href="#" class="px-3 border-right border-left text-dark">Welcome</a>
        </div>
    </div>
            <!-- primary navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="#">ShopHere</a>   
    </nav>

</header>

    <div class="container-div">

      <div class="row g-0 d-flex align-items-center">
        <div class="col-lg-4 d-none d-lg-flex">
          <img src="assets/login-image.jpg" alt="Welcome to ShopHere"
            class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        </div>

        <div class="col-lg-8">

          <?php if (isset($_SESSION['errorsList'])): ?>
            <?php if (count($_SESSION['errorsList']) > 0): ?>
              <div class="error">
                
                <?php foreach ($_SESSION['errorsList'] as $error): ?>
                  <p><?php echo $error; ?></p>
                <?php endforeach;?>
              </div>
              <?php unset($_SESSION['errorsList']); ?>
            <?php endif;?>
          <?php endif;?>


          <div class="card-body py-5 px-md-5">
  
            <form action="Database/userServer.php" method="post">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="inputEmailLogin" class="form-control input-text-box-border text-shadow" />
                <label class="form-label" for="form2Example1">Email address</label>
              </div>
  
              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="inputPasswordLogin" class="form-control text-shadow" />
                <label class="form-label" for="form2Example2">Password</label>
              </div>
  
              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="inputRememberMe" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                  </div>
                </div>
  
                <div class="col">
                  <!-- Simple link -->
                  <a href="#!">Forgot password?</a>
                </div>
              </div>
  
              <!-- Submit button -->
              <div class="button-shadow">
              <button type="submit" class="btn btn-primary btn-block mb-4  " name="buttonSignIn">Sign in</button>
              </div>
            </form>
  
          </div>
        </div>
      </div>
    </div>
    </section>
  <!-- Section: Design Block -->
    </body>

</html>