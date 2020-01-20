<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

use App\Entity\User;

class UserController extends AbstractController
{
  /**
   * @Route("/user/{id}", name="user")
   */
  public function index($id)
  {
    $user = $this->getDoctrine()->getRepository(User::class)->find($id);
    $adress = $user->getAdress();
    return $this->json([
      'id' => $user->getId(),
      'name' => $user->getName(),
      'email' => $user->getEmail(),
      'id Google' => $user->getIdGoogle(),
      'adress' => [
        'rue' =>$adress->getStreet()->getName(),
        'city' => $adress->getCity()->getName(),
        'zip' => $adress->getZip()->getCode(),
      ],
    ]);
  }
}
