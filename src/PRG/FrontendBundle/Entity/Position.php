<?php

namespace PRG\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Gedmo\Mapping\Annotation as Gedmo;

use Sonata\TranslationBundle\Model\Gedmo\AbstractTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
/**
 * Position
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Position extends AbstractTranslatable implements TranslatableInterface
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $isCurrent;    
    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string")
     */
    protected $title;
    /**
     * @ORM\Column(type="string", length=10000)
     */
    protected $summary;
    
    /**
     * @ORM\OneToOne(targetEntity="Location", mappedBy="position", cascade={"persist"})
     */
    protected $location;    
    
    /**
     * @ORM\OneToOne(targetEntity="Company", mappedBy="position", cascade={"persist", "remove"})
     */
    protected $company;   
    
    /**
     * @ORM\Column(type="date")
     */
    protected $startDate;    
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $endDate;     
    
    /**
     * @ORM\ManyToMany(targetEntity="Skill", mappedBy="position", cascade={"persist", "remove"})
     */
    protected $skills;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="positions")
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
     * Set user
     *
     * @param \PRG\FrontendBundle\Entity\User $user
     * @return Position
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
     * @return Position
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
     * Set isCurrent
     *
     * @param boolean $isCurrent
     * @return Position
     */
    public function setIsCurrent($isCurrent)
    {
        $this->isCurrent = $isCurrent;

        return $this;
    }

    /**
     * Get isCurrent
     *
     * @return boolean 
     */
    public function getIsCurrent()
    {
        return $this->isCurrent;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Position
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Position
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set location
     *
     * @param \PRG\FrontendBundle\Entity\Location $location
     * @return Position
     */
    public function setLocation(\PRG\FrontendBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \PRG\FrontendBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Position
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Position
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set company
     *
     * @param \PRG\FrontendBundle\Entity\Company $company
     * @return Position
     */
    public function setCompany(\PRG\FrontendBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \PRG\FrontendBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add skills
     *
     * @param \PRG\FrontendBundle\Entity\Skill $skills
     * @return Position
     */
    public function addSkill(\PRG\FrontendBundle\Entity\Skill $skills)
    {
        $this->skills[] = $skills;
        $skills->addPosition($this); // This line is important for Sonata.
        return $this;
    }

    /**
     * Remove skills
     *
     * @param \PRG\FrontendBundle\Entity\Skill $skills
     */
    public function removeSkill(\PRG\FrontendBundle\Entity\Skill $skills)
    {
        $this->skills->removeElement($skills);
        $skills->removePosition($this); // This line is important for Sonata.
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSkills()
    {
        return $this->skills;
    }
    
    public function __toString()
    {
        return $this->title;
    }      
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }        
}
