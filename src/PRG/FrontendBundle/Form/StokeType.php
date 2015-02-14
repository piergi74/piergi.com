<?php

namespace PRG\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class StokeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder->add('name', 'text', array('label' => 'Titolo', 'required' => false))
        ->add('quantity', 'integer')
        ->add('buying_price', 'number', array('label' => 'Prezzo di acquisto', 'precision' => 4))
        ->add('selling_price', 'text', array(
            'label' => 'Prezzo di vendita', 
            //'precision' => 4,
            'constraints' => array(
                new NotBlank(array('message' => 'custom message from Piergi')),
                new Type(array(
                  'type'    => 'numeric',
                  'message' => 'The value {{ value }} is not a valid {{ type }}.',
                ))              
              )
            ))
        //->add('total_amount', 'money', array('label' => 'Somma investita'))
        ->add('calculate', 'submit')
        ->add('saveInSession', 'submit', array('label' => 'Save in session'))     
      ;
    }

    public function getName()
    {
        return 'stoke';
    }
}
