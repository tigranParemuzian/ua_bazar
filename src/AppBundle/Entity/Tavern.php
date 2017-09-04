<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tavern
 *
 * @ORM\Table(name="tavern")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TavernRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Tavern
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="m_name", type="string", length=255, name="true")
     */
    private $mName;

    /**
     *
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ElectricalReview", mappedBy="tavern")
     */
    private $electrical;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Section", inversedBy="electrical")
     * @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     */
    private $section;

    /**
     * @var
     * @ORM\Column(name="number", type="float")
     * @Assert\NotNull(message="number can`t be null")
     */
    private $number;


    public function __toString()
    {
        return $this->id ? $this->section . ' ' . $this->name : 'New Tavern';
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
     * Set name
     *
     * @param string $name
     *
     * @return Tavern
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
     * Constructor
     */
    public function __construct()
    {
        $this->electrical = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add electrical
     *
     * @param \AppBundle\Entity\ElectricalReview $electrical
     *
     * @return Tavern
     */
    public function addElectrical(\AppBundle\Entity\ElectricalReview $electrical)
    {
        $this->electrical[] = $electrical;

        return $this;
    }

    /**
     * Remove electrical
     *
     * @param \AppBundle\Entity\ElectricalReview $electrical
     */
    public function removeElectrical(\AppBundle\Entity\ElectricalReview $electrical)
    {
        $this->electrical->removeElement($electrical);
    }

    /**
     * Get electrical
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getElectrical()
    {
        return $this->electrical;
    }

    /**
     * Set section
     *
     * @param \AppBundle\Entity\Section $section
     *
     * @return Tavern
     */
    public function setSection(\AppBundle\Entity\Section $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \AppBundle\Entity\Section
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @return string
     */
    public function getMName(): string
    {
        return $this->mName;
    }

    /**
     * @param string $mName
     */
    public function setMName(string $mName)
    {
        $this->mName = $mName;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
}
