<?php

namespace App\Controller;

use App\Entity\Level;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LevelController extends AbstractController
{
    /**
     * @Route("/level", name="app_level")
     */
    public function index()
    {
        $levels = $this->getDoctrine()->getRepository(Level::class)->findAll();
        return $this->render('level/index.html.twig', [
            'levels' => $levels,
        ]);
    }
}
