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
use Knp\Component\Pager\PaginatorInterface;

class AgentsController extends AbstractController
{
    /**
     * Liste agent
     * @Route("admin/agent/liste", name="app_agent_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(Request $request, PaginatorInterface $paginator): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Agents = $em->getRepository(Agents::class)->findAll();
        $Agents = $paginator->paginate(
            $Agents, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            limit:5// Nombre de résultats par page
        );
        return $this->render('agents/liste.html.twig', [
            'Agents' => $Agents,
        ]);   
    }     

       
/**
  * @Route("admin/agents/new", name="app_agents_new", methods={"GET","POST"})
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


 /**
         * supprimer une mission
         * @Route("admin/agent/remove/{id}", name="app_agent_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $Agents = $em->getRepository(Agents::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($Agents);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_agent_liste');
    
        }

/**
* @Route("admin/agents/edit/{id}", name="app_agent_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, Agents $Agents): Response
{
    $form = $this->createForm(AgentsType::class, $Agents);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_agent_liste');
    }

    return $this->render('agents/editagents.html.twig', [
        'Agents' => $Agents,
        'form' => $form->createView(),
    ]);
}

}
