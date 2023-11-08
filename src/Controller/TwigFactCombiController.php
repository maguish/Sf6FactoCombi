<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

class TwigFactCombiController extends AbstractController
{
    #[Route('/twig/fact/combi', name: 'app_twig_fact_combi')]
    public function index(): Response
    {
        return $this->render('twig_fact_combi/index.html.twig', [
            'controller_name' => 'TwigFactCombiController',
        ]);
    }


    #[Route('/')]
    public function indexTwig(Request $request): Response
    {
        $k = $request->query->get('k');
        $n = $request->query->get('n');
        $p = $request->query->get('p');
        $r = null;

        if ($n !== null && $p !== null) {
            // Calcul des combinaisons et rendu du template factocombi
            $r = $this->nbCombinaison($n,$p);
            return $this->render('twig_fact_combi/factoCombi.html.twig', [
                'n' => $n,
                'p' => $p,
                'r' => $r
            ]);
        } elseif ($k !== null) {
            // Calcul de la factorielle et rendu du template factocombi
            $r = $this->factoriel($k);
            return $this->render('twig_fact_combi/factoCombi.html.twig', [
                'k' => $k,
                'r' => $r
            ]);
        }

        // Aucun paramètre k, n ou p n'a été fourni, afficher le template de base
        return $this->render('base.html.twig');
    }


    // Les méthodes factoriel() et nbCombinaison()
    
    function factoriel($n){
        $res = 1; 
        for ($i = 1; $i <= $n; $i++){ 
          $res = $res * $i; 
        } 
        return $res; 
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
