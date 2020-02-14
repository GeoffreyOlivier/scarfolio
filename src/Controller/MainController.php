<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Dossier;
use App\Entity\Photos;
use App\Entity\Categorie;
use App\Form\ContactType;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

//    /**
// * @Route("/", name="contact")
// */
//    public function contact(Request $request, ObjectManager $manager)
//    {
//
//
//        $contact = new Contact();
//        $formContact = $this->createForm(ContactType::class, $contact);
//
//        $formContact->handleRequest($request);
//        if ($formContact->isSubmitted() && $formContact->isValid()) {
//            $file =$contact->getDocument();
//            $fileName='/bluedev/public/documents/'.md5(uniqid()).'.'.$file->guessExtension();
//            $file = $formContact->get('document')->getData();
//            $file->move($this->getParameter('document_directory'), $fileName);
//            $contact->setDocument($fileName);
//            $manager->persist($contact);
//            $manager->flush();
//            $this->addFlash('notice', 'Post Submitted Successfully!!!');
////            return $this->redirectToRoute('main');
//        }
//
//        return $this->render('index/index.html.twig', [
//            'controller_name' => 'MainController',
//            "formContact" => $formContact->createView(),
//
//
//        ]);
//    }

    /**
     * @Route("/", name="photos" )
     * @return Response
     * Ce controller permet d'afficher les articles dans la page "La carte"
     */
    public function index(): Response
    {

        $repo = $this->getDoctrine()->getRepository(Dossier::class);

        $game = $repo->findBy(array('categorie' => 1 ));
        $level = $repo->findBy(array('categorie' => 2 ));
        $dessin = $repo->findBy(array('categorie' => 3 ));
        $modele = $repo->findBy(array('categorie' => 4 ));

        $repo = $this->getDoctrine()->getRepository(Photos::class);
        $photo = $repo->findBy(array(), array('dossier' => 'ASC'));


        return $this->render('index/index.html.twig', [
            'game' => $game,
            'level' => $level,
            'dessin' => $dessin,
            'modele' => $modele,
            'photo' => $photo,

        ]);

    }

}
