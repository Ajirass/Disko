<?php
namespace AppBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Manager\Movie\MovieReviewManager;

/**
 * Class MovieReviewExtension
 */
class MovieReviewExtension extends \Twig_Extension
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('countReview', [$this, 'countReview']),
            new \Twig_SimpleFunction('avgReviews', [$this, 'avgReviews']),
        ];
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function countReview($id)
    {
        /** @var MovieReviewManager $movieReviewManager */
        $movieReviewManager = $this->container->get('app.manager.movieReview');

        return $movieReviewManager->countReviewByMovie($id);
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function avgReviews($id)
    {
        /** @var MovieReviewManager $movieReviewManager */
        $movieReviewManager = $this->container->get('app.manager.movieReview');

        return $movieReviewManager->getAvgReviews($id);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_extension_movie_review';
    }
}