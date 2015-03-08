<?php

namespace PRG\FrontendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
  // Fields to be shown on create/edit forms
  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
          ->add('firstName', 'text', array('label' => 'Post First name'))
          ->add('lastName', 'text', array('label' => 'Post Last name'))
          ->add('industry') //if no type is specified, SonataAdminBundle tries to guess it
          ->add('summary', 'textarea')
      ;
  }

  // Fields to be shown on filter forms
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
      $datagridMapper
          ->add('firstName')
          ->add('lastName')
      ;
  }

  // Fields to be shown on lists
  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->addIdentifier('firstName')
          ->add('lastName')
          ->add('industry')
      ;
  }
}
