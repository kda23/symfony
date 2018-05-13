<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class MainController extends Controller
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('/index.html.twig', [
    'controller_name' => 'MainController',
    'action_name' => 'index',
    ]);
}
}