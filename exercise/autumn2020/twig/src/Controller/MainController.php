<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ICommentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/show/{slug}", methods={"GET"})
     */
    public function showPage(string $slug, ICommentRepository $commentRepository): Response
    {
        if (!is_file("{$this->getParameter('kernel.project_dir')}/templates/$slug.html.twig")) {
            return $this->render('error.html.twig', ['error' => "No view for '$slug' found"]);
        }

        return $this->render("$slug.html.twig", ['comments' => $commentRepository->getAll()]);
    }
    /**
     * @Route("/save", methods={"POST"})
     */
    public function saveComment(Request $request, ICommentRepository $commentRepository): Response
    {
        $comment['name'] = $request->get('name');
        $comment['comment'] = $request->get('comment');
        $comment['date'] = $date = date('d-m-Y h:i');
        $commentRepository->save($comment);

        return $this->json($date);
    }
}