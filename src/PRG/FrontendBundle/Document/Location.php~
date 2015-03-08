<?php

namespace PRG\FrontendBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/** @MongoDB\EmbeddedDocument */
class Location implements Translatable {
  
  /**
   * @MongoDB\Id
   */
  protected $id;
  
  /**
   * @MongoDB\Field(type="int")
   */
  protected $linkedinId;  
  
  /** @MongoDB\EmbedOne(targetDocument="Country") */
  protected $country;

  /**
   * @Gedmo\Translatable
   * @MongoDB\String
   */
  protected $name;

  /**
   * @Gedmo\Locale
   * Used locale to override Translation listener`s locale
   * this is not a mapped field of entity metadata, just a simple property
   */
  private $locale;  
    
  public function __construct($values)
  {
    if(isset($values['linkedinId'])) {
      $this->linkedinId = $values['linkedinId'];
    }
    if(isset($values['country'])) {
      $this->country = new Country($values['country']);
    }
    if(isset($values['name'])) {
      $this->name = $values['name'];
    }
    $this->setTranslatableLocale('it');
  }


    /**
     * Set country
     *
     * @param PRG\FrontendBundle\Document\Country $country
     * @return self
     */
    public function setCountry(\PRG\FrontendBundle\Document\Country $country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get country
     *
     * @return PRG\FrontendBundle\Document\Country $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }        

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set linkedinId
     *
     * @param int $linkedinId
     * @return self
     */
    public function setLinkedinId($linkedinId)
    {
        $this->linkedinId = $linkedinId;
        return $this;
    }

    /**
     * Get linkedinId
     *
     * @return int $linkedinId
     */
    public function getLinkedinId()
    {
        return $this->linkedinId;
    }
}
