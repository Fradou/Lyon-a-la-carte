<?php

namespace CarteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Position
 */
class Position
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $pos;


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
     * @var \CarteBundle\Entity\Location
     */
    private $location;

    /**
     * @var \fradou\UserBundle\Entity\Circuit
     */
    private $circuit;


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
     * @param \fradou\UserBundle\Entity\Circuit $circuit
     * @return Position
     */
    public function setCircuit(\fradou\UserBundle\Entity\Circuit $circuit = null)
    {
        $this->circuit = $circuit;

        return $this;
    }

    /**
     * Get circuit
     *
     * @return \fradou\UserBundle\Entity\Circuit 
     */
    public function getCircuit()
    {
        return $this->circuit;
    }
}
