<?php
namespace AppBundle\Form\DataTransformer\User;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User\UserPhoto;

class UserPhotoToNumberTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (issue) to an int (id).
     *
     * @param  UserPhoto|null $userPhoto
     * @return int
     */
    public function transform($userPhoto)
    {
        if (null === $userPhoto) {
            return "";
        }

        return $userPhoto->getId();
    }

    /**
     * Transforms a string (number) to an object (issue).
     *
     * @param  int $id
     * @return UserPhoto|null
     * @throws TransformationFailedException if object (issue) is not found.
     */
    public function reverseTransform($id)
    {
        if (!$id) {
            return null;
        }

        $userPhoto = $this->om
            ->getRepository('AppBundle:User\UserPhoto')
            ->find($id)
        ;

        if (null === $userPhoto) {
            throw new TransformationFailedException(sprintf(
                'UserPhoto with id "%s" not found',
                $id
            ));
        }

        return $userPhoto;
    }
}