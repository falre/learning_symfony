<?php

namespace App\Controller;

class BlogController extends Controller
{
	public function listAction()
	{
	    $repository = $this->getDoctrine()->getRepository(Product::class);
	    $posts = $repository->findAll();
		return $this->render('list.html.twig', array('posts' => $posts));
	}
	public function showAction($id)
	{
	    $repository = $this->getDoctrine()->getRepository(Product::class);
	    $posts = $repository->find($id);
		if (!$post) {
			// cause the 404 page not found to be displayed
			throw $this->createNotFoundException();
		}
		
		return $this->render('show.html.twig', array('post' => $post));
	}
}