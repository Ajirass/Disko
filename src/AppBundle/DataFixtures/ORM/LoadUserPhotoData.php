<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User\UserPhoto;

class LoadUserPhotoData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $fileNames = [
            'tyrion.jpg',
            'jaime.jpg',
            'arya.jpg',
            'jon.jpg',
        ];

        $i = 1;
        foreach ($fileNames as $fileName) {
            $userPhoto = new UserPhoto();
            $userPhoto->setFileName($fileName);
            $manager->persist($userPhoto);
            $this->setReference('photo'.$i, $userPhoto);
            $i++;
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 2;
    }
}