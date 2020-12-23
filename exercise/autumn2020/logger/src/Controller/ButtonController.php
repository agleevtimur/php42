<?php

declare(strict_types=1);

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class ButtonController extends AbstractController
{
    /**
     * AJAX
     * @Route("/log_button", methods={"POST"})
     */
    public function logButton(Request $request, LoggerInterface $logger): JsonResponse
    {
        $button = json_decode($request->getContent(), true);
        $logger->info("Has been clicked $button button");

        return $this->json(true);
    }

    /**
     * @Route("/", methods={"GET"})
     */
    public function page(): Response
    {
        return $this->render('base.html.twig');
    }
}