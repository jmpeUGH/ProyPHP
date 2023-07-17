<?php

namespace App\Controller;

use App\Entity\Pelicula;
use App\Entity\Personaje;
use App\Form\PersonajeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AsterixController extends AbstractController {

    #[Route('/personaje/{id}', name:'personaje')]
    public function getPersonaje(EntityManagerInterface $doctrine, $id){
        
        $repository = $doctrine->getRepository(Personaje::class);

        $personaje = $repository->find($id);
        
        return $this->render('Asterix/personaje.html.twig',['personaje'=>$personaje]);
    }

    #[Route('/listPersonajes', name:'personajes')]
    public function getPersonajes(EntityManagerInterface $doctrine){
        
        
        $repository = $doctrine->getRepository(Personaje::class);
        
        $personajes = $repository->findAll();
        
        return $this->render('Asterix/listPersonajes.html.twig',['personajes'=>$personajes]);
    }

    #[Route('/newPersonaje', name:'newPersonaje')]
    public function newPersonaje(EntityManagerInterface $doctrine){
        
        // $personaje= new Personaje();

        // $personaje->setName('Astérix');
        // $personaje->setRole('Guerrero galo');
        // $personaje->setImage('https://focus.telerama.fr/627x418/100/2023/01/31/644d4fe1083782d6ce71c0543bf792179f599a74_5022C8134F7BD47B414FEC449F7C4CD0.jpg');
        
        // $doctrine->persist($personaje);

        $pelicula= new Pelicula();

        $pelicula->setTitle('Astérix y Obélix contra César');
        $doctrine->persist($pelicula);



        // $doctrine->flush();
        
        // return $this->render('Asterix/personaje.html.twig',['personaje'=>$personaje]);

        return new Response('Astérix creado');
    }

    #[Route('/insertPersonaje', name:'insertPersonaje')]
    public function insertPersonaje(EntityManagerInterface $doctrine, Request $request){
        
        $form = $this-> createForm(PersonajeType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $personaje = $form->getData();
            $doctrine->persist($personaje);
            $doctrine->flush();
            return $this->redirectToRoute('personajes');
        }
     
        return $this->renderForm('Asterix/insertPersonaje.html.twig', ['personajeForm'=>$form]);
    }


    #[Route('/')]
    public function home(){
        return new Response("Estoy en la home");
    }
}