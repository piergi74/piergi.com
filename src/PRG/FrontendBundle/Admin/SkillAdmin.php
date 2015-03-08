<?php

namespace PRG\FrontendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SkillAdmin extends Admin
{
  // Fields to be shown on create/edit forms
  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
          ->add('linkedinId', 'text', array('label' => 'Post Linkedin Id'))
          ->add('user', 'entity', array('class' => 'PRG\FrontendBundle\Entity\User'))
          ->add('name', 'text', array('label' => 'Post name'))
          ->add('position', 'sonata_type_model', array('expanded' => true, 'by_reference' => false, 'multiple' => true))
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
          ->add('user')
          ->add('name')
          ->add('position')
      ;
  }
}
