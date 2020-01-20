<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

use App\Entity\User;

/**
 * @Route("/user", name="user_")
 */
class UserController extends AbstractController
{
  /**
   * @Route("/{id}", name="id")
   */
  public function index($id)
  {
    $user = $this->getDoctrine()->getRepository(User::class)->find($id);
    $adress = $user->getAdress();

    return $this->json([
      'name' => $user->getName(),
      'email' => $user->getEmail(),
      'adress' => [
        'street' => $adress->getStreet(),
        'city' => $adress->getCity()->getName(),
        'zip' => $adress->getCity()->getZip()->getCode(),
      ],
    ]);
  }
}
