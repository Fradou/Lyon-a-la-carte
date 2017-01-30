<?php

namespace fradou\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $language;


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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return User
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $circuits;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->circuits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add circuits
     *
     * @param \CarteBundle\Entity\Circuit $circuits
     * @return User
     */
    public function addCircuit(\CarteBundle\Entity\Circuit $circuits)
    {
        $this->circuits[] = $circuits;

        return $this;
    }

    /**
     * Remove circuits
     *
     * @param \CarteBundle\Entity\Circuit $circuits
     */
    public function removeCircuit(\CarteBundle\Entity\Circuit $circuits)
    {
        $this->circuits->removeElement($circuits);
    }

    /**
     * Get circuits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCircuits()
    {
        return $this->circuits;
    }
}