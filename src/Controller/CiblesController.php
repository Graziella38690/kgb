<?php
namespace App\Controller;


use App\Entity\Cibles;
use App\Form\CiblesType;
use App\Repository\CiblesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Knp\Component\Pager\PaginatorInterface;

class CiblesController extends AbstractController
{
    /**
     * Liste cibles
     * @Route("admin/cibles/liste", name="app_cible_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(Request $request, PaginatorInterface $paginator): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Cibles = $em->getRepository(Cibles::class)->findAll();
        $Cibles = $paginator->paginate(
            $Cibles, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            limit:5 // Nombre de résultats par page
        );
        return $this->render('cibles/liste.html.twig', [
            'Cibles' => $Cibles,
        ]);   
    }     

       
/**
  * @Route("admin/cibles/new", name="app_cible_new", methods={"GET","POST"})
 */
public function new(Request $request)
{
    $Cibles = new Cibles();
    $form = $this->createForm(CiblesType::class, $Cibles);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Cibles);
        $entityManager->flush();

        return $this->redirectToRoute('app_cible_liste');
    }
    return $this->render('cibles/newcibles.html.twig', [
        
        'cibles' => $Cibles,
        'form' => $form->createView(),
        ] );
}


 /**
         * supprimer une cible
         * @Route("admin/cible/remove/{id}", name="app_cible_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $Cibles = $em->getRepository(Cibles::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($Cibles);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_cible_liste');
    
        }

/**
* @Route("admin/cibles/edit/{id}", name="app_cible_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, Cibles $Cibles): Response
{
    $form = $this->createForm(CiblesType::class, $Cibles);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_cible_liste');
    }

    return $this->render('cibles/editcible.html.twig', [
        'cibles' => $Cibles,
        'form' => $form->createView(),
    ]);
}

}
