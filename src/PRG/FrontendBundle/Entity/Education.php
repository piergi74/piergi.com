<?php

namespace PRG\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

use Sonata\TranslationBundle\Model\Gedmo\AbstractTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
/**
 * Education
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Education extends AbstractTranslatable implements TranslatableInterface
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
     * @ORM\Column(type="string", length=100)
     */
    protected $degree;
    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", nullable=true)
     */
    protected $fieldOfStudy;
    /**
     * @ORM\Column(type="string")
     */
    protected $schoolName;
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $startDate;    
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $endDate;     
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="educations")
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
     * Set degree
     *
     * @param string $degree
     * @return Education
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;

        return $this;
    }

    /**
     * Get degree
     *
     * @return string 
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * Set fieldOfStudy
     *
     * @param string $fieldOfStudy
     * @return Education
     */
    public function setFieldOfStudy($fieldOfStudy)
    {
        $this->fieldOfStudy = $fieldOfStudy;

        return $this;
    }

    /**
     * Get fieldOfStudy
     *
     * @return string 
     */
    public function getFieldOfStudy()
    {
        return $this->fieldOfStudy;
    }

    /**
     * Set schoolName
     *
     * @param string $schoolName
     * @return Education
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    /**
     * Get schoolName
     *
     * @return string 
     */
    public function getSchoolName()
    {
        return $this->schoolName;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Education
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
     * @return Education
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
     * Set user
     *
     * @param \PRG\FrontendBundle\Entity\User $user
     * @return Education
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
     * Set linkedinId
     *
     * @param string $linkedinId
     * @return Education
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
    
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }           
}
