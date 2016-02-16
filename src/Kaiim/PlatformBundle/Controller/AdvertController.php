<?php
namespace Kaiim\PlatformBundle\Controller;// on se place dans le namespace des contrôleurs de notre bundle

use Symfony\Bundle\FrameworkBundle\Controller\Controller;// Importer le controlleur de base de symfony
use Symfony\Component\HttpFoundation\Response;// notre contrôleur va utiliser l'objet Response, il faut donc le définir grâce au use
use Symfony\Component\HttpFoundation\Request;// importer l'objet Request
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;// importer l'exception NotFoundHttpException
use Kaiim\PlatformBundle\Entity\Advert;// importer notre entité Advert
use Kaiim\PlatformBundle\Entity\Image;// importer notre entité Image
use Kaiim\PlatformBundle\Entity\Application;// importer notre entité Application
use Kaiim\PlatformBundle\Entity\Category;
use Kaiim\PlatformBundle\Entity\Skill;
use Kaiim\PlatformBundle\Entity\AdvertSkill;

// le nom de notre contrôleur doit respecté le nom du fichier pour que l'autoload fonctionne et herite du controleur de base de Symfony
class AdvertController extends Controller
{
	public function indexAction($page)
    {
		if ($page < 1) {
			throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
		}
		
		// Notre liste d'annonce en dur
		$listAdverts = array(
			array(
				'title'   => 'Recherche développpeur Symfony2',
				'id'      => 1,
				'author'  => 'Alexandre',
				'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Mission de webmaster',
				'id'      => 2,
				'author'  => 'Hugo',
				'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Offre de stage webdesigner',
				'id'      => 3,
				'author'  => 'Mathieu',
				'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
				'date'    => new \Datetime())
		);
		
		return $this->render('KaiimPlatformBundle:Advert:index.html.twig', array('listAdverts' => $listAdverts));		
    }
	
	
	public function viewAction($id)
	{
		// On récupere l'EntityManager
		$em = $this->getDoctrine()->getManager();
		
		// On récupère le repository de l'entité Advert
		$repository1 = $em->getRepository('KaiimPlatformBundle:Advert');

		// On récupère l'entité Advert correspondante à l'id $id
		$advert = $repository1->find($id); // $advert est donc une instance de Kaiim\PlatformBundle\Entity\Advert
		// ou : $advert = $em->getRepository('KaiimPlatformBundle:Advert')->find($id);
		
		if (null === $advert) {
			throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
		}
		
		// On récupère le repository de l'entité Application
		$repository2 = $em->getRepository('KaiimPlatformBundle:Application');
		
		// On récupère la liste des candidatures de cette annonce
		$listApplications = $repository2->findBy(array('advert' => $advert));
		// la méthode findBy() récupère toutes les candidatures qui sont liées à l'annonce donnée
		
		// On récupère la liste des compétences
		$listAdvertSkills = $em->getRepository('KaiimPlatformBundle:AdvertSkill')->findBy(array('advert' => $advert));
		
		return $this->render('KaiimPlatformBundle:Advert:view.html.twig', array(
							'advert' => $advert, 
							'listApplications' => $listApplications,
							'listAdvertSkills' => $listAdvertSkills));
	}
	
	
	public function addAction(Request $request)
	{
		// Création de l'entité Advert
		$advert = new Advert();
		$advert->setTitle('Recherche développeur Symfony2.');
		$advert->setAuthor('Alexandre');
		$advert->setContent("Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…");
		// On peut ne pas définir ni la date ni la publication, car ces attributs sont définis automatiquement dans le constructeur
		
		 // Création de l'entité Image
		$image = new Image();
		$image->setUrl('http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg');
		$image->setAlt('Job de rêve');
		
		// On lie l'image à l'annonce
		$advert->setImage($image);
		
		// Création d'une première candidature (la date est définit dans le constructeur et l'id est ajouter automatiquement)
		$application1 = new Application();
		$application1->setAuthor('Marine');
		$application1->setContent("J'ai toutes les qualités requises.");
		
		// Création d'une deuxième candidature par exemple
		$application2 = new Application();
		$application2->setAuthor('Pierre');
		$application2->setContent("Je suis très motivé.");
		
		// On lie les candidatures à l'annonce (une annonce peut contenir plusieurs candidatures)
		$application1->setAdvert($advert);
		$application2->setAdvert($advert);
		
		// On récupère l'EntityManager
		$em = $this->getDoctrine()->getManager();
		
		// On récupère toutes les compétences possibles
		$listSkills = $em->getRepository('KaiimPlatformBundle:Skill')->findAll();
    
		// Pour chaque compétence
		foreach ($listSkills as $skill) {
			// On crée une nouvelle « relation entre 1 annonce et 1 compétence »
			$advertSkill = new AdvertSkill();
			// On la lie à l'annonce, qui est ici toujours la même
			$advertSkill->setAdvert($advert);
			// On la lie à la compétence, qui change ici dans la boucle foreach
			$advertSkill->setSkill($skill);
			// Arbitrairement, on dit que chaque compétence est requise au niveau 'Expert'
			$advertSkill->setLevel('Expert');
			// Et bien sûr, on persiste cette entité de relation, propriétaire des deux autres relations
			$em->persist($advertSkill);
		}
		
		
		// Étape 1 a : On « persiste » l'entité $advert(pour dire que cette entité est gérée par Doctrine)
		// il est inutile de faire un persist($entity) lorsque $entity a été récupérée grâce à Doctrine
		$em->persist($advert);
		// Étape 1 b : si on n'avait pas défini le cascade={"persist"} dans l'entité Advert, on devrait persister à la main l'entité $image
		// $em->persist($image);
		
		// Etape 1 c : on persist les entités $application1 et $application2
		$em->persist($application1);
		$em->persist($application2);
		
		// Étape 2 : On « flush » tout ce qui a été persisté avant (sauvegarde des entités)
		$em->flush();
		
		// La gestion d'un formulaire est particulière, mais l'idée est la suivante :		
		// Si la requête est en POST, c'est que le visiteur a soumis le formulaire
		if ($request->isMethod('POST')) {
			// Ici, on s'occupera de la création et de la gestion du formulaire
			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
			// Puis on redirige vers la page de visualisation de cettte annonce
			return $this->redirect($this->generateUrl('kaiim_platform_view', array('id' => $advert->getId())));
		}
		
		// Si on n'est pas en POST, alors on affiche le formulaire
		return $this->render('KaiimPlatformBundle:Advert:add.html.twig');
	}
	
	
	public function editAction($id, Request $request)
	{
		// On récupère l'entityManger
		$em = $this->getDoctrine()->getManager();
		
		// On récupère l'annonce $id
		$advert = $em->getRepository('KaiimPlatformBundle:Advert')->find($id);
		
		if (null === $advert) {
			throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
		}
    
		// La méthode findAll retourne toutes les catégories de la base de données
		$listCategories = $em->getRepository('KaiimPlatformBundle:Category')->findAll();
    
		// On boucle sur les catégories pour les lier à l'annonce
		foreach ($listCategories as $category) {
			$advert->addCategory($category);
		}
		// Pour persister le changement dans la relation, il faut persister l'entité propriétaire
		// Ici, Advert est le propriétaire, donc inutile de la persister car on l'a récupérée depuis Doctrine
		
		// Étape 2 : On déclenche l'enregistrement
		$em->flush();
		
		if ($request->isMethod('POST')) {
			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
			return $this->redirect($this->generateUrl('kaiim_platform_view', array('id' => 5)));
		}
					
		return $this->render('KaiimPlatformBundle:Advert:edit.html.twig', array('advert' => $advert));
	}
	
	
	public function deleteAction($id)
	{
		$em = $this->getDoctrine()->getManager();
    
		// On récupère l'annonce $id
		$advert = $em->getRepository('KaiimPlatformBundle:Advert')->find($id);
    
		if (null === $advert) {
			throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
		}
		
		// On boucle sur les catégories de l'annonce pour les supprimer
		foreach ($advert->getCategories() as $category) {
			$advert->removeCategory($category);
		}
    
		// Pour persister le changement dans la relation, il faut persister l'entité propriétaire
		// Ici, Advert est le propriétaire, donc inutile de la persister car on l'a récupérée depuis Doctrine
		
		// On déclenche la modification
		$em->flush();
		
		return $this->render('KaiimPlatformBundle:Advert:delete.html.twig');
	}
	
	
	public function menuAction()
	{
		$listAdverts = array(
			array('id' => 2, 'title' => 'Recherche développeur Symfony2'),
			array('id' => 5, 'title' => 'Mission de webmaster'),
			array('id' => 9, 'title' => 'Offre de stage webdesigner')
		);
		return $this->render('KaiimPlatformBundle:Advert:menu.html.twig', array('listAdverts' => $listAdverts));
	}
	
}
?>