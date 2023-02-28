<?php

namespace App\Controller\Backoffice;

use App\Entity\Spot;
use App\Form\SpotType;
use App\Repository\SpotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/spot', name: 'app_backoffice_spot_')]
class SpotController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(SpotRepository $spotRepository): Response
    {
        return $this->render('backoffice/spot/index.html.twig', [
            'spots' => $spotRepository->findAll(),
        ]);
    }

    #[Route('/list/member', name: 'browse_member', methods: ['GET'])]
    public function browseMember(SpotRepository $spotRepository): JsonResponse
    {
        // listing all spots for member
        $spotList =  $spotRepository->findAll();

        return $this->json($spotList, Response::HTTP_OK, [], ['groups' => 'backoffice_spot_browse']);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, SpotRepository $spotRepository): Response
    {
        $spot = new Spot();
        $form = $this->createForm(SpotType::class, $spot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $spotRepository->save($spot, true);

            return $this->redirectToRoute('app_backoffice_spot_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/spot/new.html.twig', [
            'spot' => $spot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Spot $spot): Response
    {
        return $this->render('backoffice/spot/show.html.twig', [
            'spot' => $spot,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Spot $spot, SpotRepository $spotRepository): Response
    {
        $form = $this->createForm(SpotType::class, $spot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $spotRepository->save($spot, true);

            return $this->redirectToRoute('app_backoffice_spot_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/spot/edit.html.twig', [
            'spot' => $spot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Spot $spot, SpotRepository $spotRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $spot->getId(), $request->request->get('_token'))) {
            $spotRepository->remove($spot, true);
        }

        return $this->redirectToRoute('app_backoffice_spot_index', [], Response::HTTP_SEE_OTHER);
    }
}
