<?php

namespace PortalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PortalBundle\Entity\Nota;

use Symfony\Component\HttpFoundation\Response;

class BackendController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        
        $em         = $this->getDoctrine()->getManager();
        $query      = $em->createQuery('SELECT p FROM PortalBundle:Nota p WHERE p.publicar = true ORDER BY p.categoria' );
        $notas      = $query->getResult();

        $categorias = $em->getRepository('PortalBundle:Categoria')->findAll();

        return $this->render('PortalBundle:Home:index.html.twig', array(
            'notas'         => $notas,
            'categorias'    => $categorias,
        ));  
    }

    /**
     * @Route("/nota/{id}", name="home_nota")
     */
    public function notaAction($id)
    {
        
        $em         = $this->getDoctrine()->getManager();
        $nota       = $em->getRepository('PortalBundle:Nota')->find($id);

        if($nota->getPublicar() == true){

        return $this->render('PortalBundle:Home:nota.html.twig', array(
            'nota'         => $nota,
        ));  

        }else{ 
            return new Response('No se ha encontrado la nota');
        }
    }

    /**
     * @Route("/categoria/{id}", name="home_categoria")
     */
    public function listarPorCategoriaAction($id)
    {
        
        $em         = $this->getDoctrine()->getManager();
        $categoria  = $em->getRepository('PortalBundle:Categoria')->find($id);

        $notas       = $em->getRepository('PortalBundle:Nota')->findByCategoria($categoria);

        return $this->render('PortalBundle:Home:index.html.twig', array(
            'notas'         => $notas,
        ));  
    }


    public function contenidoNewstickAction()
    {
        $em = $this->getDoctrine()->getManager();

        $notas = $em->getRepository('PortalBundle:Nota')->findAll();


        return $this->render('PortalBundle:Home:newstick.html.twig', array(
            'notasnewsticks' => $notas,
        ));

    }

    public function contenidoCarouselAction()
    {
        $em = $this->getDoctrine()->getManager();

        $notas = $em->getRepository('PortalBundle:Nota')->findAll();


        return $this->render('PortalBundle:Home:carousel.html.twig', array(
            'notas' => $notas,
        ));

    }


    /**
    *@Route("/service", name="home_service")
    */
    public function listarCategoriasServiceAction()
    {
        
        $categoria  = $this->get('verCategoriaService');
        
        $cc         = $this->get('templating');
        

        return $this->forward('appcat.categoria_controller:verAction', array(

            'name' => 'gabi',
            'cc' => $cc,

        ));


        
    }


}
