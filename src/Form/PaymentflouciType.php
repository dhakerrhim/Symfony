<?php

namespace App\Form;

use App\Entity\Paymentflouci;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentflouciType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montant')
            ->add('transaction_id')
            ->add('Payment_status')
            ->add('location_id')
            ->add('client_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paymentflouci::class,
        ]);
    }
}
