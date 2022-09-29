<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmType;
use App\Repository\FilmRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{
    public function __construct(private FilmRepository $filmRepository)
    {
        
    }

    #[Route('/', name: 'film_index')]
    public function index(): Response
    {
        return $this->render('film/index.html.twig');
    }
    
    #[Route('/create', name: 'film_create')]
    public function create( Request $request): Response // POST GET 
    {
        

        $film = new Film();

        $form = $this->createForm(FilmType::class, $film);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) // si le formulaire et envoyer et le formulaire et valider alors je sauvegarde
        {
            //sa sauvegarde
            $this->filmRepository->save($film, true);

            
            return $this->redirectToRoute('film_index');
            
        }

        return $this->render('film/create.html.twig',['form' => $form->createView()]);
    }
}
