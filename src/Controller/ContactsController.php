<?php
namespace App\Controller;


use App\Entity\Contacts;
use App\Form\ContactsType;
use App\Repository\ContactsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Knp\Component\Pager\PaginatorInterface;


class ContactsController extends AbstractController
{
    /**
     * Liste contact
     * @Route("admin/contacts/liste", name="app_contact_liste", methods={"GET"})
     * 
     
     * @return Response
    
     */
    public function liste(Request $request, PaginatorInterface $paginator): Response
    {
        // Entity Manager de Symfony
        $em = $this->getDoctrine()->getManager();
        $Contacts = $em->getRepository(Contacts::class)->findAll();
        $Contacts = $paginator->paginate(
            $Contacts, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            limit:10 // Nombre de résultats par page
        );
        return $this->render('contacts/liste.html.twig', [
            'Contacts' => $Contacts,
        ]);   
    }     

       
/**
  * @Route("admin/contacts/new", name="app_contact_new", methods={"GET","POST"})
 */
public function new(Request $request)
{
    $Contacts = new Contacts();
    $form = $this->createForm(ContactsType::class, $Contacts);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Contacts);
        $entityManager->flush();

        return $this->redirectToRoute('app_contact_liste');
    }
    return $this->render('contacts/newcontacts.html.twig', [
        
        'contacts' => $Contacts,
        'form' => $form->createView(),
        ] );
}


 /**
         * supprimer un contact
         * @Route("admin/contact/remove/{id}", name="app_contact_remove", methods={"GET"})
         * 
         
         * @return Response
        
         */
        public function remove(int $id): Response
       
        {
        /// Entity Manager de Symfony
    
        $em = $this->getDoctrine()->getManager();
    
        // On récupère la mission qui correspond à l'id passé dans l'URL
   
        $Contacts = $em->getRepository(Contacts::class)->findBy(['id' => $id])[0];
   
    
        // L'article est supprimé
    
        $em->remove($Contacts);
    
        $em->flush();
    
    
        return $this->redirectToRoute('app_contact_liste');
    
        }

/**
* @Route("admin/contact/edit/{id}", name="app_contact_edit", methods={"GET","POST"}) 
*/
public function edit(Request $request, Contacts $Contacts): Response
{
    $form = $this->createForm(ContactsType::class, $Contacts);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_contact_liste');
    }

    return $this->render('contacts/editcontact.html.twig', [
        'contacts' => $Contacts,
        'form' => $form->createView(),
    ]);
}

}
