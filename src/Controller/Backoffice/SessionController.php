<?php

namespace App\Controller\Backoffice;

use App\Entity\Session;
use App\Form\SessionType;
use App\Repository\SessionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/session')]
class SessionController extends AbstractController
{
    #[Route('/', name: 'app_backoffice_session_index', methods: ['GET'])]
    public function index(SessionRepository $sessionRepository): Response
    {
        return $this->render('backoffice/session/index.html.twig', [
            'sessions' => $sessionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_backoffice_session_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SessionRepository $sessionRepository): Response
    {
        $session = new Session();
        $form = $this->createForm(SessionType::class, $session);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sessionRepository->save($session, true);

            return $this->redirectToRoute('app_backoffice_session_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/session/new.html.twig', [
            'session' => $session,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_backoffice_session_show', methods: ['GET'])]
    public function show(Session $session): Response
    {
        return $this->render('backoffice/session/show.html.twig', [
            'session' => $session,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_backoffice_session_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Session $session, SessionRepository $sessionRepository): Response
    {
        $form = $this->createForm(SessionType::class, $session);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sessionRepository->save($session, true);

            return $this->redirectToRoute('app_backoffice_session_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/session/edit.html.twig', [
            'session' => $session,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_backoffice_session_delete', methods: ['POST'])]
    public function delete(Request $request, Session $session, SessionRepository $sessionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $session->getId(), $request->request->get('_token'))) {
            $sessionRepository->remove($session, true);
        }

        return $this->redirectToRoute('app_backoffice_session_index', [], Response::HTTP_SEE_OTHER);
    }
}
