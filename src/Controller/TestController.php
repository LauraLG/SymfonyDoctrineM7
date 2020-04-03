<?php
namespace App\Controller;
// src/Controller/TestController.php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Response;


    class TestController extends AbstractController {

        public function testMe(){
            $testVar = 'Testing message checking if this route is actually working';
            return $this->render('test/test.html.twig',
                ['testVar'=>$testVar,]
            );
        }




    }