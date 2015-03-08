<?php

namespace PRG\FrontendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EducationAdmin extends Admin
{
  // Fields to be shown on create/edit forms
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->add('linkedinId', 'text', array('label' => 'Post Linkedin Id'))
      ->add('degree', 'text', array('label' => 'Post Degree'))
      ->add('fieldOfStudy', 'textarea', array('label' => 'Post Field of Study'))
      ->add('schoolName', 'textarea', array('label' => 'Post School Name'))
      ->add('user', 'entity', array('class' => 'PRG\FrontendBundle\Entity\User'))
      ->add('startDate', 'date', array('label' => 'Post Start date', 'pattern' => 'dd MMM Y G'))
      ->add('endDate', 'date', array('label' => 'Post End date', 'empty_value' => '', 'required' => false))
    ;
  }

  // Fields to be shown on filter forms
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
      $datagridMapper
          ->add('user')
      ;
  }

  // Fields to be shown on lists
  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->addIdentifier('linkedinId')
          ->add('degree')
          ->add('fieldOfStudy')
          ->add('schoolName')
          ->add('user')
          ->add('startDate')
          ->add('endDate')
          
      ;
  }
}
