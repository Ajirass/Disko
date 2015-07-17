<?php
namespace AppBundle\Controller\Home;

use Pagerfanta\Adapter\DoctrineORMAdapter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Pagerfanta;
use AppBundle\Manager\Movie\MovieManager;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        if (false === $this->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('login_page'));
        }

        /** @var MovieManager $movieManager */
        $movieManager = $this->get('app.manager.movie');

        $adapter = new DoctrineORMAdapter($movieManager->getRepository()->findAllQueryBuilder());
        $pager   = new Pagerfanta($adapter);
        $page    = $request->query->get('page', 1);
        $pager->setCurrentPage($page);

        return $this->render('AppBundle:Home:home.html.twig', [
            'moviesPager' => $pager,
        ]);
    }
}
