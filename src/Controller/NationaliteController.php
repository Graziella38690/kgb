<?php
namespace App\Controller;


use App\Entity\Nationalite;
use App\Form\NationaliteType;
use App\Repository\NationaliteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Knp\Component\Pager\PaginatorInterface;
class NationaliteController extends AbstractController
{
    /**
     * Liste des Nationalité
     * @Route("admin/nationalite/liste", name="app_nationalite_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(Request $request, PaginatorInterface $paginator): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Nationalite = $em->getRepository(Nationalite::class)->findAll();
        $Nationalite = $paginator->paginate(
            $Nationalite, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            limit:5 // Nombre de résultats par page
        );
        return $this->render('nationalite/liste.html.twig', [
            'Nationalite' => $Nationalite,
        ]);   
    }     

       
/**
  * @Route("admin/nationalite/new", name="app_nationalite_new", methods={"GET","POST"})
 */
public function new(Request $request)
{
    $Nationalite = new Nationalite();
    $form = $this->createForm(NationaliteType::class, $Nationalite);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Nationalite);
        $entityManager->flush();

        return $this->redirectToRoute('app_nationalite_liste');
    }
    return $this->render('nationalite/newnationalite.html.twig', [
        
        'nationalite' => $Nationalite,
        'form' => $form->createView(),
        ] );
}


 /**
         * supprimer une nationalite
         * @Route("admin/nationalite/remove/{id}", name="app_nationalite_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $Nationalite = $em->getRepository(Nationalite::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($Nationalite);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_nationalite_liste');
    
        }

/**
* @Route("admin/nationalite/edit/{id}", name="app_nationalite_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, Nationalite $Nationalite): Response
{
    $form = $this->createForm(NationaliteType::class, $Nationalite);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_nationalite_liste');
    }

    return $this->render('nationalite/editnationalite.html.twig', [
        'nationalite' => $Nationalite,
        'form' => $form->createView(),
    ]);
}

}
