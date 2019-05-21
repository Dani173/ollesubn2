<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Exercise;


class ExerciseController extends AbstractController
{
    /**
     * @Route("/exercise", name="exercise")
     */
    public function allexercise(){

        $exercises = $this->getDoctrine()->getRepository(Exercise::class)->findAll();
        return $this->render('exercise/index.html.twig', [
            'exercises' => $exercises
        ]);
    }



}
