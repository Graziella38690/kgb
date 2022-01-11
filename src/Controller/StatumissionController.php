<?php
namespace App\Controller;


use App\Entity\Statumission;
use App\Form\StatumissionType;
use App\Repository\StatumissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Knp\Component\Pager\PaginatorInterface;


class StatumissionController extends AbstractController
{
    /**
     * Liste des type de planques
     * @Route("admin/statumission/liste", name="app_statumission_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(Request $request, PaginatorInterface $paginator): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Statumission = $em->getRepository(Statumission::class)->findAll();
        
        $Statumission = $paginator->paginate(
            $Statumission, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            limit:5 // Nombre de résultats par page
        );

        return $this->render('statumission/liste.html.twig', [
            'Statumission' => $Statumission,
        ]);   
    }     

       
/**
  * @Route("admin/statumission/new", name="app_statumission_new", methods={"GET","POST"})
 */
public function new(Request $request)
{
    $Statumission = new Statumission();
    $form = $this->createForm(StatumissionType::class, $Statumission);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Statumission);
        $entityManager->flush();

        return $this->redirectToRoute('app_statumission_liste');
    }
    return $this->render('statumission/newstatumission.html.twig', [
        
        'statumission' => $Statumission,
        'form' => $form->createView(),
        ] );
}


 /**
         * supprimer un statumission
         * @Route("admin/statumission/remove/{id}", name="app_statumission_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $Statumission = $em->getRepository(Statumission::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($Statumission);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_statumission_liste');
    
        }

/**
* @Route("admin/statumission/edit/{id}", name="app_statumission_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, Statumission $Statumission): Response
{
    $form = $this->createForm(StatumissionType::class, $Statumission);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_statumission_liste');
    }

    return $this->render('statumission/editstatumission.html.twig', [
        'statumission' => $Statumission,
        'form' => $form->createView(),
    ]);
}

}

