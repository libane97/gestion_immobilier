<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Property;
use App\Repository\PropertyRepository;
use DateTime;
use Symfony\Component\Validator\Constraints\Date;

class PropertyController extends AbstractController
{

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }
   
    /**
     * Undocumented function
     * @Route("/bien", name="property.index")
     * @return Response
     */
   public function index()
   {
   // $property = new Property();
    // $property->setTitle('Mon premiere bien')
    //          ->setPrice(20000)
    //          ->setSurface(10)
    //          ->setRooms(10)
    //          ->setBedrooms(5)
    //          ->setDescription('une maison cool')
    //          ->setAddress('rue 91')
    //          ->setCity('Paris')
    //          ->setFloor(23) /*etage de la appart*/ 
    //          ->setHeat(2)   /* le type chauvage */
    //          ->setPostalCode('RUE 91 premiere angle');
    //          $en = $this->getDoctrine()->getManager();
    //          $en->persist($property);
    //          $en->flush();
             //$property = $this->getDoctrine()->getRepository(Property::class);
             $property = $this->repository->findAllVisible();
               dump($property);
             $properties = 'properties';
    return $this->render('property/index.html.twig',
    [
      'menu' => $properties
    ]
  );
   }

}