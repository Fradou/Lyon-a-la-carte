<?php

namespace CarteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Circuit
 */
class Circuit
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $cost;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $circuitnotations;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $positions;

    /**
     * @var integer
     */
    private $steps;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->circuitnotations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->positions = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     * @return Circuit
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Circuit
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Circuit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set cost
     *
     * @param float $cost
     * @return Circuit
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Add circuitnotations
     *
     * @param \CarteBundle\Entity\Circuitnotation $circuitnotations
     * @return Circuit
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
     * Add positions
     *
     * @param \CarteBundle\Entity\Position $position
     * @return Circuit
     */
    public function addPosition(\CarteBundle\Entity\Position $position)
    {
        $this->positions->add($position);

        return $this;
    }

    /**
     * Remove positions
     *
     * @param \CarteBundle\Entity\Position $position
     */
    public function removePosition(\CarteBundle\Entity\Position $position)
    {
        $this->positions->removeElement($position);
    }

    /**
     * Get positions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPositions()
    {
        return $this->positions;
    }

    public function __toString()
    {
        return strval($this->id);
    }

    /**
     * Set steps
     *
     * @param integer $steps
     * @return Circuit
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;

        return $this;
    }

    /**
     * Get steps
     *
     * @return integer 
     */
    public function getSteps()
    {
        return $this->steps;
    }
}
