<?php

namespace PRG\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

use Sonata\TranslationBundle\Model\Gedmo\AbstractTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
/**
 * Location
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Location extends AbstractTranslatable implements TranslatableInterface
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
     * @Gedmo\Translatable
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     * @ORM\OneToOne(targetEntity="Country", mappedBy="location", cascade={"persist", "remove"})
     */
    protected $country;    
    
    /**
     * @ORM\OneToOne(targetEntity="Position", inversedBy="location")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     */
    protected $position;

    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    protected $locale;   
    
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
     * @return Location
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
     * Set country
     *
     * @param \PRG\FrontendBundle\Entity\Country $country
     * @return Location
     */
    public function setCountry(\PRG\FrontendBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \PRG\FrontendBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set position
     *
     * @param \PRG\FrontendBundle\Entity\Position $position
     * @return Location
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
    public function __toString()
    {
        return $this->name;
    }        
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }            
}
