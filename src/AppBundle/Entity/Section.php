<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 *
 * @ORM\Table(name="section")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SectionRepository")
 */
class Section
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Tavern", mappedBy="section")
     */
    private $electrical;


    public function __toString()
    {
        return $this->id ? $this->name : 'New Section';
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
     * @return Section
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
     * @param \AppBundle\Entity\Tavern $electrical
     *
     * @return Section
     */
    public function addElectrical(\AppBundle\Entity\Tavern $electrical)
    {
        $this->electrical[] = $electrical;

        return $this;
    }

    /**
     * Remove electrical
     *
     * @param \AppBundle\Entity\Tavern $electrical
     */
    public function removeElectrical(\AppBundle\Entity\Tavern $electrical)
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
}
