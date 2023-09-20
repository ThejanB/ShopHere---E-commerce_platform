<?php
    session_start();
    //initiate all variable to null
    $firstName = "";
    $lastName = "";
    $email = "";
    $password = "";
    $confirmPassword = "";
    $errors = array();
    $userID = "";

    // Connect to the database
    $db = mysqli_connect('localhost', 'root', '' , 'shopheredb' , '3306');

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: ". mysqli_connect_error();
        return;
    }

    // When buttonSignUp is clicked
    if (isset($_POST['buttonSignUp'])) {

        $firstName = $_POST['inputFirstName'];
        $lastName = $_POST['inputLastName'];
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        $confirmPassword = $_POST['inputConfirmPassword'];

        // Check input fields

        //make sure all fields are filled
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword) ) {
            $errors[] = "Please fill all the required fields";
        } 
        if ($password != $confirmPassword){
            $errors[] = "Password and Confirm Password do not match";
        }

        if (count($errors) == 0){
            $passwordEncrypted = md5($password);
            $sqlQuery = "INSERT INTO registered_customer (first_name  , last_name , email , password )
                    VALUES ('$firstName','$lastName','$email','$passwordEncrypted')" ;
            mysqli_query($db, $sqlQuery);

            //log user in
            $_SESSION['userName'] = $firstName;
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";

            $sqlQueryGetID = " SELECT ID FROM registered_customer WHERE (email = '$email') ";
            $user = mysqli_query($db, $sqlQueryGetID);
        
            while ( $item = mysqli_fetch_assoc($user) ){
                $userID .= "{$item['ID']}";
            }

            $_SESSION['userID'] = $userID;

            header("Location: ../deliveryDetails.php"); 
            
            } else {
                $_SESSION['errorsList'] = array();
                foreach ($errors as $error) {
                    array_push($_SESSION['errorsList'], $error);
                    
                }
                header("Location: ../signup.php");
            }
        
    } 
    
    

    // log user 
    if (isset($_POST['buttonSignIn'])) {

        $email = $_POST['inputEmailLogin'];
        $password = $_POST['inputPasswordLogin'];

        // Check input fields
        //make sure all fields are filled
        if (empty($email) || empty($password)) {
            $errors[] = "Please fill all the required fields";
        } 
    
        if (count($errors) == 0){

            $passwordEncrypted = md5($password);
            $sqlQuery = "SELECT first_name FROM registered_customer WHERE email = '$email' AND password = '$passwordEncrypted'"; 
            $result = mysqli_query($db, $sqlQuery);

            if (mysqli_num_rows($result)==1){
                //log user in

                $row = $result->fetch_assoc();
                $firstname = $row['firstname'];
                
                $_SESSION['email'] = $email;
                $_SESSION['userName'] = $firstName;
                $_SESSION['success'] = "You are now logged in";

                $sqlQueryGetID = " SELECT ID FROM registered_customer WHERE (email = '$email') ";
                $user = mysqli_query($db, $sqlQueryGetID);
            
                while ( $item = mysqli_fetch_assoc($user) ){
                    $userID .= "{$item['ID']}";
                }

                $_SESSION['userID'] = $userID;
                header("Location: ../index.php"); 
            
            } else {
                $errors[] = "Email or Password do not match";   
            } 

        } 

        if (count($errors) != 0) {
            $_SESSION['errorsList'] = array();
                foreach ($errors as $error) {
                    array_push($_SESSION['errorsList'], $error);
                    
                }
            header("Location: ../login.php"); //Sign in again
            
        }
    
    }


    // logout
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['userName']);
        unset($_SESSION['userID']);
        unset($_SESSION['success']);
        unset($_SESSION['email']);
        header('location: index.php');
    }

    //Shipping detials Submission button clicled
    if (isset($_POST['buttonConfirmedDetails'])) {

        $email = $_SESSION['email'];
        $userID = $_SESSION['userID'];

        $address = ($_POST['inputAddress']);
        $zipCode = $_POST['inputZipCode'];
        $street = $_POST['inputStreet'];
        $province = $_POST['inputProvince'];
        $mobile = $_POST['inputMobile'];
        $city = $_POST['inputCity'];
        $mobile = $_POST['inputMobile'];
        // Check input fields

        //make sure all fields are filled
        if (empty($address) || empty($zipCode) || empty($street) || empty($province) || empty($city) || empty($mobile) ) {
            $errors[] = "Please fill all the required fields"  ;
        } 

        if (count($errors) == 0){ 
            //Insert data into database --> Address table
            $sqlQuery = "INSERT INTO address (PO_box  , zip_code , street , province , city_name , registered_customer_id , is_home_address)
                    VALUES ('$address','$zipCode','$street','$province','$city' ,$userID , 1)" ;
            mysqli_query($db, $sqlQuery);

            //insert data into database --> Mobile table
            $sqlQueryMobile = "INSERT INTO mobile (mobile_number , registered_customer_id) VALUES ('$mobile','$userID')" ;
            mysqli_query($db, $sqlQueryMobile);

           //FOrward to Index
            header("Location: ../paymentDetails.php"); 
            
            } else {
                $_SESSION['errorsList'] = array();
                foreach ($errors as $error) {
                    array_push($_SESSION['errorsList'], $error);
                    
                }
                header("Location: ../deliveryDetails.php");
            }
        
    }

    //Payment details Submission button clicled
    if (isset($_POST['buttonPaymentDetails'])) {

        $email = $_SESSION['email'];
        $userID = $_SESSION['userID'];

        $owner = $_POST['inputName'];
        $cardNumber = $_POST['inputCardNumber'];
        $expMonth = $_POST['inputExpMonth'];
        $expYear = $_POST['inputExpYear'];
        $bank = $_POST['inputBank'];
        $cvv = $_POST['inputCVV'];

        // Check input fields
        //make sure all fields are filled
        if (empty($owner) || empty($cardNumber) || empty($expMonth) || empty($expYear) || empty($bank) || empty($cvv) ) {
            $errors[] = "Please fill all the required fields" . $userID;
        } 

        if (count($errors) == 0){ 
            //Insert data into database --> card_details table
            $sqlQuery = "INSERT INTO card_details (registered_customer_id  , bank , is_verified , name_in_card , cvv , exp_month , exp_year , card_no)
                    VALUES ('$userID','$bank',1,'$owner','$cvv' ,$expMonth , $expYear , $cardNumber)" ;
            mysqli_query($db, $sqlQuery);

            //FOrward to Index
            header("Location: ../index.php"); 
            
            } else {
                $_SESSION['errorsList'] = array();
                foreach ($errors as $error) {
                    array_push($_SESSION['errorsList'], $error);
                    
                }
                header("Location: ../paymentDetails.php");
            }
        
    }

?>

