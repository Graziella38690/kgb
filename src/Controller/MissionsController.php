<?php
namespace App\Controller;


use App\Entity\Missions;
use App\Form\MissionsType;
use App\Repository\MissionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Knp\Component\Pager\PaginatorInterface;








class MissionsController extends AbstractController
{
    /**
     * Liste mission
     * @Route("/", name="app_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $em = $this->getDoctrine()->getManager();
        $Missions = $em->getRepository(Missions::class)->findAll();
    

        $Missions = $paginator->paginate(
            $Missions, 
            $request->query->getInt('page', 1), 
            limit:5 
        );

        return $this->render('missions/index.html.twig', [
            'Missions' => $Missions,
        ]);   
    }     

        /**
         * Détails d'une mission
         * @Route("/missions/details/{id}", name="app_details", methods={"GET"})
         * 
         
         * @return Response
        
         */
    public function details(int $id): Response
        {
            
            $em = $this->getDoctrine()->getManager();
            $Missions = $em->getRepository(Missions::class)->findBy(['id' => $id]);
            
            return $this->render('missions/details.html.twig', [
                'Missions' => $Missions,
            ]);   
        }     
     /**
         * supprimer une mission
         * @Route("admin/missions/remove/{id}", name="app_remove", methods={"GET"})
         
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        
    
        $em = $this->getDoctrine()->getManager();
    
        
   
        $Missions = $em->getRepository(Missions::class)->findBy(['id' => $id])[0];
   
    
        
    
        $em->remove($Missions);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_liste');
    
        }

/**
  * @Route("admin/missions/new", name="app_missions_new", methods={"GET","POST"})
  * 
 */
public function new(Request $request)
{
    $Missions = new Missions();
    $form = $this->createForm(MissionsType::class, $Missions);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Missions);
        $entityManager->flush();

        return $this->redirectToRoute('app_liste');
    }
    return $this->render('missions/newmissions.html.twig', [
        
        'Missions' => $Missions,
        'form' => $form->createView(),
        ] );
}

/**
* @Route("/missions/edit/{id}", name="app_missions_edit", methods={"GET","POST"}) 
* 
*/
    public function edit(Request $request, Missions $Missions): Response
    {
        $form = $this->createForm(MissionsType::class, $Missions);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_liste');
        }

        return $this->render('missions/editmission.html.twig', [
            'missions' => $Missions,
            'form' => $form->createView(),
        ]);
    }



}








