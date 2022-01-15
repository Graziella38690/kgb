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
use Knp\Component\Pager\PaginatorInterface;

class SpecialiteController extends AbstractController
{
    /**
     * Liste des Specialite
     * @Route("admin/specialite/liste", name="app_specialite_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(Request $request, PaginatorInterface $paginator): Response
    {
      
        $em = $this->getDoctrine()->getManager();
        $Specialite = $em->getRepository(Specialite::class)->findAll();
        
        $Specialite = $paginator->paginate(
            $Specialite, 
            $request->query->getInt('page', 1), 
            limit:5 
        );

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
        
    
        $em = $this->getDoctrine()->getManager();
    
        
   
        $Specialite = $em->getRepository(Specialite::class)->findBy(['id' => $id])[0];
   
    
    
    
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
