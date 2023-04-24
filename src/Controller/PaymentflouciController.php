<?php

namespace App\Controller;

use App\Entity\Paymentflouci;
use App\Form\PaymentflouciType;
use App\Repository\PaymentflouciRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/paymentflouci')]
class PaymentflouciController extends AbstractController
{
    #[Route('/', name: 'app_paymentflouci_index', methods: ['GET'])]
    public function index(PaymentflouciRepository $paymentflouciRepository): Response
    {
        return $this->render('paymentflouci/index.html.twig', [
            'paymentfloucis' => $paymentflouciRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_paymentflouci_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PaymentflouciRepository $paymentflouciRepository): Response
    {
        $paymentflouci = new Paymentflouci();
        $form = $this->createForm(PaymentflouciType::class, $paymentflouci);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paymentflouciRepository->save($paymentflouci, true);

            return $this->redirectToRoute('app_paymentflouci_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('paymentflouci/new.html.twig', [
            'paymentflouci' => $paymentflouci,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_paymentflouci_show', methods: ['GET'])]
    public function show(Paymentflouci $paymentflouci): Response
    {
        return $this->render('paymentflouci/show.html.twig', [
            'paymentflouci' => $paymentflouci,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_paymentflouci_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Paymentflouci $paymentflouci, PaymentflouciRepository $paymentflouciRepository): Response
    {
        $form = $this->createForm(PaymentflouciType::class, $paymentflouci);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paymentflouciRepository->save($paymentflouci, true);

            return $this->redirectToRoute('app_paymentflouci_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('paymentflouci/edit.html.twig', [
            'paymentflouci' => $paymentflouci,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_paymentflouci_delete', methods: ['POST'])]
    public function delete(Request $request, Paymentflouci $paymentflouci, PaymentflouciRepository $paymentflouciRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paymentflouci->getId(), $request->request->get('_token'))) {
            $paymentflouciRepository->remove($paymentflouci, true);
        }

        return $this->redirectToRoute('app_paymentflouci_index', [], Response::HTTP_SEE_OTHER);
    }
}
