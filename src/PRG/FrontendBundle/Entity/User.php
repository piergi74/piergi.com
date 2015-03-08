<?php

namespace PRG\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Gedmo\Mapping\Annotation as Gedmo;
//use Gedmo\Translatable\Translatable;

use Sonata\TranslationBundle\Model\Gedmo\AbstractTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User extends AbstractTranslatable implements TranslatableInterface
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
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $firstName;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $lastName;
    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", length=10000, nullable=true)
     */
    private $summary;
    
    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $industry;
    
    /** @ORM\Column(type="time", name="last_modified_timestamp", nullable=true) */
    protected $lastModifiedTimestamp;    

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $pictureUrl;
    
    /**
     * @ORM\OneToMany(targetEntity="Position", mappedBy="user", cascade={"persist"})
     */
    protected $positions;
    /**
     * @ORM\OneToMany(targetEntity="Education", mappedBy="user", cascade={"persist"})
     */
    protected $educations;
    /**
     * @ORM\OneToMany(targetEntity="Language", mappedBy="user")
     */
    protected $languages;
    /**
     * @ORM\OneToMany(targetEntity="Skill", mappedBy="user", cascade={"persist"})
     */
    protected $skills;
    
    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    protected $locale;
    
    public function __construct()
    {
        $this->positions = new ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set linkedinId
     *
     * @param string $linkedinId
     * @return User
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
     * Set industry
     *
     * @param string $industry
     * @return User
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;

        return $this;
    }

    /**
     * Get industry
     *
     * @return string 
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * Set lastModifiedTimestamp
     *
     * @param \DateTime $lastModifiedTimestamp
     * @return User
     */
    public function setLastModifiedTimestamp($lastModifiedTimestamp)
    {
        $this->lastModifiedTimestamp = $lastModifiedTimestamp;

        return $this;
    }

    /**
     * Get lastModifiedTimestamp
     *
     * @return \DateTime 
     */
    public function getLastModifiedTimestamp()
    {
        return $this->lastModifiedTimestamp;
    }

    /**
     * Add positions
     *
     * @param \PRG\FrontendBundle\Entity\Position $positions
     * @return User
     */
    public function addPosition(\PRG\FrontendBundle\Entity\Position $positions)
    {
        $this->positions[] = $positions;

        return $this;
    }

    /**
     * Remove positions
     *
     * @param \PRG\FrontendBundle\Entity\Position $positions
     */
    public function removePosition(\PRG\FrontendBundle\Entity\Position $positions)
    {
        $this->positions->removeElement($positions);
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

    /**
     * Set pictureUrl
     *
     * @param string $pictureUrl
     * @return User
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;

        return $this;
    }

    /**
     * Get pictureUrl
     *
     * @return string 
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * Add educations
     *
     * @param \PRG\FrontendBundle\Entity\Education $educations
     * @return User
     */
    public function addEducation(\PRG\FrontendBundle\Entity\Education $educations)
    {
        $this->educations[] = $educations;

        return $this;
    }

    /**
     * Remove educations
     *
     * @param \PRG\FrontendBundle\Entity\Education $educations
     */
    public function removeEducation(\PRG\FrontendBundle\Entity\Education $educations)
    {
        $this->educations->removeElement($educations);
    }

    /**
     * Get educations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEducations()
    {
        return $this->educations;
    }

    /**
     * Add languages
     *
     * @param \PRG\FrontendBundle\Entity\Language $languages
     * @return User
     */
    public function addLanguage(\PRG\FrontendBundle\Entity\Language $languages)
    {
        $this->languages[] = $languages;

        return $this;
    }

    /**
     * Remove languages
     *
     * @param \PRG\FrontendBundle\Entity\Language $languages
     */
    public function removeLanguage(\PRG\FrontendBundle\Entity\Language $languages)
    {
        $this->languages->removeElement($languages);
    }

    /**
     * Get languages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Add skills
     *
     * @param \PRG\FrontendBundle\Entity\Skill $skills
     * @return User
     */
    public function addSkill(\PRG\FrontendBundle\Entity\Skill $skills)
    {
        $this->skills[] = $skills;

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
    
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }    

    /**
     * Set summary
     *
     * @param string $summary
     * @return User
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
    
    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName;
    }    
}
