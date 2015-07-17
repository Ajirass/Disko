<?php
namespace AppBundle\Form\Type\User;

use AppBundle\Form\DataTransformer\User\UserPhotoToNumberTransformer;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserRegistrationFormType extends AbstractType
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new UserPhotoToNumberTransformer($this->em);

        $builder
            ->add(
                $builder->create('photo', 'hidden')
                        ->addModelTransformer($transformer)
            )
            ->add('firstName', null, ['required' => false])
            ->add('lastName', null, ['required' => false])
            ->add('moviesCategories', null, [
                'expanded' => true,
                'multiple' => true,
                'required' => true,
                'label'    => 'Genres préféré',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('c');
                    $qb->setMaxResults(6);

                    return $qb;
                },
            ])
            ->add('preferredMovie', null, [
                'expanded' => true,
                'multiple' => false,
                'required' => true,
                'label'    => 'Film préféré',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('m');
                    $qb->setMaxResults(4);

                    return $qb;
                },
            ])
            ->add('reviews', 'collection', [
                'type'         => 'review_form',
                'label'        => 'Notez un film',
                'allow_add'    => true,
                'allow_delete' => true,
                'options'      => [
                    'label' => false,
                ]
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\User\User',
            'csrf_protection' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'user_registration';
    }
}