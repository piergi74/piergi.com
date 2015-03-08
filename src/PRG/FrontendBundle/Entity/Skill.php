<?php

namespace PRG\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

use Sonata\TranslationBundle\Model\Gedmo\AbstractTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;

/**
 * Skill
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Skill extends AbstractTranslatable implements TranslatableInterface
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
    protected $linkedinId;    
    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string")
     */
    protected $name;
 
    
    /**
     * @ORM\ManyToMany(targetEntity="Position", inversedBy="skills")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     */
    protected $position;    
    
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="skills")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    protected $locale;  
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->position = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set linkedinId
     *
     * @param string $linkedinId
     * @return Skill
     */
    public function setLinkedinId($linkedinId)
    {
        $this->linkedinId = $linkedinId;

        return $this;
    }

    /**
     * Get linkedinId
     *
     * @return string 
     */
    public function getLinkedinId()
    {
        return $this->linkedinId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Skill
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
     * Add position
     *
     * @param \PRG\FrontendBundle\Entity\Position $position
     * @return Skill
     */
    public function addPosition(\PRG\FrontendBundle\Entity\Position $position)
    {
        $this->position[] = $position;

        return $this;
    }

    /**
     * Remove position
     *
     * @param \PRG\FrontendBundle\Entity\Position $position
     */
    public function removePosition(\PRG\FrontendBundle\Entity\Position $position)
    {
        $this->position->removeElement($position);
    }

    /**
     * Get position
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set user
     *
     * @param \PRG\FrontendBundle\Entity\User $user
     * @return Skill
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
    
    public function __toString()
    {
        return $this->name;
    }        
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }           
}
