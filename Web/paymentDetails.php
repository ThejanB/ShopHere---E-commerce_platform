<?php

include('Database/userServer.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Payment Details</title>


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
            width: 80%;
            height: 100%;
            margin: auto ;
            margin-top: 20px;
            box-shadow: 5px 5px 5px rgb(208, 206, 206);
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
        .nameWidth {
          width: 80%;
        }

        .left {
          float: left;
        }

        .right {
          float: right;
        }

        .fitToHeight {
          height: 100%;

        }

        .inputBackgroundColor{
          background-color: rgb(255, 255, 255);
        }

        .error {
          width: 90%;
          margin:  auto;
          padding:10px;
          border: 1px solid #a94442;
          color: #a94442;
          background: #f2dede;
          border-radius: 5px;
          text-align: left;
        }

        .text-font{
          font-family: futura-pt,Tahoma,Geneva,Verdana,Arial,sans-serif;
          font-weight: 700;
          letter-spacing: .156rem;
          font-size: 1.125rem;
          }
          .text-price{
          padding: 0 .625rem;
          font-family: futura-pt,Tahoma,Geneva,Verdana,Arial,sans-serif;
          font-style: normal;
          font-size: .75rem;
          font-weight: 700;
          line-height: .813rem;
          letter-spacing: 1.6px;
          }
          .text-descriptions{
          font-family: futura-pt,Tahoma,Geneva,Verdana,Arial,sans-serif;
          font-style: normal;
          font-size: .75rem;
          font-weight: 400;
          line-height: 1.125rem;
          margin: .313rem 0 .938rem;
          padding: 0 .625rem;
          }
          .button-color{
          color: #4e4e4e ;
          border-color: #4e4e4e ;
          }
          .button-order{
          font-family: futura-pt,Tahoma,Geneva,Verdana,Arial,sans-serif;
          font-style: normal;
          font-size: .75rem;
          font-weight: 700;
          background-color: hsl(90, 40%, 50%);
          color: white;
}

      }
    </style>

    <header id="header">

    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-raleway font-size-12 text-black-50 m-0">This is an intellectual property of ShopHere</p>
        <div class="font-raleway font-size-14">
            <a href="#" class="px-3 border-right border-left text-dark">Pay HERE!</a>
        </div>
    </div>
            <!-- primary navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="#">ShopHere</a>   
    </nav>

</header>

    <div class="container-div">

    <div class="container my-5 py-5">

<!--Section: Design Block-->
<section>

  
  <div class="container" style = "height :fit-content;">

    <div class="row g-0 d-flex align-items-center">
        <div class="col-lg-4 d-none d-lg-flex">
          <img src="assets/paymentDetailsImage.jpg" alt="Welcome to ShopHere"
            class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5 fitToHeight" />
        </div>
        

    <div class="col-md-8 mb-4"  >

    <form method="post" action="Database/userServer.php" >
      <div class="card mb-4">
        <div class="card-header py-3">
          <h5 class="mb-0 text-font text-uppercase">Payment Details</h5>
        </div>
        <div class="card-body">

        <?php if (isset($_SESSION['errorsList'])): ?>
          <?php if (count($_SESSION['errorsList']) > 0): ?>
            <div class="error" style="margin : 10px;">
              
              <?php foreach ($_SESSION['errorsList'] as $error): ?>
                <p><?php echo $error; ?></p>
              <?php endforeach;?>
            
            </div>
            <?php unset($_SESSION['errorsList']); ?>
          <?php endif;?>
        <?php endif;?>
    

            <!-- Text input -->
            <div class="form-outline mb-4">
              <input type="text" id="form11Example3" name="inputName" class="form-control" />
              <label class="form-label" for="form11Example3">Owner</label>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
              <input type="text" id="form11Example4" name="inputCardNumber" class="form-control" />
              <label class="form-label" for="form11Example4">Card Number</label>
            </div>

            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form11Example1"  name="inputExpMonth" class="form-control" />
                  <label class="form-label" for="form11Example1">Exp Month</label>
                </div>
              </div>

              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form11Example2" name="inputExpYear"  class="form-control" />
                  <label class="form-label" for="form11Example2">Exp Year</label>
                </div>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form11Example3"  name="inputBank" class="form-control" />
                  <label class="form-label" for="form11Example1">Bank</label>
                </div>
              </div>

              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form11Example4" name="inputCVV"  class="form-control" />
                  <label class="form-label" for="form11Example2">CVV</label>
                </div>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" name="buttonPaymentDetails" class="btn button-order col-md-10" style="width:40%; height:40px; font-size: 18px;">Confirm Payment</button>
            </div>
            
        </div>
        
      </div>
      
    </form>
    </div>
  </div>

</section>
<!--Section: Design Block-->

</body>

</html>