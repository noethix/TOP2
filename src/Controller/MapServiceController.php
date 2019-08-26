<?php

namespace App\Controller;

use App\Entity\MapService;
use App\Form\MapServiceType;
use App\Repository\MapServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/map/service")
 */
class MapServiceController extends AbstractController
{
    /**
     * @Route("/", name="map_service_index", methods={"GET"})
     */
    public function index(MapServiceRepository $mapServiceRepository): Response
    {
        return $this->render('map_service/index.html.twig', [
            'map_services' => $mapServiceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="map_service_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mapService = new MapService();
        $form = $this->createForm(MapServiceType::class, $mapService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mapService);
            $entityManager->flush();

            return $this->redirectToRoute('map_service_index');
        }

        return $this->render('map_service/new.html.twig', [
            'map_service' => $mapService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="map_service_show", methods={"GET"})
     */
    public function show(MapService $mapService): Response
    {
        return $this->render('map_service/show.html.twig', [
            'map_service' => $mapService,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="map_service_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MapService $mapService): Response
    {
        $form = $this->createForm(MapServiceType::class, $mapService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('map_service_index');
        }

        return $this->render('map_service/edit.html.twig', [
            'map_service' => $mapService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="map_service_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MapService $mapService): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mapService->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mapService);
            $entityManager->flush();
        }

        return $this->redirectToRoute('map_service_index');
    }
}
