<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twilio\Rest\Client;



class SmsApiController extends AbstractController
{    
    #[Route('/sms', name: 'app_sms')]
     public function sendSms()
    {
        $accountSid = "ACc2ac116d9ef48aaf6cdee1eff0339213";
        $authToken = "b16b5d3640f56e5658e751491cc81be1";
        $twilio = new Client($accountSid, $authToken);

        $twilio->messages->create(
            // The number you'd like to send the message to
            '+33780966120',
            [
                // A Twilio phone number you purchased at https://console.twilio.com
                'from' => '+19786198737',
                // The body of the text message you'd like to send
                'body' => "Hey Jenny! Good luck on the bar exam!"
            ]
        );

        return new Response('SMS sent successfully.');
    }
}

