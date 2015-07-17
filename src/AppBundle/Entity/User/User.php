<?php
namespace AppBundle\Entity\User;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use AppBundle\Entity\Movie\Movie;
use AppBundle\Entity\Movie\MovieCategory;

/**
 * User
 *
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    use ORMBehaviors\Timestampable\Timestampable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    protected $lastName;

    /**
     * UserPhoto
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User\UserPhoto")
     */
    protected $photo;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Movie\MovieCategory")
     */
    protected $moviesCategories;

    /**
     * @var Movie
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Movie\Movie")
     */
    protected $preferredMovie;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->moviesCategories = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set photo
     *
     * @param UserPhoto $photo
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return UserPhoto
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set moviesCategories
     *
     * @param string $moviesCategories
     * @return User
     */
    public function setMoviesGenres($moviesCategories)
    {
        $this->moviesCategories = $moviesCategories;

        return $this;
    }

    /**
     * Get moviesCategories
     *
     * @return ArrayCollection
     */
    public function getMoviesCategories()
    {
        return $this->moviesCategories;
    }

    /**
     * Set preferredMovie
     *
     * @param string $preferredMovie
     * @return User
     */
    public function setPreferredMovie($preferredMovie)
    {
        $this->preferredMovie = $preferredMovie;

        return $this;
    }

    /**
     * Get preferredMovie
     *
     * @return string 
     */
    public function getPreferredMovie()
    {
        return $this->preferredMovie;
    }

    /**
     * @param ArrayCollection $moviesCategories
     *
     * @return User
     */
    public function setMoviesCategories(ArrayCollection $moviesCategories)
    {
        $this->moviesCategories = $moviesCategories;

        return $this;
    }

    /**
     * Add moviesCategories
     *
     * @param \AppBundle\Entity\Movie\MovieCategory $moviesCategories
     * @return User
     */
    public function addMoviesCategory(\AppBundle\Entity\Movie\MovieCategory $moviesCategories)
    {
        $this->moviesCategories[] = $moviesCategories;

        return $this;
    }

    /**
     * Remove moviesCategories
     *
     * @param \AppBundle\Entity\Movie\MovieCategory $moviesCategories
     */
    public function removeMoviesCategory(\AppBundle\Entity\Movie\MovieCategory $moviesCategories)
    {
        $this->moviesCategories->removeElement($moviesCategories);
    }
}
