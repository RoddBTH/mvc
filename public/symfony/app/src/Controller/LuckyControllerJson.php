<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
    #[Route("/api/lucky/number")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'lucky-number' => $number,
            'lucky-message' => 'Hi there!',
            'timestamp' => date('Y-m-d H:i:s'),
            'date' => date('Y-m-d')
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/quote")]
    public function jsonQuote(): Response
    {
        $quotes = [
            "The only way to do great work is to love what you do. - Steve Jobs",
            "In the middle of every difficulty lies opportunity. - Albert Einstein",
            "Life is what happens when you're busy making other plans. - John Lennon"
        ];

        $randomQuote = $quotes[array_rand($quotes)];

        $data = [
            'quote' => $randomQuote,
            'date' => date('Y-m-d'),
            'timestamp' => time()
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api")]
    public function apiOverview(): Response
    {
        $routes = [
            [
                'route' => '/api/lucky/number',
                'description' => 'Get a random lucky number',
                'methods' => ['GET']
            ],
            [
                'route' => '/api/quote',
                'description' => 'Get a random quote with timestamp',
                'methods' => ['GET']
            ]
        ];

        $data = [
            'message' => 'Welcome to the API!',
            'endpoints' => $routes,
            'timestamp' => time()
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}