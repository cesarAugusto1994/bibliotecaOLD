<?php

namespace bibliotecaBundle\Controller;

use bibliotecaBundle\Entity\Acervo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class AcervoController extends Controller
{

    public function showAction(){

        $repository = $this->getDoctrine()->getRepository(Acervo::class);

        return $this->render('@biblioteca/Acervo/show.html.twig', array('acervos' => $repository->findAll()));

    }

    public function showAtivosAction(){

        $repo = $this->getDoctrine()->getRepository(Acervo::class);

        return $this->render('@biblioteca/Acervo/show.html.twig', array('acervos' => $repo->findByAtivo()));
    }

    public function addAction(Request $request)
    {
        $acervo = new Acervo();
        $acervo->setTitulo('Primeiro cadastro Doctrine');
        $acervo->setAutor('Cesar Augustor');
        $acervo->setAtivo(1);
        $acervo->setAlteracao(new \DateTime('now'));
        $acervo->setCadastro(new \DateTime('now'));

        $repository = $this->getDoctrine()->getEntityManager();
        $repository->persist($acervo);
        $repository->flush();

        $form = $this->createFormBuilder($acervo)
            ->add('id', 'text')
            ->add('titulo', 'text')
            ->add('autor', 'text')
            ->getForm();

        return $this->render('@biblioteca/Acervo/add.html.twig', array('form' => $form->createView()));

    }

    public function newAction(Request $request)
    {
        $acervo = new Acervo();

        $form = $this->createFormBuilder($acervo)
            ->add('titulo', 'text')
            ->add('autor', 'text')
            ->add('save', 'submit', array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $repository = $this->getDoctrine()->getEntityManager();
            $acervo->setAtivo(1);
            $acervo->setAlteracao(new \DateTime('now'));
            $acervo->setCadastro(new \DateTime('now'));

            $repository->persist($acervo);
            $repository->flush();

            return $this->redirectToRoute('new');
        }

        return $this->render('@biblioteca/Acervo/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function removeAction()
    {
        return $this->render('bibliotecaBundle:Acervo:remove.html.twig', array(
                // ...
            ));    }


}
