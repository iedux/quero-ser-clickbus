<?php

namespace Clickbus\ExerciseBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Clickbus\ExerciseBundle\Form\WithdrawType;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;



class DefaultController extends Controller
{
    public function indexAction()
    {

    	$title = "ClickBus Excercises";
    	$viewVars = array('title' => $title);
    	
        return $this->render('ClickbusExerciseBundle:Default:index.html.twig', $viewVars);
    }


    public function exercise1Action()
    {
    	$title = "Cash Machine";
    	
       
        $form = $this->get('form.factory')->create(new WithdrawType());

        $request = $this->get('request');
        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {

                $postData = $request->request->get('withdraw');
                $amount = $postData['amount'];

                $numTickets1 = $this->getNumTickets($amount,100);
                $amount = $amount - ($numTickets1 * 100);

                $numTickets2 = $this->getNumTickets($amount,50);
                $amount = $amount - ($numTickets2 * 50);

                $numTickets3 = $this->getNumTickets($amount,20);
                $amount = $amount - ($numTickets3 * 20);

                $numTickets4 = $this->getNumTickets($amount,10);
                $amount = $amount - ($numTickets4 * 10);
               
                $ticketsArray = array('tickets1' =>$numTickets1,
                                      'tickets2' =>$numTickets2,
                                      'tickets3' =>$numTickets3,
                                      'tickets4' =>$numTickets4);
                $showresult = True;
            }
        }else{
            $ticketsArray = array('tickets1' =>0,
                                  'tickets2' =>0,
                                  'tickets3' =>0,
                                  'tickets4' =>0);
            $showresult = False;
        }



        $viewVars = array('title' => $title,'form' => $form->createView(),'showresult'=> $showresult,'tickets'=>$ticketsArray);
        return $this->render('ClickbusExerciseBundle:Default:exercise1.html.twig',$viewVars);
    }

    private function getNumTickets($amount,$denomination){

        $numerOfTickets = intval($amount/$denomination);
        if($numerOfTickets <0){
            $numerOfTickets = 0;
        }

        return $numerOfTickets;

    }


    public function exercise2Action()
    {
		$title = "Excercises2";
		$viewVars = array('title' => $title);
        return $this->render('ClickbusExerciseBundle:Default:exercise2.html.twig', $viewVars);
    }
}
