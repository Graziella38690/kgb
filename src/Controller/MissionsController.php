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




} 