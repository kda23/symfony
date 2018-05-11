<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
        return $this->render('/contact.html.twig', [
            'controller_name' => 'ContactController',
            'test' => 'test',
        ]);
    }
}