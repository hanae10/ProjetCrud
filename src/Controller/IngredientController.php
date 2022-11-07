<?php

namespace App\Controller;

use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IngredientController extends AbstractController
{
    #[Route('/ingredient', name: 'ingredient')]

    public function index(IngredientRepository $repository , EntityManagerInterface $em , PaginatorInterface $paginator , Request $request): Response
    {/***
        $ingredients =$repository -> findAll();
        $query =$em->createQuery($ingredients);
        $pagination =$paginator ->paginate($query,$request->query->getInt('Page',1),10);

        return $this->render('pages/ingredient/index.html.twig', ['ingredients'=> $pagination ]);
       **/

        $ingredients= $paginator->paginate($repository -> findAll(), $request->query->getInt('page', 1), /*page number*/10/*limit per page*/);

        return $this->render('pages/ingredient/index.html.twig', ['ingredients' => $ingredients]);
    }
}
