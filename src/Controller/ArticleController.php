<?php
namespace App\Controller;
use App\Entity\Category;
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
        return $this->render('/article.html.twig', [
            'controller_name' => 'Article',
        ]);
    }

    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('/index.html.twig', [
            'controller_name' => 'Homepage',
            'action_name' => 'index',
        ]);
    }

    /**
     * @Route("/contact")
     */
    public function contact()
    {
        return $this->render('/contact.html.twig', [
            'controller_name' => 'Contact',
            'action_name' => 'index',
        ]);
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        $categories = $this->getDoctrine()->getRepository(\App\Entity\Category::class)->findAll();

        return $this->render('/blog.html.twig', compact('categories'));
    }

    /**
     * @Route("/blog/{articleId}", name="article")
     */
    public function article($articleId)
    {
        $post = $this->getDoctrine()->getRepository(\App\Entity\Post::class)->find($articleId);

        return $this->render('/articles.html.twig', [
            'post' => $post,
        ]);
    }
}
