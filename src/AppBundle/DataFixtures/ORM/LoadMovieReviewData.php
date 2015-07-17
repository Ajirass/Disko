<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use FOS\UserBundle\Model\UserManager;
use AppBundle\Entity\Movie\MovieRepository;
use AppBundle\Entity\Movie\MovieReview;
use AppBundle\Entity\Movie\Movie;

/**
 * Class LoadMovieReviewData
 */
class LoadMovieReviewData  extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <= 100; $i++) {
            $review = new MovieReview();
            $review->setUser($this->getReference('user'.rand(1, 4)));
            $review->setMovie($this->getReference('movie'.rand(1, 4)));
            $review->setReview(rand(1, 5));
            $manager->persist($review);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 5;
    }
}