<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

use App\Entity\Chef;

/**
 * @Route("/chef", name="chef_")
 */
class ChefController extends AbstractController
{
    /**
     * @Route("/{id}", name="id")
     */
    public function index($id)
    {
      $chef = $this->getDoctrine()->getRepository(Chef::class)->find($id);
      $user = $chef->getUser();
      $adress = $user->getAdress();

      return $this->json([
        'name' => $user->getName(),
        'email' => $user->getEmail(),
        'adress' => [
          'city' => $adress->getCity()->getName(),
          'zip' => $adress->getZip()->getCode(),
        ],
      ]);
    }
}
