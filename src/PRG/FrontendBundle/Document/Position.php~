<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PRG\FrontendBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
class Position
{
  /**
   * @MongoDB\Id
   */
  protected $id;

  /**
   * @MongoDB\Field(type="int")
   */
  protected $linkedinId;
  /**
   * @MongoDB\Boolean
   */
  protected $isCurrent;
  
  /**
   * @MongoDB\String
   */
  protected $title;
  
  /**
   * @MongoDB\String
   */
  protected $summary;
    
  /** @MongoDB\EmbedOne(targetDocument="Company") */
  private $company;    
  
  /** @MongoDB\EmbedOne(targetDocument="Location") */
  private $location;    

  /** @MongoDB\EmbedOne(targetDocument="Date") */
  private $startDate;    
    
  /** @MongoDB\EmbedOne(targetDocument="Date") */
  private $endDate;    
 
  /**
   * @MongoDB\Collection
   */
  protected $tags;      
  
  public function __construct($values)
  {
      $this->linkedinId = $values['id'];
      $this->isCurrent = $values['isCurrent'];
      $this->title = $values['title'];
      $this->summary = $values['summary'];
      if(isset($values['company'])) {
        $this->company = new Company($values['company']);
      }
      if(isset($values['location'])) {
        $this->location = new Location($values['location']);
      }
      if(isset($values['startDate'])) {
        $this->startDate = new Date($values['startDate']);
      }
      if(isset($values['endDate'])) {
        $this->endDate = new Date($values['endDate']);
      }      

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
     * Set isCurrent
     *
     * @param boolean $isCurrent
     * @return self
     */
    public function setIsCurrent($isCurrent)
    {
        $this->isCurrent = $isCurrent;
        return $this;
    }

    /**
     * Get isCurrent
     *
     * @return boolean $isCurrent
     */
    public function getIsCurrent()
    {
        return $this->isCurrent;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return self
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * Get summary
     *
     * @return string $summary
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return self
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * Get company
     *
     * @return string $company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return self
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Get location
     *
     * @return string $location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set startDate
     *
     * @param string $startDate
     * @return self
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * Get startDate
     *
     * @return string $startDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param string $endDate
     * @return self
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * Get endDate
     *
     * @return string $endDate
     */
    public function getEndDate()
    {
        return $this->endDate;
    }



    /**
     * Get linkedinId
     *
     * @return integer $linkedinId
     */
    public function getLinkedinId() 
    {
        return $this->linkedinId;
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
     * Set tags
     *
     * @param collection $tags
     * @return self
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * Get tags
     *
     * @return collection $tags
     */
    public function getTags()
    {
        return $this->tags;
    }
}
