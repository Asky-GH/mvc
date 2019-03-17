<?php

class User
{
    protected $id;
    protected $username;
    protected $password;
    
    public function getPassword()
    {
        return $this->password;
    }
}

