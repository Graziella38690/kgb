<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasherInterface->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_user_liste');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }


/**
     * Liste des utlisateurs
     * @Route("admin/user/liste", name="app_user_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $User = $em->getRepository(User::class)->findAll();
        
        return $this->render('registration/liste.html.twig', [
            'User' => $User,
        ]);   
    }     

/**
         * supprimer un admin
         * @Route("admin/user/remove/{id}", name="app_user_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $User = $em->getRepository(User::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($User);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_user_liste');
    
        }

        /**
* @Route("admin/user/edit/{id}", name="app_user_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, User $User): Response
{
    $form = $this->createForm(RegistrationFormType::class, $User);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_user_liste');
    }

    return $this->render('registration/edituser.html.twig', [
        'user' => $User,
        'form' => $form->createView(),
    ]);
}

}
