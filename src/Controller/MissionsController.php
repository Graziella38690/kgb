<?php
namespace App\Controller;

use App\Entity\Missions;
use App\Entity\statutmissions;
use App\Entity\Specialites;
use App\Entity\Agents;
use App\Repository\MissionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MissionsController extends AbstractController
{
    /**
     * Liste mission
     * @Route("/missionsliste", name="app_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Missions = $em->getRepository(Missions::class)->findAll();
        
        return $this->render('missions/liste.html.twig', [
            'Missions' => $Missions,
        ]);   
    }     

        /**
         * Détails d'une mission
         * @Route("/missionsdetails/{id}", name="app_details", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function details(int $id): Response
        {
            // Entity Manager de Symfony
            $em = $this->getDoctrine()->getManager();
            $Missions = $em->getRepository(Missions::class)->findBy(['id' => $id]);
            
            return $this->render('missions/details.html.twig', [
                'Missions' => $Missions,
            ]);   
        }     
        /**
         * supprimer une mission
         * @Route("/missionsremove/{id}", name="app_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
            {
       
                /// Entity Manager de Symfony
        
                $em = $this->getDoctrine()->getManager();
        
                // On récupère la mission qui correspond à l'id passé dans l'URL
       
                $Missions = $em->getRepository(Missions::class)->findBy(['id' => $id])[0];
       
        
                // L'article est supprimé
        
                $em->remove($Missions);
        
                $em->flush();
        
        
                return $this->redirectToRoute('app_liste');
        
            }


} 