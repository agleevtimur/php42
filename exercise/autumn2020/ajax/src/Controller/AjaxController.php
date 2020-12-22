<?php

declare(strict_types=1);

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class AjaxController extends AbstractController
{
    /**
     * AJAX
     * @Route("/get", methods={"GET"})
     */
    public function getField(SessionInterface $session): JsonResponse
    {
        $offset = $session->get('file_offset', 0);

        if ($offset >= filesize('prepared_file.txt')) {
            $res = "no more strings left\n";
        } else {
            $file = fopen('prepared_file.txt', 'r');
            fseek($file, $offset);
            $res = fgets($file);
            $session->set('file_offset', ftell($file));
            fclose($file);
        }

        return $this->json($res);
    }

    /**
     * @Route("/", methods={"GET"})
     */
    public function page(SessionInterface $session): Response
    {
        $session->remove('file_offset');
        return $this->render('base.html.twig');
    }
}
