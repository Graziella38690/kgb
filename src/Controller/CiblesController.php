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
       
        $em = $this->getDoctrine()->getManager();
        $Cibles = $em->getRepository(Cibles::class)->findAll();
        $Cibles = $paginator->paginate(
            $Cibles, 
            $request->query->getInt('page', 1), 
            limit:5 
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
        
    
        $em = $this->getDoctrine()->getManager();
    
       
   
        $Cibles = $em->getRepository(Cibles::class)->findBy(['id' => $id])[0];
   
    
       
    
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
