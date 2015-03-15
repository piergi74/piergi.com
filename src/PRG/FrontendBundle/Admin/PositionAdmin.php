<?php

namespace PRG\FrontendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PositionAdmin extends Admin
{
  // Fields to be shown on create/edit forms
  protected function configureFormFields(FormMapper $formMapper)
  {
    $years = array();
    for ($y = date('Y') -25; $y <= date('Y');) {
      $years[] = $y;
      $y++;
    }    
    $formMapper
      ->add('linkedinId', 'text', array('label' => 'Post Linkedin Id'))
      ->add('isCurrent', null, array('label' => 'Is current'))
      ->add('title', 'text', array('label' => 'Post Title'))
      ->add('summary', 'textarea', array('label' => 'Post Summary'))
      ->add('user', 'entity', array('class' => 'PRG\FrontendBundle\Entity\User'))
      ->add('startDate', 'date', array('label' => 'Post Start date', 'pattern' => 'dd MMM Y G', 'years' => $years))
      ->add('endDate', 'date', array('label' => 'Post End date', 'empty_value' => '', 'required' => false, 'years' => $years))
      ->add('skills', 'sonata_type_model', array('expanded' => false, 'by_reference' => false, 'multiple' => true, 'required' => false))
    ;
  }

  // Fields to be shown on filter forms
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
      $datagridMapper
          ->add('isCurrent')
      ;
  }

  // Fields to be shown on lists
  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->addIdentifier('linkedinId')
          ->add('isCurrent')
          ->add('title')
          ->add('user')
          ->add('startDate', null, array('format' => 'M Y'))
          ->add('endDate', null, array('format' => 'M Y'))
          ->add('skills')
      ;
  }
}
