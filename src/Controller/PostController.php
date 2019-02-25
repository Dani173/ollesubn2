<?php

namespace App\Controller;

use App\Form\PostType;
use function PHPSTORM_META\type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{
    /**
     * @Route("/post/new", name="new_post")
     */
    public function newPost(Request $Request)
    {
        $post=new Post();
        $post->setTitle('write a post title');
        //crear form
        $form = $this->createForm(PostType::class, $post);

        //handle the request
        $form->handleRequest($Request);
        if($form->isSubmitted()&& $form->isValid()){
            $post=$form->getData();
        }
        //render the form
        return $this->render('post/post.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
