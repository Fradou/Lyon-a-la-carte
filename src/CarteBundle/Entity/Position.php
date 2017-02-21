<?php

namespace CarteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Position
 */
class Position
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $pos;

    /**
     * @var \CarteBundle\Entity\Location
     */
    private $location;

    /**
     * @var \CarteBundle\Entity\Circuit
     */
    private $circuit;


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
     * Set pos
     *
     * @param integer $pos
     * @return Position
     */
    public function setPos($pos)
    {
        $this->pos = $pos;

        return $this;
    }

    /**
     * Get pos
     *
     * @return integer 
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * Set location
     *
     * @param \CarteBundle\Entity\Location $location
     * @return Position
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
     * Set circuit
     *
     * @param \CarteBundle\Entity\Circuit $circuit
     * @return Position
     */
    public function setCircuit(\CarteBundle\Entity\Circuit $circuit = null)
    {
        $this->circuit = $circuit;

        return $this;
    }

    /**
     * Get circuit
     *
     * @return \CarteBundle\Entity\Circuit 
     */
    public function getCircuit()
    {
        return $this->circuit;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add users
     *
     * @param \CarteBundle\Entity\User $users
     * @return Position
     */
    public function addUser(\CarteBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \CarteBundle\Entity\User $users
     */
    public function removeUser(\CarteBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
