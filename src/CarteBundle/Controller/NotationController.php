<?php

namespace CarteBundle\Controller;

use CarteBundle\Entity\Notation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Notation controller.
 *
 */
class NotationController extends Controller
{
    /**
     * Lists all notation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $notations = $em->getRepository('CarteBundle:Notation')->findAll();

        return $this->render('notation/index.html.twig', array(
            'notations' => $notations,
        ));
    }

    /**
     * Creates a new notation entity.
     *
     */
    public function newAction(Request $request)
    {
        $notation = new Notation();
        $form = $this->createForm('CarteBundle\Form\NotationType', $notation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($notation);
            $em->flush($notation);

            return $this->redirectToRoute('notation_show', array('id' => $notation->getId()));
        }

        return $this->render('notation/new.html.twig', array(
            'notation' => $notation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a notation entity.
     *
     */
    public function showAction(Notation $notation)
    {
        $deleteForm = $this->createDeleteForm($notation);

        return $this->render('notation/show.html.twig', array(
            'notation' => $notation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing notation entity.
     *
     */
    public function editAction(Request $request, Notation $notation)
    {
        $deleteForm = $this->createDeleteForm($notation);
        $editForm = $this->createForm('CarteBundle\Form\NotationType', $notation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('notation_edit', array('id' => $notation->getId()));
        }

        return $this->render('notation/edit.html.twig', array(
            'notation' => $notation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a notation entity.
     *
     */
    public function deleteAction(Request $request, Notation $notation)
    {
        $form = $this->createDeleteForm($notation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($notation);
            $em->flush($notation);
        }

        return $this->redirectToRoute('notation_index');
    }

    /**
     * Creates a form to delete a notation entity.
     *
     * @param Notation $notation The notation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Notation $notation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('notation_delete', array('id' => $notation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
