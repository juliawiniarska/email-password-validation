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
        
        return $length && $uppercase && $lowercase && $digit && $special;
    }
}

?>