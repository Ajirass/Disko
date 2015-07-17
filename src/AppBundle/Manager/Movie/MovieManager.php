<?php
namespace AppBundle\Manager\Movie;

use AppBundle\Manager\Core\BaseManager;
use AppBundle\Entity\Movie\MovieRepository;

/**
 * Class MovieManager
 */
class MovieManager extends BaseManager
{
    /**
     * @return MovieRepository
     */
    public function getRepository()
    {
        return parent::getRepository();
    }
}
