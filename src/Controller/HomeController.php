<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route("/", name: "home")]
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route("/about", name: "about")]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route("/report", name: "report")]
    public function report(): Response
    {
        $reports = [
            'kmom01' => [
                'title' => 'Kmom01',
                'content' => 'Jag har läst och jobbat lite med objektorientering tidigare i python och även lite i C++. Det var ganska intressant men även kluirigt.
                PHP använder objektorienterad programmering (OOP), vilket innebär att du kan skapa egna klasser och objekt för att strukturera din kod på ett mer organiserat sätt.
                Så frågan är ju då "Vad är en klass?" jo en klass är en mall eller ritning som beskriver hur ett objekt ska se ut. Den innehåller egenskaper (variabler) och metoder (funktioner).
                Men vad är då ett objekt? Ett objekt är en kokret instans av en klass, alltså om klassen är en ritning, så är objketet det färdiga huset byggt från  den ritningen.
                Jag tyckte kodbasen var relativt lätt att förstå, det var en tydligt struktur och det var lätt att se vad respektive mapp och fil gör.
                Det jag skulle vilja lära mig lite mer om med tanke på artikeln "PHP the right way" skulle vara API-Utveckling, alltså JSON svar som vi höll på med i detta kmom, men även JWT-autentisering samt OpenAPI/Swagger för dokumentation.
                Mitt TIL är hur man kommer igång med Symfony!'
            ],
            'kmom02' => [
                'title' => 'Kmom02',
                'content' => 'Här är min redovisningstext för kmom02...'
            ],

            'kmom03' => [
                'title' => 'Kmom03',
                'content' => 'Här är min redovisningstext för kmom03...'
            ],
            // Add more kmom as needed
        ];

        return $this->render('report.html.twig', [
            'reports' => $reports
        ]);
    }

    #[Route('/lucky', name: 'lucky')]
    public function lucky(): Response
    {
        $luckyNumber = random_int(0, 100);
        
        return $this->render('/lucky.html.twig', [
            'lucky_number' => $luckyNumber,
        ]);
    }
}
