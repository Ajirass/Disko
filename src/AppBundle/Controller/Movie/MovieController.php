<?php
namespace AppBundle\Controller\Movie;

use AppBundle\Entity\Movie\Movie;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Manager\Movie\MovieManager;

class MovieController extends Controller
{
    /**
     * @Route("/movie/{id}", name="movie_show")
     *
     * @param Request $request
     * @param integer $id
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Request $request, $id)
    {
        if (false === $this->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('login_page'));
        }

        /** @var MovieManager $movieManager */
        $movieManager = $this->container->get('app.manager.movie');
        /** @var Movie $movie */
        $movie        = $movieManager->find($id);

        return $this->render('AppBundle:Movie:show.html.twig', [
            'movie' => $movie,
        ]);
    }
}
