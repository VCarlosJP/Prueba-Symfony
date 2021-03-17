<?php


namespace App\Controller;


use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    private $passwordEncoder;
    private $userRepository;
    private $entityManager;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
        $this->userRepository = $userRepository;
    }

    public function registerUser(Request $request){
        $data = json_decode($request->getContent(), true);

        if($this->checkUserExist($data['email'])){
            return new JsonResponse(['message'=>'User Already Exist', 'statusCode'=>409], 409);
        }

        $user = new User();
        $user
            ->setEmail($data['email'])
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->passwordEncoder->encodePassword($user, $data['password']));

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return new JsonResponse(['message'=>'User Created Succesfully', 'statusCode'=>200]);

    }

    public function checkUserExist($email){
        return $this->userRepository->findOneBy(['email'=>$email]);
    }
}