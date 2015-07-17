<?php

namespace AppBundle\Entity\Movie;

use AppBundle\Entity\User\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * MovieReview
 *
 * @ORM\Table(name="movie_review")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Movie\MovieReviewRepository")
 */
class MovieReview
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Movie
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Movie\Movie", inversedBy="moviereview", cascade={"persist","remove"})
     */
    private $movie;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User\User", inversedBy="moviereview", cascade={"persist","remove"})
     */
    protected $user;

    /**
     * @var float
     *
     * @ORM\Column(name="review", type="float")
     */
    private $review;


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
     * Set review
     *
     * @param float $review
     * @return MovieReview
     */
    public function setReview($review)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return float 
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Get movie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set movie
     *
     * @param \AppBundle\Entity\Movie\Movie $movie
     * @return MovieReview
     */
    public function setMovie(\AppBundle\Entity\Movie\Movie $movie = null)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User\User $user
     * @return MovieReview
     */
    public function setUser(\AppBundle\Entity\User\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
