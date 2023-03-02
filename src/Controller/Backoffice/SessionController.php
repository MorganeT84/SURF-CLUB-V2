<?php

namespace App\Controller\Backoffice;

use App\Entity\Session;
use App\Form\SessionType;
use App\Repository\SessionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/session', name: 'app_backoffice_session_')]
class SessionController extends AbstractController
{

    #[Route('/', name: 'index', methods: ['GET'])]
    public function browse(SessionRepository $sessionRepository): Response
    {
        return $this->render('backoffice/session/index.html.twig', [
            'sessions' => $sessionRepository->findAll(),
        ]);
    }

    #[Route('/list/member', name: 'browse_member', methods: ['GET'])]
    public function browseMember(SessionRepository $sessionRepository): JsonResponse
    {
        // listing all session for member
        $sessionList =  $sessionRepository->findAll();

        return $this->json($sessionList, Response::HTTP_OK, [], ['groups' => 'backoffice_session_browse']);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, SessionRepository $sessionRepository): Response
    {
        $session = new Session();
        $sessionForm = $this->createForm(SessionType::class, $session);
        $sessionForm->handleRequest($request);

        if ($sessionForm->isSubmitted() && $sessionForm->isValid()) {
            $sessionRepository->save($session, true);

            return $this->redirectToRoute('app_backoffice_session_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/session/new.html.twig', [
            'session' => $session,
            'session_form' => $sessionForm,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Session $session): Response
    {
        return $this->render('backoffice/session/show.html.twig', [
            'session' => $session,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Session $session, SessionRepository $sessionRepository): Response
    {
        $sessionForm = $this->createForm(SessionType::class, $session);
        $sessionForm->handleRequest($request);

        if ($sessionForm->isSubmitted() && $sessionForm->isValid()) {
            $sessionRepository->save($session, true);

            return $this->redirectToRoute('session_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/session/edit.html.twig', [
            'session' => $session,
            'session_form' => $sessionForm,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Session $session, SessionRepository $sessionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $session->getId(), $request->request->get('_token'))) {
            $sessionRepository->remove($session, true);
        }

        return $this->redirectToRoute('app_backoffice_session_index', [], Response::HTTP_SEE_OTHER);
    }
}
