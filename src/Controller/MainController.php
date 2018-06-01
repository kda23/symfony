<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Entity\Category;
use App\Entity\Tag;
use App\Repository\PostRepository;
use App\Repository\TagRepository;
use App\Entity\Post;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MyManager;
use App\Service\PostManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;


class MainController extends Controller
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
     * @Route("/{slugCategory}", name="category")
     * @ParamConverter("category", options={"mapping": {"slugCategory" : "slug"}})
     */
    public function category(Category $category)
    {
        return $this->render('caterories.html.twig', [
            'category' => $category,
        ]);
    }

    /**
    * @Route("/{slugCategory}/{postSlug}", name="article")
    * @ParamConverter("category", options={"mapping": {"slugCategory": "slug"}})
    * @ParamConverter("post", options={"mapping": {"postSlug": "slug"}})
    */
    public function article(Post $post, Category $category)
    {
        return $this->render('articles.html.twig', [
            'post' => $post,
        ]);
     }

    /**
    * @Route("/tag/{tagTitle}", name="tag")
    * @ParamConverter("tag", options={"mapping": {"tagTitle": "title"}})
    */
    public function tag(Tag $tag)
    {
        return $this->render('/tag.html.twig', compact('tag'));
    }

    public function tags(TagRepository $repository, $place = null)
    {
       $tags = $repository->findAll(); dump($place);
       return $this->render('/block/tags.html.twig',
        compact('tags')
       );
    }
 }
