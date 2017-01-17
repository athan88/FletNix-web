<?php

function NewUser()
{
    $fullName = trim($_POST['name']);
    $email = trim($_POST['email']);
    $userName = trim($_POST['user']);
    $password = trim($_POST['pass']);
    cleanInput();

    $query = "INSERT INTO Customer (customer_mail_adres, name, user_Name, password) VALUES('$email', '$fullName', $userName, $password)";
    $data = ($query) or die();
    if($data)
    {
        echo "Your registration is complete!";
    }

}

function SignUp()
{
    if(!empty($_POST['user']))
    {
        $query = mysqli_query("SELECT * FROM Customer WHERE userName = '$_POST[user]' AND password = '$_POST[pass]'") or die();

        if(!$row = mysqli_fetch_array($query) or die())
        {
            NewUser();
        }
        else
        {
            echo "You have already been registered";
        }
    }
}

if (isset($_POST['create']))
{
    SignUp();
}
?>
