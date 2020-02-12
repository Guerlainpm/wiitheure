<?php

namespace App\Models;

class Wiit
  {
    private $content;
    private $create_at;
    private $citation;
    private $id;
    private $user_id;

    public function constructor($content, $create_at, $citation, $id, $user_id) {
        $this->content = $content;
        $this->created_at = $create_at;
        $this->citation = $citation;
        $this->id = $id;
        $this->user_id = $user_id;
    }
    /**
     * Get the value of Content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of Content
     *
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of Created At
     *
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of Created At
     *
     * @param mixed $created_at
     *
     * @return self
     */
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * Get the value of Citation
     *
     * @return mixed
     */
    public function getCitation()
    {
        return $this->citation;
    }

    /**
     * Set the value of Citation
     *
     * @param mixed $citation
     *
     * @return self
     */
    public function setCitation($citation)
    {
        $this->citation = $citation;

        return $this;
    }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of User Id
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of User Id
     *
     * @param mixed $user_id
     *
     * @return self
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

}
