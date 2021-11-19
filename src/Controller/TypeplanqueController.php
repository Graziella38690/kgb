<?php
namespace App\Controller;


use App\Entity\Typeplanque;
use App\Form\TypeplanqueType;
use App\Repository\TypeplanqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Knp\Component\Pager\PaginatorInterface;


class TypeplanqueController extends AbstractController
{
    /**
     * Liste des type de planques
     * @Route("admin/typeplanque/liste", name="app_typeplanque_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(Request $request, PaginatorInterface $paginator): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Typeplanque = $em->getRepository(Typeplanque::class)->findAll();
        
        $Typeplanque = $paginator->paginate(
            $Typeplanque, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            limit:5 // Nombre de résultats par page
        );

        return $this->render('typeplanque/liste.html.twig', [
            'Typeplanque' => $Typeplanque,
        ]);   
    }     

       
/**
  * @Route("admin/typeplanque/new", name="app_typeplanque_new", methods={"GET","POST"})
 */
public function new(Request $request)
{
    $Typeplanque = new Typeplanque();
    $form = $this->createForm(TypeplanqueType::class, $Typeplanque);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Typeplanque);
        $entityManager->flush();

        return $this->redirectToRoute('app_typeplanque_liste');
    }
    return $this->render('Typeplanque/newtypeplanque.html.twig', [
        
        'typeplanque' => $Typeplanque,
        'form' => $form->createView(),
        ] );
}


 /**
         * supprimer un typeplanque
         * @Route("admin/typeplanque/remove/{id}", name="app_typeplanque_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $Typeplanque = $em->getRepository(Typeplanque::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($Typeplanque);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_typeplanque_liste');
    
        }

/**
* @Route("admin/typeplanque/edit/{id}", name="app_typeplanque_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, Typeplanque $Typeplanque): Response
{
    $form = $this->createForm(TypeplanqueType::class, $Typeplanque);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_typeplanque_liste');
    }

    return $this->render('typeplanque/edittypeplanque.html.twig', [
        'typeplanque' => $Typeplanque,
        'form' => $form->createView(),
    ]);
}

}
