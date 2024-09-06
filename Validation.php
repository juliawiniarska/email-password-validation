<?php

class Validator
{
    public function validateEmail(string $email): bool 
    {
        $pattern = '[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        return preg_match($pattern, $email) === 1;
    }

    public function validatePassword(string $password): bool 
    {
        $length = strlen($password) >= 8;
        $uppercase = preg_match('/[A-Z]/', $password);
        $lowercase = preg_match('/[a-z]/', $password);
        $digit = preg_match('/\d/', $password);
        $special = preg_match('/[\W_]/, $password');

        if ($length && $uppercase && $lowercase && $digit && $special) {
            return true;
        }
        else {
            echo "Hasło musi zawierać \n";
            if (!$length) echo "co najmniej 8 znaków \n";
            if (!$uppercase) echo "co najmniej 1 dużą literę \n";
            if (!$lowercase) echo "co najmniej 1 małą literę \n";
            if (!$digit) echo "co najmniej 1 cyfrę \n";
            if (!$special) echo "co najmniej 1 znak specjalny \n";
            return false;

        }
    }
}

?>