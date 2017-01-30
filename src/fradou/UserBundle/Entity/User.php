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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notations;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $circuitnotations;


    /**
     * Add notations
     *
     * @param \CarteBundle\Entity\Notation $notations
     * @return User
     */
    public function addNotation(\CarteBundle\Entity\Notation $notations)
    {
        $this->notations[] = $notations;

        return $this;
    }

    /**
     * Remove notations
     *
     * @param \CarteBundle\Entity\Notation $notations
     */
    public function removeNotation(\CarteBundle\Entity\Notation $notations)
    {
        $this->notations->removeElement($notations);
    }

    /**
     * Get notations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotations()
    {
        return $this->notations;
    }

    /**
     * Add circuitnotations
     *
     * @param \CarteBundle\Entity\Circuitnotation $circuitnotations
     * @return User
     */
    public function addCircuitnotation(\CarteBundle\Entity\Circuitnotation $circuitnotations)
    {
        $this->circuitnotations[] = $circuitnotations;

        return $this;
    }

    /**
     * Remove circuitnotations
     *
     * @param \CarteBundle\Entity\Circuitnotation $circuitnotations
     */
    public function removeCircuitnotation(\CarteBundle\Entity\Circuitnotation $circuitnotations)
    {
        $this->circuitnotations->removeElement($circuitnotations);
    }

    /**
     * Get circuitnotations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCircuitnotations()
    {
        return $this->circuitnotations;
    }
}
