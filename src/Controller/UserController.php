<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="user")
     */
    public function index()
    {
        return $this->render('user/form.html.twig');
    }
    /**
     * @Route("/create", name="create_user")
     */

    public function create(ObjectManager $manager,Request $request)
    {
        $data = $request->request->all();
        $user = new User();
        $user->setFirstName($data['first_name']);
        $user->setSecondName($data['second_name']);
        $user->setBirthDate($data['birth_date']);
        $user->setEmail($data['email']);
        $user->setLogin($data['login']);
        $user->setPassword($data['password']);
        $manager->persist();
        $manager->flush();
//        dd($user->getId());
        return $this->render('test/test.html.twig');
    }
}
