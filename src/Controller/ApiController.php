<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\LunetteRepository;
use App\Repository\CategorieRepository;


final class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api/lunettes', name: 'api_lunettes')]
    public function getLunettes(LunetteRepository $lunetteRepository): JsonResponse
    {
        $lunettes = $lunetteRepository->findAll();

        $data = [];
        foreach ($lunettes as $lunette) {
            $data[] = [
                'id' => $lunette->getId(),
                'serie' => $lunette->getSerie(),
                'quantite' => $lunette->getQuantite(),
                'categorie' => $lunette->getCategorie()->getNom(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/api/categories', name: 'api_categories')]
    public function getCategories(CategorieRepository $categorieRepository): JsonResponse
    {
        $categories = $categorieRepository->findAll();

        $data = [];
        foreach ($categories as $categorie) {
            $data[] = [
                'id' => $categorie->getId(),
                'nom' => $categorie->getNom(),
            ];
        }

        return $this->json($data);
    }
}
