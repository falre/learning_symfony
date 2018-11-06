<?php
// src/Controller/Controller.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\BlogPost;

class Controller extends AbstractController
{
    public function number()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );

    }
    public function list()
    {
        $repository = $this->getDoctrine()->getRepository(BlogPost::class);
        $posts = $repository->findAll();

        return $this->render(
            'list.html.twig',
            array('posts' => $posts)
        );
    }
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(BlogPost::class);
        $post = $repository->find($id);

        return $this->render(
            'show.html.twig',
            array('post' => $post)
        );
    }
}