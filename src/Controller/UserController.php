<?php

namespace App\Controller;

use App\Entity\Pelicula;
use App\Entity\Personaje;
use App\Form\PeliculaType;
use App\Form\PersonajeType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController{

    #[Route('/insertUser', name:'insertUser')]
    public function insertUser(
        EntityManagerInterface $doctrine,
        Request $request,
        UserPasswordHasherInterface $cifrado
         
        ){
        
        $form = $this-> createForm(UserType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $user = $form->getData();
            $password= $user->getPassword();
            $pswCifrado = $cifrado->hashPassword($user, $password);
            $user->setPassword($pswCifrado);

            $doctrine->persist($user);
            $doctrine->flush();
            return $this->redirectToRoute('personajes');
        }
     
        return $this->renderForm('Asterix/insertPersonaje.html.twig', ['personajeForm'=>$form]);
    }

    #[Route('/insertAdmin', name:'insertAdmin')]
    public function insertAdmin(
        EntityManagerInterface $doctrine,
        Request $request,
        UserPasswordHasherInterface $cifrado
         
        ){
        
        $form = $this-> createForm(UserType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $user = $form->getData();
            $password= $user->getPassword();
            $pswCifrado = $cifrado->hashPassword($user, $password);
            $user->setPassword($pswCifrado);
            $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

            $doctrine->persist($user);
            $doctrine->flush();
            return $this->redirectToRoute('personajes');
        }
     
        return $this->renderForm('Asterix/insertPersonaje.html.twig', ['personajeForm'=>$form]);
    }

}