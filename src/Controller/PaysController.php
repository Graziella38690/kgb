<?php
namespace App\Controller;


use App\Entity\Pays;
use App\Form\PaysType;
use App\Repository\PaysRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PaysController extends AbstractController
{
    /**
     * Liste des Pays
     * @Route("/pays/liste", name="app_pays_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Pays = $em->getRepository(Pays::class)->findAll();
        
        return $this->render('pays/liste.html.twig', [
            'Pays' => $Pays,
        ]);   
    }     

       
/**
  * @Route("/pays/new", name="app_pays_new", methods={"GET","POST"})
 */
public function new(Request $request)
{
    $Pays = new Pays();
    $form = $this->createForm(PaysType::class, $Pays);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Pays);
        $entityManager->flush();

        return $this->redirectToRoute('app_Pays_liste');
    }
    return $this->render('pays/newpays.html.twig', [
        
        'pays' => $Pays,
        'form' => $form->createView(),
        ] );
}


 /**
         * supprimer une pays
         * @Route("/pays/remove/{id}", name="app_pays_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $Pays = $em->getRepository(Pays::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($Pays);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_pays_liste');
    
        }

/**
* @Route("/pays/edit/{id}", name="app_pays_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, Pays $Pays): Response
{
    $form = $this->createForm(PaysType::class, $Pays);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_pays_liste');
    }

    return $this->render('Pays/editpays.html.twig', [
        'pays' => $Pays,
        'form' => $form->createView(),
    ]);
}

}
