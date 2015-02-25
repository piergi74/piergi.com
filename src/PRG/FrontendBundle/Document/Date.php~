<?php

namespace PRG\FrontendBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
class Date
{
  /**
   * @MongoDB\Field(type="int")
   */
  protected $month;

  /**
   * @MongoDB\Field(type="int")
   */
  protected $year;

  public function __construct($values)
  {
    if(isset($values['month'])) {
      $this->month = $values['month'];
    }
    if(isset($values['year'])) {
      $this->year = $values['year'];
    }
  }
  
    /**
     * Set month
     *
     * @param int $month
     * @return self
     */
    public function setMonth($month)
    {
        $this->month = $month;
        return $this;
    }

    /**
     * Get month
     *
     * @return int $month
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set year
     *
     * @param int $year
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * Get year
     *
     * @return int $year
     */
    public function getYear()
    {
        return $this->year;
    }
}
