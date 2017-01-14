<?php
/*checking the login data with the server*/
    function checkCredentials($hashedPwd, $email){
        /*input should be cleaned and hashed/salted at this point*/

        $query = "SELECT customer_mail_adres FROM FletNix_Web.dbo.Customer WHERE customer_mail_adres = '$email' AND password = '$hashedPwd'";
        $userId = executeQuery($query);
        $useremail = $userId[0];

        if (!empty($useremail)){
            $_SESSION["email"] = $useremail;
            return true;
        }elseif($userId = null){
            return false;
        }else{
            return false;
        }
    }
?>