<?php

namespace PRG\FrontendBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
class Location
{
  /** @MongoDB\EmbedOne(targetDocument="Country") */
  protected $country;

  /**
   * @MongoDB\String
   */
  protected $name;

  public function __construct($values)
  {
    if(isset($values['country'])) {
      $this->country = new Country($values['country']);
    }
    if(isset($values['name'])) {
      $this->name = $values['name'];
    }
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
}
