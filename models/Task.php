<?php

namespace Models;

class Task
{
    protected $id;
    protected $username;
    protected $email;
    protected $description;
    protected $status_id;

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStatusId()
    {
        return $this->status_id;
    }
}

