<?php
namespace AppBundle\Form\Type\Movie;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MovieReviewFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('movie', null, [
                'required' => false,
                'expanded' => false,
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('m')
                    ;

                    return $qb;
                },
            ])
            ->add('review', 'choice', [
                'choices'   => [
                    '1'   => '1',
                    '2'   => '2',
                    '3'   => '3',
                    '4'   => '4',
                    '5'   => '5',
                ],
                'label' => 'Note',
                'multiple'  => false,
                'expanded' => true,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Movie\MovieReview',
            'csrf_protection' => false,
        ]);
    }

    public function getName()
    {
        return 'review_form';
    }
}