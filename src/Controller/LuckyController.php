<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{

    /**
     * @return Response
     * @throws \Exception
     * @Route("/lucky/number")
     */
    public function number()
    {
        $number = random_int(0, 100);

   //     return new Response(
        //        '<html><body>Lucky number: '.$number.'</body></html>'
        //   );

        return $this->render('lucky/number.html.twig',
            ['number' =>$number,
                ]);
    }

    /**
     * @Route("/lucky/numberTest/{max}", name="app_lucky_numberTest")
     * @param $max
     * @return Response
     * @throws \Exception
     */
    public function numberTest($max)
    {
        $number = random_int(0, $max);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}