<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AsterixController extends AbstractController {

    #[Route('/personaje', name:'personaje')]
    public function getPersonaje(){
        $personaje=[
            'name'=>'Asterix',
            'role'=>'Guerrero galo',
            'image'=>'https://focus.telerama.fr/627x418/100/2023/01/31/644d4fe1083782d6ce71c0543bf792179f599a74_5022C8134F7BD47B414FEC449F7C4CD0.jpg'
        ];
        
        return $this->render('Asterix/personaje.html.twig',['personaje'=>$personaje]);
    }

    #[Route('/listPersonajes', name:'personajes')]
    public function getPersonajes(){
        $personajes=[
        [
            'name'=>'Asterix',
            'role'=>'Guerrero galo',
            'image'=>'https://focus.telerama.fr/627x418/100/2023/01/31/644d4fe1083782d6ce71c0543bf792179f599a74_5022C8134F7BD47B414FEC449F7C4CD0.jpg'
        ],

        [
            'name'=>'Asterix',
            'role'=>'Guerrero galo',
            'image'=>'https://focus.telerama.fr/627x418/100/2023/01/31/644d4fe1083782d6ce71c0543bf792179f599a74_5022C8134F7BD47B414FEC449F7C4CD0.jpg'
        ],

        [
            'name'=>'Asterix',
            'role'=>'Guerrero galo',
            'image'=>'https://focus.telerama.fr/627x418/100/2023/01/31/644d4fe1083782d6ce71c0543bf792179f599a74_5022C8134F7BD47B414FEC449F7C4CD0.jpg'
        ]
    ];
        
        
        return $this->render('Asterix/listPersonajes.html.twig',['personajes'=>$personajes]);
    }




    #[Route('/')]
    public function home(){
        return new Response("Estoy en la home");
    }
}