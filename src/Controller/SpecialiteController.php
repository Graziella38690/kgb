<?php
namespace App\Controller;


use App\Entity\Specialite;
use App\Form\SpecialiteType;
use App\Repository\SpecialiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SpecialiteController extends AbstractController
{
    /**
     * Liste des Specialite
     * @Route("admin/specialite/liste", name="app_specialite_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Specialite = $em->getRepository(Specialite::class)->findAll();
        
        return $this->render('specialite/liste.html.twig', [
            'Specialite' => $Specialite,
        ]);   
    }     

       
/**
  * @Route("admin/specialite/new", name="app_specialite_new", methods={"GET","POST"})
 */
public function new(Request $request)
{
    $Specialite = new Specialite();
    $form = $this->createForm(SpecialiteType::class, $Specialite);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Specialite);
        $entityManager->flush();

        return $this->redirectToRoute('app_specialite_liste');
    }
    return $this->render('specialite/newspecialite.html.twig', [
        
        'specialite' => $Specialite,
        'form' => $form->createView(),
        ] );
}


 /**
         * supprimer une specialite
         * @Route("admin/specialite/remove/{id}", name="app_specialite_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $Specialite = $em->getRepository(Specialite::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($Specialite);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_specialite_liste');
    
        }

/**
* @Route("admin/specialite/edit/{id}", name="app_specialite_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, specialite $Specialite): Response
{
    $form = $this->createForm(SpecialiteType::class, $Specialite);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_specialite_liste');
    }

    return $this->render('specialite/editspecialite.html.twig', [
        'specialite' => $Specialite,
        'form' => $form->createView(),
    ]);
}

}
