<?php

namespace App\Controller;

use App\Entity\Proposer;
use App\Form\ProposerType;
use App\Repository\ProposerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/proposer")
 */
class ProposerController extends AbstractController
{
    /**
     * @Route("/", name="proposer_index", methods={"GET"})
     */
    public function index(ProposerRepository $proposerRepository): Response
    {
        return $this->render('proposer/index.html.twig', [
            'proposers' => $proposerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="proposer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $proposer = new Proposer();
        $form = $this->createForm(ProposerType::class, $proposer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($proposer);
            $entityManager->flush();
            return $this->redirectToRoute('proposer_index');
        }

        return $this->render('proposer/new.html.twig', [
            'proposer' => $proposer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proposer_show", methods={"GET"})
     */
    public function show(Proposer $proposer): Response
    {
        return $this->render('proposer/show.html.twig', [
            'proposer' => $proposer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="proposer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Proposer $proposer): Response
    {
        $form = $this->createForm(ProposerType::class, $proposer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proposer_index', [
                'id' => $proposer->getId(),
            ]);
        }

        return $this->render('proposer/edit.html.twig', [
            'proposer' => $proposer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proposer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Proposer $proposer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$proposer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($proposer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('proposer_index');
    }
}
