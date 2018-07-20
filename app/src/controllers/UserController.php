<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\User;

final class UserController extends BaseController
{
    public function getSignUp(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'user/signUp.twig');
    }

    public function postSignUp(Request $request, Response $response, $args)
    {
        // Check Duplicate
        // Creat user

        $params = $request->getParams();

        $newUser = new User($params['email'], $params['password'], $params['name']);
        $this->em->persist($newUser);
        $this->em->flush();

        return $response->withJson(['success' => true], 201);
    }

    public function getSignIn(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'user/signIn.twig');
    }

    public function postSignIn(Request $request, Response $response, $args)
    {
        // Check if the user exists
        // Redirect

        $params = $request->getParams();

        $user = $this->em->getRepository(User::class)->findByEmail($params['email']);

        if (sizeof($user) > 0 && password_verify($params['password'], $user[0]->getPasswordHash()) == true) {
            return $response->withJson(['success' => true, 'message' => 'Signed in as '.$user[0]->getName()]);
        }
        else {
            return $response->withJson(['success' => false]);
        }
    }
}
