<?php

namespace App\Controller;

use App\Entity\Spock;
use App\Form\SpockType;
use App\Repository\SpockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/spock")
 */
class SpockController extends AbstractController
{
    /**
     * @Route("/", name="spock_index", methods={"GET"})
     */
    public function index(SpockRepository $spockRepository): Response
    {
        return $this->render('spock/index.html.twig', [
            'spocks' => $spockRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="spock_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $spock = new Spock();
        $form = $this->createForm(SpockType::class, $spock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($spock);
            $entityManager->flush();

            return $this->redirectToRoute('spock_index');
        }

        return $this->render('spock/new.html.twig', [
            'spock' => $spock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="spock_show", methods={"GET"})
     */
    public function show(Spock $spock): Response
    {
        return $this->render('spock/show.html.twig', [
            'spock' => $spock,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="spock_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Spock $spock): Response
    {
        $form = $this->createForm(SpockType::class, $spock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('spock_index');
        }

        return $this->render('spock/edit.html.twig', [
            'spock' => $spock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="spock_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Spock $spock): Response
    {
        if ($this->isCsrfTokenValid('delete'.$spock->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($spock);
            $entityManager->flush();
        }

        return $this->redirectToRoute('spock_index');
    }
}
