<?php

namespace App\Controller;

use App\Entity\CentresFormations;
use App\Form\CentresFormationsType;
use App\Repository\CentresFormationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/centres/formations")
 */
class CentresFormationsController extends AbstractController
{
    /**
     * @Route("/", name="centres_formations_index", methods={"GET"})
     */
    public function index(CentresFormationsRepository $centresFormationsRepository): Response
    {
        return $this->render('centres_formations/index.html.twig', [
            'centres_formations' => $centresFormationsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="centres_formations_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $centresFormation = new CentresFormations();
        $form = $this->createForm(CentresFormationsType::class, $centresFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($centresFormation);
            $entityManager->flush();

            return $this->redirectToRoute('centres_formations_index');
        }

        return $this->render('centres_formations/new.html.twig', [
            'centres_formation' => $centresFormation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="centres_formations_show", methods={"GET"})
     */
    public function show(CentresFormations $centresFormation): Response
    {
        return $this->render('centres_formations/show.html.twig', [
            'centres_formation' => $centresFormation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="centres_formations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CentresFormations $centresFormation): Response
    {
        $form = $this->createForm(CentresFormationsType::class, $centresFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('centres_formations_index', [
                'id' => $centresFormation->getId(),
            ]);
        }

        return $this->render('centres_formations/edit.html.twig', [
            'centres_formation' => $centresFormation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="centres_formations_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CentresFormations $centresFormation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$centresFormation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($centresFormation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('centres_formations_index');
    }
}
