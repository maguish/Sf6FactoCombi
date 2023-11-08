<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactCombiController extends AbstractController
{
    #[Route('/fact/combi', name: 'app_fact_combi')]
    public function index(): Response
    {
        /*return $this->render('fact_combi/index.html.twig', [
            'controller_name' => 'FactCombiController',
        ]);*/

        return new Response("Hello Symfony!");
    }


    //Factoriel
    #[Route('/fact/{id<\d+>}')]
    public function indexFact($id): Response
    {
        return new Response($this->factoriel($id));
    }

    function factoriel($n){
        $res = 1; 
        for ($i = 1; $i <= $n; $i++){ 
          $res = $res * $i; 
        } 
        return $res; 
    }

    
    //Nbre de combinaisons de n éléments dans p places
    #[Route('/combi/{id1<\d+>}/{id2<\d+>}')]
    public function indexCombi($id1,$id2): Response
    {
        return new Response($this->nbCombinaison($id1,$id2));
    }

    function nbCombinaison($n,$p){
        if ($n < $p){
            echo "erreur";
        }
        else {
            $r = $n-$p; 
        return $this->factoriel($n) / ($this->factoriel($p) * $this->factoriel($r)); 
        }
    }
}
