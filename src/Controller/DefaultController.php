<?php

namespace App\Controller;


use App\Entity\UsersRegistration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\UserRegistrationType;
use App\Form\UserRegistrationType as FormUserRegistrationType;



class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(request $request): Response
    {
        //Instanciation du user
        $user = new UsersRegistration();
        $formUserRegistration = $this->createForm(FormUserRegistrationType::class, $user);

        $formUserRegistration->handleRequest($request);

        //Condition - when Submit ans validation form
        if ($formUserRegistration->isSubmitted() && $formUserRegistration->isValid()) {
            
            
            $user = $formUserRegistration->getData();
            $user->setRegistrationDate(new \DateTime('now'));
   
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            //Message if inscription is ok
            $this->addFlash('message', "Inscription pris en compte ! 
             Il faut toujours viser la lune, car même en cas d'échec, on atterrit dans les étoiles. 'Oscar wilde'");

            //same redirect 
            return $this->redirectToRoute('index');
        }


        return $this->render('default/index.html.twig', [
            'formUserRegistration' => $formUserRegistration->createView(),
        ]);
    }
}
