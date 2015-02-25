<?php

namespace PRG\FrontendBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
class Country
{
  /**
   * @MongoDB\String
   */
  protected $code;

  /**
   * @MongoDB\String
   */
  protected $name;

  public function __construct($values)
  {
    if(isset($values['code'])) {
      $this->code = $values['code'];
    }
    if(isset($values['name'])) {
      $this->name = $values['name'];
    }
  }


    /**
     * Set code
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get code
     *
     * @return string $code
     */
    public function getCode()
    {
        return $this->code;
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
