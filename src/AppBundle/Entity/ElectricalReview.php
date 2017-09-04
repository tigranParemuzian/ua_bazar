<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ElectricalReview
 *
 * @ORM\Table(name="electrical_review")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ElectricalReviewRepository")
 */
class ElectricalReview
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="review_date", type="datetime")
     */
    private $reviewDate;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="difference", type="string", length=255)
     */
    private $difference;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tavern", inversedBy="electrical")
     * @ORM\JoinColumn(name="tavern_id", referencedColumnName="id")
     */
    private $tavern;


    public function __toString()
    {
        return $this->id ? $this->value : 'New El data';
        // TODO: Implement __toString() method.
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reviewDate
     *
     * @param \DateTime $reviewDate
     *
     * @return ElectricalReview
     */
    public function setReviewDate($reviewDate)
    {
        $this->reviewDate = $reviewDate;

        return $this;
    }

    /**
     * Get reviewDate
     *
     * @return \DateTime
     */
    public function getReviewDate()
    {
        return $this->reviewDate;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return ElectricalReview
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return ElectricalReview
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set difference
     *
     * @param string $difference
     *
     * @return ElectricalReview
     */
    public function setDifference($difference)
    {
        $this->difference = $difference;

        return $this;
    }

    /**
     * Get difference
     *
     * @return string
     */
    public function getDifference()
    {
        return $this->difference;
    }

    /**
     * Set tavern
     *
     * @param \AppBundle\Entity\Tavern $tavern
     *
     * @return ElectricalReview
     */
    public function setTavern(\AppBundle\Entity\Tavern $tavern = null)
    {
        $this->tavern = $tavern;

        return $this;
    }

    /**
     * Get tavern
     *
     * @return \AppBundle\Entity\Tavern
     */
    public function getTavern()
    {
        return $this->tavern;
    }
}
