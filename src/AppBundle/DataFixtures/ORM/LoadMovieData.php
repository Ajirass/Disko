<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Movie\MovieCategoryRepository;
use AppBundle\Entity\Movie\MovieCategory;
use AppBundle\Entity\Movie\Movie;

class LoadMovieData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $movie = new Movie();
        $movie->setTitle('Inception');
        $movie->setDirector('Christopher Nolan');
        $movie->setSynopsis("Dom Cobb est un voleur expérimenté – le meilleur qui soit dans l’art périlleux de l’extraction : sa spécialité consiste à s’approprier les secrets les plus précieux d’un individu, enfouis au plus profond de son subconscient, pendant qu’il rêve et que son esprit est particulièrement vulnérable. Très recherché pour ses talents dans l’univers trouble de l’espionnage industriel, Cobb est aussi devenu un fugitif traqué dans le monde entier qui a perdu tout ce qui lui est cher. Mais une ultime mission pourrait lui permettre de retrouver sa vie d’avant – à condition qu’il puisse accomplir l’impossible : l’inception. Au lieu de subtiliser un rêve, Cobb et son équipe doivent faire l’inverse : implanter une idée dans l’esprit d’un individu. S’ils y parviennent, il pourrait s’agir du crime parfait. Et pourtant, aussi méthodiques et doués soient-ils, rien n’aurait pu préparer Cobb et ses partenaires à un ennemi redoutable qui semble avoir systématiquement un coup d’avance sur eux. Un ennemi dont seul Cobb aurait pu soupçonner l’existence.");
        $movie->setReleaseDate(new \DateTime('2010-07-21'));
        $movie->addCategory($this->getReference('cat2'));
        $movie->addCategory($this->getReference('cat6'));
        $manager->persist($movie);
        $this->setReference('movie1', $movie);

        $movie = new Movie();
        $movie->setTitle('Gladiator');
        $movie->setDirector('Ridley Scott');
        $movie->setSynopsis("Le général romain Maximus est le plus fidèle soutien de l'empereur Marc Aurèle, qu'il a conduit de victoire en victoire avec une bravoure et un dévouement exemplaires. Jaloux du prestige de Maximus, et plus encore de l'amour que lui voue l'empereur, le fils de MarcAurèle, Commode, s'arroge brutalement le pouvoir, puis ordonne l'arrestation du général et son exécution. Maximus échappe à ses assassins mais ne peut empêcher le massacre de sa famille. Capturé par un marchand d'esclaves, il devient gladiateur et prépare sa vengeance.");
        $movie->setReleaseDate(new \DateTime('2000-06-20'));
        $movie->addCategory($this->getReference('cat1'));
        $movie->addCategory($this->getReference('cat3'));
        $manager->persist($movie);
        $this->setReference('movie2', $movie);

        $movie = new Movie();
        $movie->setTitle('Les Evadés');
        $movie->setDirector('Frank Darabont');
        $movie->setSynopsis("En 1947, Andy Dufresne, un jeune banquier, est condamné à la prison à vie pour le meurtre de sa femme et de son amant. Ayant beau clamer son innocence, il est emprisonné à Shawshank, le pénitencier le plus sévère de l'Etat du Maine. Il y fait la rencontre de Red, un Noir désabusé, détenu depuis vingt ans. Commence alors une grande histoire d'amitié entre les deux hommes...");
        $movie->setReleaseDate(new \DateTime('1995-03-01'));
        $movie->addCategory($this->getReference('cat3'));
        $manager->persist($movie);
        $this->setReference('movie3', $movie);

        $movie = new Movie();
        $movie->setTitle('Le Seigneur des anneaux : le retour du roi');
        $movie->setDirector('Peter Jackson');
        $movie->setSynopsis("Les armées de Sauron ont attaqué Minas Tirith, la capitale de Gondor. Jamais ce royaume autrefois puissant n'a eu autant besoin de son roi. Mais Aragorn trouvera-t-il en lui la volonté d'accomplir sa destinée ? Tandis que Gandalf s'efforce de soutenir les forces brisées de Gondor, Théoden exhorte les guerriers de Rohan à se joindre au combat. Mais malgré leur courage et leur loyauté, les forces des Hommes ne sont pas de taille à lutter contre les innombrables légions d'ennemis qui s'abattent sur le royaume... Chaque victoire se paye d'immenses sacrifices. Malgré ses pertes, la Communauté se jette dans la bataille pour la vie, ses membres faisant tout pour détourner l'attention de Sauron afin de donner à Frodon une chance d'accomplir sa quête. Voyageant à travers les terres ennemies, ce dernier doit se reposer sur Sam et Gollum, tandis que l'Anneau continue de le tenter...");
        $movie->setReleaseDate(new \DateTime('2003-12-17'));
        $movie->addCategory($this->getReference('cat1'));
        $movie->addCategory($this->getReference('cat4'));
        $manager->persist($movie);
        $this->setReference('movie4', $movie);

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 3;
    }
}
