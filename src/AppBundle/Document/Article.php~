<?php
namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * @ODM\Document(collection="articles")
 */
class Article implements Translatable
{
    /**
     * @ODM\Id
     */
    private $id;

    /**
     * @Gedmo\Translatable
     * @ODM\String
     */
    private $title;

    /**
     * @ODM\String
     */
    private $code;

    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    private $locale;
    
    /**
     * @Gedmo\Slug(fields={"title", "code"})
     * @ODM\String
     */
    private $slug;

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * Set slug
     *
     * @param string $slug
     * @return Article
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }    

    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }    
}
