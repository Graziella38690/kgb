<?php
namespace App\Controller;


use App\Entity\Agents;
use App\Form\AgentsType;
use App\Repository\AgentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;









class AgentsController extends AbstractController
{
    /**
     * Liste agent
     * @Route("/agent/liste", name="app_agent_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Agents = $em->getRepository(Agents::class)->findAll();
        
        return $this->render('Agents/liste.html.twig', [
            'Agents' => $Agents,
        ]);   
    }     

       
/**
  * @Route("/agents/new", name="app_agents_new", methods={"GET","POST"})
 */
public function new(Request $request)
{
    $Agents = new Agents();
    $form = $this->createForm(AgentsType::class, $Agents);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Agents);
        $entityManager->flush();

        return $this->redirectToRoute('app_agent_liste');
    }
    return $this->render('agents/newagents.html.twig', [
        
        'Agents' => $Agents,
        'form' => $form->createView(),
        ] );
}



}
