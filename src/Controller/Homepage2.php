<?php
/**
 * Created by PhpStorm.
 * User: duthoitl
 * Date: 28/11/17
 * Time: 17:33
 */
//lève une erreur si un type défini n'est pas le même, ne va pas tenter de les caster ( que pour les paramètre)
//declare(strict_types=1);

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class Homepage2
 * @package App\Controller
 * @Route("/")
 */
class Homepage2
{

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    //méthode par défaut de la class, appelé quand on fait $f = new Homepage2(), $f();
    //si on fait __invoke():Response, la fonction retourne forcément un Response
    //si on fait __invoke(int $a) cast $a en int si possible
    public function __invoke()
    {
        //return new Response('Hello World');
        return new Response($this->twig->render('homepage.html.twig'));
    }

}