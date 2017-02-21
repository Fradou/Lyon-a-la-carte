<?php

namespace CarteBundle\Entity;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $circuitnotations;

    /**
     * @var \CarteBundle\Entity\Position
     */
    private $position;

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
     * Constructor
     */
    public function __construct()
    {
        $this->circuitnotations = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set position
     *
     * @param \CarteBundle\Entity\Position $position
     * @return User
     */
    public function setPosition(\CarteBundle\Entity\Position $position = null)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return \CarteBundle\Entity\Position 
     */
    public function getPosition()
    {
        return $this->position;
    }
}
