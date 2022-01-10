<?php
namespace App\Controller;


use App\Entity\Typemission;
use App\Form\TypemissionType;
use App\Repository\TypemissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Knp\Component\Pager\PaginatorInterface;


class TypemissionController extends AbstractController
{
    /**
     * Liste des type de mission
     * @Route("admin/typemission/liste", name="app_typemission_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(Request $request, PaginatorInterface $paginator): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Typemission = $em->getRepository(Typemission::class)->findAll();
        
        $Typemission = $paginator->paginate(
            $Typemission, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            limit:5 // Nombre de résultats par page
        );

        return $this->render('typemission/liste.html.twig', [
            'Typemission' => $Typemission,
        ]);   
    }     

       
/**
  * @Route("admin/typemission/new", name="app_typemission_new", methods={"GET","POST"})
 */
public function new(Request $request)
{
    $Typemission = new Typemission();
    $form = $this->createForm(TypemissionType::class, $Typemission);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Typemission);
        $entityManager->flush();

        return $this->redirectToRoute('app_typemission_liste');
    }
    return $this->render('typemission/newtypemission.html.twig', [
        
        'typemission' => $Typemission,
        'form' => $form->createView(),
        ] );
}


 /**
         * supprimer un typemission
         * @Route("admin/typemission/remove/{id}", name="app_typemission_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $Typemission = $em->getRepository(Typemission::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($Typemission);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_typemission_liste');
    
        }

/**
* @Route("admin/typemission/edit/{id}", name="app_typemission_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, Typemission $Typemission): Response
{
    $form = $this->createForm(TypemissionType::class, $Typemission);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_typemission_liste');
    }

    return $this->render('typemission/edittypemission.html.twig', [
        'typemission' => $Typemission,
        'form' => $form->createView(),
    ]);
}

}