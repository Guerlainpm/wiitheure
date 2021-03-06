<?php

namespace App\Models;

class User {
    private $username;
    private $password;
    private $mail;
    private $create_at;
    private $bio;
    private $id;
    /**
     * Get the value of username
     */
    public function constructor($username, $password, $mail, $create_at, $bio, $id) {
        $this->username = $username;
        $this->password = $password;
        $this->mail = $mail;
        $this->create_at = $create_at;
        $this->bio = $bio;
        $this->id = $id;
    }
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return htmlspecialchars($this->password);
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return htmlspecialchars($this->mail);
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of create_at
     */
    public function getCreate_at()
    {
        return htmlspecialchars($this->create_at);
    }

    /**
     * Set the value of create_at
     *
     * @return  self
     */
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * Get the value of bio
     */
    public function getBio()
    {
        return htmlspecialchars($this->bio);
    }

    /**
     * Set the value of bio
     *
     * @return  self
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return htmlspecialchars($this->id);
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
