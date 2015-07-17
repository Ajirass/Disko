<?php
namespace AppBundle\Manager\Movie;

use AppBundle\Manager\Core\BaseManager;
use AppBundle\Entity\Movie\MovieReviewRepository;

/**
 * Class MovieReviewManager
 */
class MovieReviewManager extends BaseManager
{
    /**
     * @param int $id
     *
     * @return int
     */
    public function countReviewByMovie($id)
    {
        $qb = $this->getRepository()->countMovieReviewByMovie($id);

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function getAvgReviews($id)
    {
        $qb = $this->getRepository()->getAvgReviews($id);

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * @return MovieReviewRepository
     */
    public function getRepository()
    {
        return parent::getRepository();
    }
}