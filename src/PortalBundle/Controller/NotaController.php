<?php

namespace PortalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PortalBundle\Entity\Nota;
use PortalBundle\Form\NotaType;

use PortalBundle\Entity\Archivo;
use PortalBundle\Form\ArchivoType;

/**
 * Nota controller.
 *
 * @Route("/admin/nota")
 */
class NotaController extends Controller
{
    /**
     * Lists all Nota entities.
     *
     * @Route("/", name="nota_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $notas = $em->getRepository('PortalBundle:Nota')->findAll();

        return $this->render('nota/index.html.twig', array(
            'notas' => $notas,
        ));
    }

    /**
     * Creates a new Nota entity.
     *
     * @Route("/new", name="nota_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nota = new Nota();
        $form = $this->createForm('PortalBundle\Form\NotaType', $nota);

        $archivo = new Archivo();
        $archivoForm = $this->createForm('PortalBundle\Form\ArchivoType', $archivo);

        //$form->add($archivoForm);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $nota->setFecha(new \DateTime());
            $em->persist($nota);
            $em->flush();

            return $this->redirectToRoute('nota_show', array('id' => $nota->getId()));
        }

        return $this->render('nota/new.html.twig', array(
            'nota' => $nota,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Nota entity.
     *
     * @Route("/{id}", name="nota_show")
     * @Method("GET")
     */
    public function showAction(Nota $nota)
    {
        $deleteForm = $this->createDeleteForm($nota);

        return $this->render('nota/show.html.twig', array(
            'nota' => $nota,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Nota entity.
     *
     * @Route("/{id}/edit", name="nota_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Nota $nota)
    {
        $deleteForm = $this->createDeleteForm($nota);
        $editForm = $this->createForm('PortalBundle\Form\NotaType', $nota);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nota);
            $em->flush();

            return $this->redirectToRoute('nota_edit', array('id' => $nota->getId()));
        }

        return $this->render('nota/edit.html.twig', array(
            'nota' => $nota,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Nota entity.
     *
     * @Route("/{id}", name="nota_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Nota $nota)
    {
        $form = $this->createDeleteForm($nota);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nota);
            $em->flush();
        }

        return $this->redirectToRoute('nota_index');
    }

    /**
     * Creates a form to delete a Nota entity.
     *
     * @param Nota $nota The Nota entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Nota $nota)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nota_delete', array('id' => $nota->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
       
        
   
}
