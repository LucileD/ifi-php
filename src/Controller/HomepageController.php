<?php
/**
 * Created by PhpStorm.
 * User: duthoitl
 * Date: 29/11/17
 * Time: 08:49
 */

namespace App\Controller;

//créé avec bin/console make:controller  HomepageController

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @return Response
     * @Route("/homepage",name="homepage")
     */
    public function index(Request $request) {
        //return new Response('Welcome to your new cobtroller!');
        $tournament = $this->getDoctrine()
            ->getManager()
            ->getRepository('App\Entity\Tournament')//ou Tournament::class
            ->findAll();
        /*[
            ['name' => '<script>alert("Hello!")</script>'], //s'affiche comme chaine de caractère et ne s'exécute pas
            ['name' => 'Tournament1'],
            ['name' => 'Tournament2'],

        ];*/

        return $this->render('homepage.html.twig',
            [
                'tournaments' => $tournament,
                'message'=> $request->query->get('message','pas de message')
            ]);
    }

}