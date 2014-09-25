<?php

namespace Clickbus\ExerciseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class WithdrawType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('amount', 'money',
		 array(
			   'currency' => 'MXN',
			   'attr' => array('class' => 'form-control input-lg'),
		 ));
    }

    public function getName()
    {
        return 'withdraw';
    }
   
} 