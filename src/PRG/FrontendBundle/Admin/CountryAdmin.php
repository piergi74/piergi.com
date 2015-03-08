<?php

namespace PRG\FrontendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CountryAdmin extends Admin
{
  // Fields to be shown on create/edit forms
  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
          ->add('name', 'text', array('label' => 'Post name'))
          ->add('code', 'text', array('label' => 'Post code'))    
          ->add('location', 'entity', array('class' => 'PRG\FrontendBundle\Entity\Location'))
      ;
  }

  // Fields to be shown on filter forms
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
      $datagridMapper
          ->add('name')
          ->add('code')
      ;
  }

  // Fields to be shown on lists
  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->addIdentifier('name')
          ->add('code')
          ->add('location')
      ;
  }
}
