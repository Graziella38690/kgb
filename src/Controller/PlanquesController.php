<?php
namespace App\Controller;


use App\Entity\Planques;
use App\Form\PlanquesType;
use App\Repository\PlanquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PlanquesController extends AbstractController
{
    /**
     * Liste des planques
     * @Route("admin/planques/liste", name="app_planque_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Planques = $em->getRepository(Planques::class)->findAll();
        
        return $this->render('Planques/liste.html.twig', [
            'Planques' => $Planques,
        ]);   
    }     

       
/**
  * @Route("admin/planques/new", name="app_planque_new", methods={"GET","POST"})
 */
public function new(Request $request)
{
    $Planques = new Planques();
    $form = $this->createForm(PlanquesType::class, $Planques);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Planques);
        $entityManager->flush();

        return $this->redirectToRoute('app_planque_liste');
    }
    return $this->render('Planques/newplanques.html.twig', [
        
        'planques' => $Planques,
        'form' => $form->createView(),
        ] );
}


 /**
         * supprimer un planque
         * @Route("admin/planque/remove/{id}", name="app_planque_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $Planques = $em->getRepository(Planques::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($Planques);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_planque_liste');
    
        }

/**
* @Route("admin/planque/edit/{id}", name="app_planque_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, Planques $Planques): Response
{
    $form = $this->createForm(PlanquesType::class, $Planques);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_planque_liste');
    }

    return $this->render('planques/editplanque.html.twig', [
        'planques' => $Planques,
        'form' => $form->createView(),
    ]);
}

}
