<?php
//Organizes and give your code structure,
//so it's easier to find and manage code.
//
// Also used to avoid name conflicts between classes
// with the same name.
//
// And to comply with the PSR-4 autoloading standard
// in modern PHP frameworks like Symfony.
namespace App\Controller;


// Use statements, to import classes from other namespaces.
// so it's easier to find and manage code.
// And then use the Use statements in the code without printing the
// with the same name.
    
// imports the JsonResponse class, which is part of Symfony's
//HttpFoundation component
use Symfony\Component\HttpFoundation\JsonResponse;

// imports the Route class so you can use it as an annotation or
// attribute to define routes in your controller.
use Symfony\Component\Routing\Annotation\Route;

// Convert date to CET Europe/Stockholm'
date_default_timezone_set('Europe/Stockholm');

// Class for ApiControllerJson
class ApiControllerJson
{
    /**
    * Return random quote in JSON-format.
    *
    * @return JsonResponse JSON-answer with quote, date and timestamp.
    */
    #[Route('/api/quote', name: 'quote')]
    public function quote(): JsonResponse
    {
        // List AI generated quotes
        $quotes = [
            "Koden du skriver idag är buggen du jagar imorgon.",
            "Keep it simple – det funkar oftast bäst.",
            "Debugga med hjärtat, deploya med hjärnan.",
        ];

        $randomQuote = $quotes[array_rand($quotes)];

        $data = [
            'quote' => $randomQuote,
            'date' => date('Y-m-d'),
            'timestamp' => date('c'),
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );

        return $response;
    }
}
