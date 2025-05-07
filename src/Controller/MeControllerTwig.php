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
    
// imports the AbstractController class from the Symfony FrameworkBundle.
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// imports the Response class, which is Symfony's way of representing an
// HTTP response.
use Symfony\Component\HttpFoundation\Response;

// imports the Route class so you can use it as an annotation or
// attribute to define routes in your controller.
use Symfony\Component\Routing\Annotation\Route;

// Class startpage controller
class MeControllerTwig extends AbstractController
{
    /**
     * Shows startpage.
     *
     * @return Response
     */
    #[Route("/me", name: "me")]
    public function me(): Response
    {
        return $this->render('me_controller.html.twig');
    }

    /**
     * Shows About page.
     *
     * @return Response
     */
    #[Route("/about", name: "about")]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }


    /**
     * Shows report page
     *
     * @return Response
     */
    #[Route("/report", name: "report")]
    public function report(): Response
    {
        return $this->render('report.html.twig');
    }


    /**
     * Shows lucky page, with random imgaes with random quotes
     *
     * @return Response
     */
    #[Route("/lucky", name: "lucky")]
    public function lucky(): Response
    {
        // List imgages
        $images = [
            'img/fun1.png',
            'img/fun2.png',
            'img/fun3.png',
        ];

        // Array for random images
        $randomImage = $images[array_rand($images)];

        // List AI generated quotes
        $quotes = [
            "Allting blir tydligare efter städ.",
            "Det du städar idag slipper du snubbla över imorgon.",
            "Skita ner med passion och hjärta, städa med ånger och skam.",
            "Städning är en konstform där kaos förvandlas till ordning.",
            "En ren plats är en spegel av rent sinne.",
        ];

        // Array for random quotes
        $randomQuote = $quotes[array_rand($quotes)];

        return $this->render('lucky.html.twig', [
            'image' => $randomImage,
            'quote' => $randomQuote,
        ]);
    }
    
    /**
    * Shows API documentation page
    *
    * @return Response
    */
    #[Route("/api", name: "api")]
    public function api(): Response
    {
        return $this->render('api.html.twig');
    }
}
