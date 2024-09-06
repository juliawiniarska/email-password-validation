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
        return strlen($password) >= 8;
    }
}

?>