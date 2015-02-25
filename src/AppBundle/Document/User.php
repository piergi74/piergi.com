<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of User
 *
 * @author PRG
 */
/**
 * @MongoDB\Document
 */
class User {
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $linkedinId;
    /**
     * @MongoDB\String
     */
    protected $firstName;
    /**
     * @MongoDB\String
     */
    protected $lastName;
    /**
     * @MongoDB\String
     */
    protected $industry;
    /**
     * @MongoDB\Timestamp
     */
    protected $lastModifiedTimestamp;
    /**
     * @MongoDB\String
     */
    protected $pictureUrl;    
    

    /**
     * @MongoDB\Collection
     */
    protected $educations;       
    /**
     * @MongoDB\Collection
     */
    protected $languages;   
    /**
     * @MongoDB\Collection
     */
    protected $positions;   
    /**
     * @MongoDB\Collection
     */
    protected $skills;    
    
    
    
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
     * Set firstName
     *
     * @param string $firstName
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set industry
     *
     * @param string $industry
     * @return self
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;
        return $this;
    }

    /**
     * Get industry
     *
     * @return string $industry
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * Set lastModifiedTimestamp
     *
     * @param timestamp $lastModifiedTimestamp
     * @return self
     */
    public function setLastModifiedTimestamp($lastModifiedTimestamp)
    {
        $this->lastModifiedTimestamp = $lastModifiedTimestamp;
        return $this;
    }

    /**
     * Get lastModifiedTimestamp
     *
     * @return timestamp $lastModifiedTimestamp
     */
    public function getLastModifiedTimestamp()
    {
        return $this->lastModifiedTimestamp;
    }

    /**
     * Set pictureUrl
     *
     * @param string $pictureUrl
     * @return self
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->pictureUrl = $pictureUrl;
        return $this;
    }

    /**
     * Get pictureUrl
     *
     * @return string $pictureUrl
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * Set educations
     *
     * @param collection $educations
     * @return self
     */
    public function setEducations($educations)
    {
        $this->educations = $educations;
        return $this;
    }

    /**
     * Get educations
     *
     * @return collection $educations
     */
    public function getEducations()
    {
        return $this->educations;
    }

    /**
     * Set languages
     *
     * @param collection $languages
     * @return self
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
        return $this;
    }

    /**
     * Get languages
     *
     * @return collection $languages
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set positions
     *
     * @param collection $positions
     * @return self
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;
        return $this;
    }

    /**
     * Get positions
     *
     * @return collection $positions
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * Set skills
     *
     * @param collection $skills
     * @return self
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * Get skills
     *
     * @return collection $skills
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set linkedinId
     *
     * @param string $linkedinId
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
     * @return string $linkedinId
     */
    public function getLinkedinId()
    {
        return $this->linkedinId;
    }
}
