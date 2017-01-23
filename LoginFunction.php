<?php
/*checking the login data with the server*/
    function checkCredentials($password, $email){

        /*input should be cleaned at this point*/
        $query = "SELECT customer_mail_adres, password FROM FletNix_Web.dbo.Customer WHERE customer_mail_adres = '$email'";
        $userId = executeQuery($query);

        if (isset( $userId[0][1]) && isset($userId[0][0])){
            $userPassword = $userId[0][1];
            $userEmail = $userId[0][0];
        }

        if (!empty($userEmail) && Password_verify($password, $userPassword)){
            $_SESSION["email"] = $userEmail;
            return true;
        }elseif($userId = null){
            return false;
        }else{
            return false;
        }
    }
?>