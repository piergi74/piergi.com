<?php

namespace PRG\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Language
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Language
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
     * @ORM\Column(type="string", length=100)
     */
    protected $name;
    /**
     * @ORM\Column(type="string")
     */
    protected $proficiencyLevel;
    /**
     * @ORM\Column(type="string")
     */
    protected $proficiencyName;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="languages")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;


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
     * @return Language
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
     * Set proficiencyLevel
     *
     * @param string $proficiencyLevel
     * @return Language
     */
    public function setProficiencyLevel($proficiencyLevel)
    {
        $this->proficiencyLevel = $proficiencyLevel;

        return $this;
    }

    /**
     * Get proficiencyLevel
     *
     * @return string 
     */
    public function getProficiencyLevel()
    {
        return $this->proficiencyLevel;
    }

    /**
     * Set proficiencyName
     *
     * @param string $proficiencyName
     * @return Language
     */
    public function setProficiencyName($proficiencyName)
    {
        $this->proficiencyName = $proficiencyName;

        return $this;
    }

    /**
     * Get proficiencyName
     *
     * @return string 
     */
    public function getProficiencyName()
    {
        return $this->proficiencyName;
    }

    /**
     * Set user
     *
     * @param \PRG\FrontendBundle\Entity\User $user
     * @return Language
     */
    public function setUser(\PRG\FrontendBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \PRG\FrontendBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
