<?php

namespace App\Controller;
use Stripe\StripeClient;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StripeController extends AbstractController
{
    
    #[Route('/stripe', name: 'app_stripe')]
    public function createPaymentLink(Request $request): Response
    {
        // Set your Stripe API key
        $stripe = new StripeClient('sk_test_51MhJbAIFhVcGhpc1yGqwZAeji8QwFfLhMk8qurdgte7zINe7f8faRPgA4PUtZxbf8zU5dO2T1mGwreHhoWDxaobH00KWIhtlVX');
        $price = $request->query->get('price');
        $name = $request->query->get('name');

        // Create a price object
        $priceObject = $stripe->prices->create([
            'unit_amount' => $price,
            'currency' => 'eur',
            'product_data' => [
                'name' => $name,
            ],
        ]);

        // Create a payment link with the price object
        $paymentLink = $stripe->paymentLinks->create([
            'line_items' => [
                [
                    'price' => $priceObject->id,
                    'quantity' => 1,
                ],
            ],
        ]);

        // Redirect the user to the payment link URL
        return $this->redirect($paymentLink->url);
    }
}
