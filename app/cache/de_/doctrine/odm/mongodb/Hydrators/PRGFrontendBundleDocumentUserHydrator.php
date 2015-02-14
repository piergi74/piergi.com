<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class PRGFrontendBundleDocumentUserHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate($document, $data, array $hints = array())
    {
        $hydratedData = array();

        /** @Field(type="id") */
        if (isset($data['_id'])) {
            $value = $data['_id'];
            $return = $value instanceof \MongoId ? (string) $value : $value;
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['linkedinId'])) {
            $value = $data['linkedinId'];
            $return = (string) $value;
            $this->class->reflFields['linkedinId']->setValue($document, $return);
            $hydratedData['linkedinId'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['firstName'])) {
            $value = $data['firstName'];
            $return = (string) $value;
            $this->class->reflFields['firstName']->setValue($document, $return);
            $hydratedData['firstName'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['lastName'])) {
            $value = $data['lastName'];
            $return = (string) $value;
            $this->class->reflFields['lastName']->setValue($document, $return);
            $hydratedData['lastName'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['industry'])) {
            $value = $data['industry'];
            $return = (string) $value;
            $this->class->reflFields['industry']->setValue($document, $return);
            $hydratedData['industry'] = $return;
        }

        /** @Field(type="timestamp") */
        if (isset($data['lastModifiedTimestamp'])) {
            $value = $data['lastModifiedTimestamp'];
            $return = $value;
            $this->class->reflFields['lastModifiedTimestamp']->setValue($document, $return);
            $hydratedData['lastModifiedTimestamp'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['pictureUrl'])) {
            $value = $data['pictureUrl'];
            $return = (string) $value;
            $this->class->reflFields['pictureUrl']->setValue($document, $return);
            $hydratedData['pictureUrl'] = $return;
        }

        /** @Field(type="collection") */
        if (isset($data['educations'])) {
            $value = $data['educations'];
            $return = $value;
            $this->class->reflFields['educations']->setValue($document, $return);
            $hydratedData['educations'] = $return;
        }

        /** @Field(type="collection") */
        if (isset($data['languages'])) {
            $value = $data['languages'];
            $return = $value;
            $this->class->reflFields['languages']->setValue($document, $return);
            $hydratedData['languages'] = $return;
        }

        /** @Field(type="collection") */
        if (isset($data['positions'])) {
            $value = $data['positions'];
            $return = $value;
            $this->class->reflFields['positions']->setValue($document, $return);
            $hydratedData['positions'] = $return;
        }

        /** @Field(type="collection") */
        if (isset($data['skills'])) {
            $value = $data['skills'];
            $return = $value;
            $this->class->reflFields['skills']->setValue($document, $return);
            $hydratedData['skills'] = $return;
        }
        return $hydratedData;
    }
}