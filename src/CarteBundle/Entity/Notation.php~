<?php

namespace CarteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notation
 */
class Notation
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $rating;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \CarteBundle\Entity\Location
     */
    private $location;

    /**
     * @var \fradou\UserBundle\Entity\User
     */
    private $user;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Notation
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Notation
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set location
     *
     * @param \CarteBundle\Entity\Location $location
     * @return Notation
     */
    public function setLocation(\CarteBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \CarteBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set user
     *
     * @param \fradou\UserBundle\Entity\User $user
     * @return Notation
     */
    public function setUser(\fradou\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \fradou\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
