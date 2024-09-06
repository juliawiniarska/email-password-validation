<?php

class Validator
{
    public function validateEmail(string $email): bool 
    {
        $pattern = '/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        $format = (bool)preg_match($pattern, $email);

        if ($format) {
            return true;
        } else {
            echo "Adres e-mail jest nieprawidłowy, musi mieć poprawny format: \n";
            echo "[nazwa]@[domena].[rozszerzenie] \n";
            return false;
        }
    }

    public function validatePassword(string $password): bool 
    {
        $length = strlen($password) >= 8;
        $uppercase = preg_match('/[A-Z]/', $password);
        $lowercase = preg_match('/[a-z]/', $password);
        $digit = preg_match('/\d/', $password);
        $special = preg_match('/[\W_]/', $password);

        if ($length && $uppercase && $lowercase && $digit && $special) {
            return true;
        }
        else {
            echo "Hasło jest nieprawidłowe, musi zawierać: \n";
            if (!$length) echo " - co najmniej 8 znaków \n";
            if (!$uppercase) echo " - co najmniej 1 dużą literę \n";
            if (!$lowercase) echo " - co najmniej 1 małą literę \n";
            if (!$digit) echo " - co najmniej 1 cyfrę \n";
            if (!$special) echo " - co najmniej 1 znak specjalny \n";
            return false;

        }
    }
}

//Example
$validator = new Validator();

$email = "example@email.com";
$password = "Polska11!";

$validator->validateEmail($email);
$validator->validatePassword($password);

?>