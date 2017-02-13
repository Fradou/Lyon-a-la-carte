<?php

namespace CarteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Circuitnotation
 */
class Circuitnotation
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
     * @var string
     */
    private $status;

    /**
     * @var integer
     */
    private $experience;

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
     * Set rating
     *
     * @param integer $rating
     * @return Circuitnotation
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
     * @return Circuitnotation
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
     * Set status
     *
     * @param string $status
     * @return Circuitnotation
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set experience
     *
     * @param integer $experience
     * @return Circuitnotation
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return integer 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set circuit
     *
     * @param \CarteBundle\Entity\Circuit $circuit
     * @return Circuitnotation
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
}
