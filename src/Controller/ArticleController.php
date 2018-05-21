<?php
namespace App\Controller;
use App\Repository\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Entity\Category;
use App\Entity\Post;
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
    public function blog(CategoryRepository $categoryRepositorys)
    {
        $categories = $categoryRepositorys->findAll();

        return $this->render('/blog.html.twig', compact('categories'));
    }

    /**
     * @Route("/blog/{slug}", name="article")
     * @ParamConverter("slug", class="App:Post")
     */
    public function article($slug)
    {
        return $this->render('/articles.html.twig', [
            'post' => $slug,
        ]);
    }
}