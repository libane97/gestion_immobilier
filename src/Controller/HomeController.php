<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Undocumented function
     *
     * @Route("/", name="home")
     */
   public function index()
   {
       $properties = $this->repository->findLatest();
       return $this->render('pages/home.html.twig',[
        'properties' => $properties,
        'menu' => 'properties',

       ]);
   }

    /**
     * @Route("/bien/{title}{id}", name="property.show")
     * @return Response
     */
   public function show($title,$id):Response
   {
       $property=$this->repository->find($id);
       return $this->render('property/show.html.twig',[
           'menu' => 'properties',
           'property' => $property
       ]);
   }

}