<?php

namespace PRG\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Company
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     * @ORM\OneToOne(targetEntity="Position", inversedBy="company")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     */
    protected $position;


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
     * @return Company
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
     * Set position
     *
     * @param \PRG\FrontendBundle\Entity\Position $position
     * @return Company
     */
    public function setPosition(\PRG\FrontendBundle\Entity\Position $position = null)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return \PRG\FrontendBundle\Entity\Position 
     */
    public function getPosition()
    {
        return $this->position;
    }
}
