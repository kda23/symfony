<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class ArticleController extends Controller
{
    /**
     * @Route("/article")
     */
    public function main()
    {

        return $this->render('main/article.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    /**
     * @Route("/article/{slug}")
     */
    public function show($slug)
    {

        return $this->render('main/articles.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

}