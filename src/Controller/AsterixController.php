<?php

namespace App\Controller;

use App\Entity\Pelicula;
use App\Entity\Personaje;
use App\Form\PeliculaType;
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
        
        $personaje1= new Personaje();
        $personaje1->setName('Astérix');
        $personaje1->setRole('Guerrero galo');
        $personaje1->setImage('https://focus.telerama.fr/627x418/100/2023/01/31/644d4fe1083782d6ce71c0543bf792179f599a74_5022C8134F7BD47B414FEC449F7C4CD0.jpg');
        $doctrine->persist($personaje1);

        $personaje2= new Personaje();
        $personaje2->setName('Obélix');
        $personaje2->setRole('Repartidor de menhires');
        $personaje2->setImage('https://static.hitek.fr/img/up_m/1721412384/obelixaliasgerarddepardieu.jpg');
        $doctrine->persist($personaje2);

        $personaje3= new Personaje();
        $personaje3->setName('Falbalá');
        $personaje3->setRole('Amor platónico de Obélix');
        $personaje3->setImage('https://imgsrc.cineserie.com/2022/06/wordpress-cs-format-image-9-1.png?ver=1');
        $doctrine->persist($personaje3);

        $personaje4= new Personaje();
        $personaje4->setName('Lucius Detritus');
        $personaje4->setRole('Traidor y manipulador romano');
        $personaje4->setImage('https://cache.moviestillsdb.com/i/500x/98vkeegn/asterix-et-obelix-contre-cesar-lg.jpg');
        $doctrine->persist($personaje4);

        $personaje5= new Personaje();
        $personaje5->setName('Numerobis');
        $personaje5->setRole('¿Arquitecto? egipcio');
        $personaje5->setImage('https://qph.cf2.quoracdn.net/main-qimg-021aafaff2c38ebf4dd386eacc1d480b-pjlq');
        $doctrine->persist($personaje5);

        $personaje6= new Personaje();
        $personaje6->setName('Cleopatra');
        $personaje6->setRole('Reina egipcia');
        $personaje6->setImage('https://live.staticflickr.com/8489/8174486304_a20e77a3fc_b.jpg');
        $doctrine->persist($personaje6);

        $personaje7= new Personaje();
        $personaje7->setName('Julio César');
        $personaje7->setRole('Julio César, tal cual');
        $personaje7->setImage('https://www.programme-tv.net/imgre/fit/~1~tel~2023~02~06~9bdbda2d-3639-4110-8786-5e069d1aa789.jpeg/1200x600/crop-from/top/quality/80/asterix-aux-jeux-olympiques-tf1-cette-importance-improbable-du-film-dans-la-carriere-d-alain-delon.jpg');
        $doctrine->persist($personaje7);

        $personaje8= new Personaje();
        $personaje8->setName('Bruto');
        $personaje8->setRole('Hijo de JC');
        $personaje8->setImage('https://resize.programme-television.ladmedia.fr/r/670,670/img/var/premiere/storage/images/tele-7-jours/news-tv/asterix-aux-jeux-olympiques-tf1-ave-benoit-poelvoorde-4553651/93753890-1-fre-FR/Asterix-aux-jeux-Olympiques-TF1-Ave-Benoit-Poelvoorde.jpg');
        $doctrine->persist($personaje8);

        $personaje9= new Personaje();
        $personaje9->setName('Princesa Irina');
        $personaje9->setRole('Princesa griega');
        $personaje9->setImage('https://m.media-amazon.com/images/M/MV5BMzIxMGZmYTctOWU2MS00ZmVmLWFkNTAtMmViZDcxYTE3Zjg1XkEyXkFqcGdeQXVyOTc5MDI5NjE@._V1_.jpg');
        $doctrine->persist($personaje9);

        $personaje10= new Personaje();
        $personaje10->setName('Jolitorax');
        $personaje10->setRole('Guerrero inglés');
        $personaje10->setImage('https://3.bp.blogspot.com/-nwkgYPhauP0/USoRzr-Ad6I/AAAAAAAAJfg/OXJI0z0Lu1U/s1600/AsterObelservmaj+08.jpg');
        $doctrine->persist($personaje10);

        $personaje11= new Personaje();
        $personaje11->setName('Cordelia');
        $personaje11->setRole('God save the Queen');
        $personaje11->setImage('https://es.web.img2.acsta.net/medias/nmedia/18/89/32/13/20069581.jpg');
        $doctrine->persist($personaje11);
        
        $personaje12= new Personaje();
        $personaje12->setName('Ophelia');
        $personaje12->setRole('Churri de Jolitorax');
        $personaje12->setImage('https://m.media-amazon.com/images/M/MV5BYmZhMTI4MDMtYzYzMi00ODUyLWE4NGQtODJjNWNiMTgyNWMwXkEyXkFqcGdeQXVyOTc5MDI5NjE@._V1_.jpg');
        $doctrine->persist($personaje12);


        $pelicula1= new Pelicula();
        $pelicula1->setTitle('Astérix y Obélix contra César');
        $pelicula1->setPoster('https://pics.filmaffinity.com/asterix_et_obelix_contre_cesar-413428887-large.jpg');
        $pelicula1->setTrailer('https://www.youtube.com/watch?v=oRj67CNFFg4');
        $doctrine->persist($pelicula1);

        $pelicula2= new Pelicula();
        $pelicula2->setTitle('Astérix y Obélix: Misión Cleopatra');
        $pelicula2->setPoster('https://pics.filmaffinity.com/asterix_obelix_mission_cleopatre-274677346-large.jpg');
        $pelicula2->setTrailer('https://www.youtube.com/watch?v=eiR9U1g4WUw');
        $doctrine->persist($pelicula2);

        $pelicula3= new Pelicula();
        $pelicula3->setTitle('Astérix en los Juegos Olímpicos');
        $pelicula3->setPoster('https://pics.filmaffinity.com/asterix_aux_jeux_olympiques-531825885-large.jpg');
        $pelicula3->setTrailer('https://www.youtube.com/watch?v=6c6TkK8fO0o');
        $doctrine->persist($pelicula3);

        $pelicula4= new Pelicula();
        $pelicula4->setTitle('Astérix y Obélix: Al servicio de Su Majestad');
        $pelicula4->setPoster('https://pics.filmaffinity.com/asterix_et_obelix_au_service_de_sa_majeste-267863335-large.jpg');
        $pelicula4->setTrailer('https://www.youtube.com/watch?v=0Lduwxg3Eig');
        $doctrine->persist($pelicula4);


        $personaje1->addPelicula($pelicula1);
        $personaje1->addPelicula($pelicula2);
        $personaje1->addPelicula($pelicula3);
        $personaje1->addPelicula($pelicula4);
        $personaje2->addPelicula($pelicula1);
        $personaje2->addPelicula($pelicula2);
        $personaje2->addPelicula($pelicula3);
        $personaje2->addPelicula($pelicula4);
        $personaje3->addPelicula($pelicula1);
        $personaje4->addPelicula($pelicula1);
        $personaje5->addPelicula($pelicula2);
        $personaje6->addPelicula($pelicula2);
        $personaje7->addPelicula($pelicula1);
        $personaje7->addPelicula($pelicula2);
        $personaje7->addPelicula($pelicula3);
        $personaje7->addPelicula($pelicula4);
        $personaje8->addPelicula($pelicula3);
        $personaje9->addPelicula($pelicula3);
        $personaje10->addPelicula($pelicula4);
        $personaje11->addPelicula($pelicula4);
        $personaje12->addPelicula($pelicula4);

        $doctrine->flush();
        
        // return $this->render('Asterix/personaje.html.twig',['personaje'=>$personaje]);

        return new Response('Personajes y películas creados');
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

    #[Route('/editPersonaje/{id}', name:'editPersonaje')]
    public function editPersonaje(EntityManagerInterface $doctrine, Request $request, $id){
        
        $repository=$doctrine->getRepository(Personaje::class);
        $personaje = $repository->find($id);
        
        
        $form = $this-> createForm(PersonajeType::class, $personaje);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $personaje = $form->getData();
            $doctrine->persist($personaje);
            $doctrine->flush();
            return $this->redirectToRoute('personajes');
        }
     
        return $this->renderForm('Asterix/insertPersonaje.html.twig', ['personajeForm'=>$form]);
    }


    #[Route('/pelicula/{id}', name:'pelicula')]
    public function getPelicula(EntityManagerInterface $doctrine, $id){
        
        $repository = $doctrine->getRepository(Pelicula::class);

        $pelicula = $repository->find($id);
        
        return $this->render('Asterix/pelicula.html.twig',['pelicula'=>$pelicula]);
    }

    #[Route('/listPeliculas', name:'peliculas')]
    public function getPeliculas(EntityManagerInterface $doctrine){
        
        
        $repository = $doctrine->getRepository(Pelicula::class);
        
        $peliculas = $repository->findAll();
        
        return $this->render('Asterix/listPeliculas.html.twig',['peliculas'=>$peliculas]);
    }

    #[Route('/insertPelicula', name:'insertPelicula')]
    public function insertPelicula(EntityManagerInterface $doctrine, Request $request){
        
        $form = $this-> createForm(PeliculaType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $pelicula = $form->getData();
            $doctrine->persist($pelicula);
            $doctrine->flush();
            return $this->redirectToRoute('peliculas');
        }
     
        return $this->renderForm('Asterix/insertPelicula.html.twig', ['peliculaForm'=>$form]);
    }

    #[Route('/editPelicula/{id}', name:'editPelicula')]
    public function editPelicula(EntityManagerInterface $doctrine, Request $request, $id){
        
        $repository=$doctrine->getRepository(Pelicula::class);
        $pelicula = $repository->find($id);


        $form = $this-> createForm(PeliculaType::class, $pelicula);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $pelicula = $form->getData();
            $doctrine->persist($pelicula);
            $doctrine->flush();
            return $this->redirectToRoute('peliculas');
        }
     
        return $this->renderForm('Asterix/insertPelicula.html.twig', ['peliculaForm'=>$form]);
    }

    #[Route('/')]
    public function home(){
        return new Response("Estoy en la home");
    }
}