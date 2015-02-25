<?php

namespace PRG\FrontendBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
class Company
{
  /**
   * @MongoDB\Field(type="int")
   */
  protected $id;

  /**
   * @MongoDB\String
   */
  protected $name;

  public function __construct($values)
  {
    if(isset($values['id'])) {
      $this->id = $values['id'];
    }
    if(isset($values['name'])) {
      $this->name = $values['name'];
    }
  }


    /**
     * Set id
     *
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
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
