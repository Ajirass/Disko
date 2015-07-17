<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Movie\MovieRepository;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Movie\MovieCategory;
use AppBundle\Entity\User\User;
use AppBundle\Entity\Movie\MovieCategoryRepository;
use AppBundle\Entity\User\UserPhoto;
use AppBundle\Entity\User\UserPhotoRepository;
use AppBundle\Entity\Movie\Movie;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {


        $user = new User();
        $user->addMoviesCategory($this->getReference('cat2'));
        $user->addMoviesCategory($this->getReference('cat3'));
        $user->setPreferredMovie($this->getReference('movie1'));
        $user->setPhoto($this->getReference('photo1'));
        $user->setUsername('Tyrion');
        $user->setFirstName('Tyrion');
        $user->setLastName('Lannister');
        $user->setPlainPassword('password');
        $user->setEmail('tyrion@disko.fr');
        $user->setEnabled(true);
        $user->addRole('ROLE_USER');
        $manager->persist($user);
        $this->setReference('user1', $user);

        $user = new User();
        $user->addMoviesCategory($this->getReference('cat1'));
        $user->addMoviesCategory($this->getReference('cat5'));
        $user->setPreferredMovie($this->getReference('movie2'));
        $user->setPhoto($this->getReference('photo2'));
        $user->setUsername('Jaime');
        $user->setFirstName('Jaime');
        $user->setLastName('Lannister');
        $user->setPlainPassword('password');
        $user->setEmail('jaime@disko.fr');
        $user->setEnabled(true);
        $user->addRole('ROLE_USER');
        $manager->persist($user);
        $this->setReference('user2', $user);

        $user = new User();
        $user->addMoviesCategory($this->getReference('cat1'));
        $user->addMoviesCategory($this->getReference('cat2'));
        $user->addMoviesCategory($this->getReference('cat3'));
        $user->setPreferredMovie($this->getReference('movie3'));
        $user->setPhoto($this->getReference('photo3'));
        $user->setUsername('Arya');
        $user->setFirstName('Arya');
        $user->setLastName('Stark');
        $user->setPlainPassword('password');
        $user->setEmail('arya@disko.fr');
        $user->setEnabled(true);
        $user->addRole('ROLE_USER');
        $manager->persist($user);
        $this->setReference('user3', $user);

        $user = new User();
        $user->addMoviesCategory($this->getReference('cat5'));
        $user->setPreferredMovie($this->getReference('movie4'));
        $user->setPhoto($this->getReference('photo4'));
        $user->setUsername('Jon');
        $user->setFirstName('Jon');
        $user->setLastName('Snow');
        $user->setPlainPassword('password');
        $user->setEmail('jon@disko.fr');
        $user->setEnabled(true);
        $user->addRole('ROLE_USER');
        $manager->persist($user);
        $this->setReference('user4', $user);


        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 4;
    }
}