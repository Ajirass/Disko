<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Movie\MovieCategory;

class LoadMovieCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $categories  = [
            'Action',
            'Science Fiction',
            'Drame',
            'Fantastique',
            'Policier',
            'Thriller'
        ];

        $i = 1;
        foreach ($categories as $category) {
            $movieCategory = new MovieCategory();
            $movieCategory->setName($category);
            $manager->persist($movieCategory);
            $this->setReference('cat'.$i, $movieCategory);
            $i++;
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }
}