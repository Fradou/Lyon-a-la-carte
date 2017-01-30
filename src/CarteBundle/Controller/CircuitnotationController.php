<?php

namespace CarteBundle\Controller;

use CarteBundle\Entity\Circuitnotation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Circuitnotation controller.
 *
 */
class CircuitnotationController extends Controller
{
    /**
     * Lists all circuitnotation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $circuitnotations = $em->getRepository('CarteBundle:Circuitnotation')->findAll();

        return $this->render('circuitnotation/index.html.twig', array(
            'circuitnotations' => $circuitnotations,
        ));
    }

    /**
     * Creates a new circuitnotation entity.
     *
     */
    public function newAction(Request $request)
    {
        $circuitnotation = new Circuitnotation();
        $form = $this->createForm('CarteBundle\Form\CircuitnotationType', $circuitnotation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($circuitnotation);
            $em->flush($circuitnotation);

            return $this->redirectToRoute('circuitnotation_show', array('id' => $circuitnotation->getId()));
        }

        return $this->render('circuitnotation/new.html.twig', array(
            'circuitnotation' => $circuitnotation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a circuitnotation entity.
     *
     */
    public function showAction(Circuitnotation $circuitnotation)
    {
        $deleteForm = $this->createDeleteForm($circuitnotation);

        return $this->render('circuitnotation/show.html.twig', array(
            'circuitnotation' => $circuitnotation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing circuitnotation entity.
     *
     */
    public function editAction(Request $request, Circuitnotation $circuitnotation)
    {
        $deleteForm = $this->createDeleteForm($circuitnotation);
        $editForm = $this->createForm('CarteBundle\Form\CircuitnotationType', $circuitnotation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('circuitnotation_edit', array('id' => $circuitnotation->getId()));
        }

        return $this->render('circuitnotation/edit.html.twig', array(
            'circuitnotation' => $circuitnotation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a circuitnotation entity.
     *
     */
    public function deleteAction(Request $request, Circuitnotation $circuitnotation)
    {
        $form = $this->createDeleteForm($circuitnotation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($circuitnotation);
            $em->flush($circuitnotation);
        }

        return $this->redirectToRoute('circuitnotation_index');
    }

    /**
     * Creates a form to delete a circuitnotation entity.
     *
     * @param Circuitnotation $circuitnotation The circuitnotation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Circuitnotation $circuitnotation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('circuitnotation_delete', array('id' => $circuitnotation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
