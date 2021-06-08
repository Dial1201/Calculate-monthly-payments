<?php

namespace App\Controller;

use App\Entity\Calculator as EntityCalculator;
use App\Entity\CalculRate;
use App\Form\CalculatorType;
use App\Taxes\Calculator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentsController extends AbstractController
{
    private $calculator;
    private $em;

    public function __construct(Calculator $calculator, EntityManagerInterface $em)
    {
        $this->calculator = $calculator;
        $this->em = $em;
    }


    /**
     * @Route("/", name="payments")
     */
    public function index(Request $request): Response
    {
        // creation du formulaire de calcul
        $result = null;
        $calculRate = new CalculRate;
        $form = $this->createForm(CalculatorType::class, $calculRate);

        // recois la requete http
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // je recupère les données pour traiter
            $loan = $calculRate->getLoan();
            $term = $calculRate->getTerm();
            $rate = $calculRate->getRate();
            $result = $this->calculator->calcul($loan, $term, $rate);
        }

        return $this->render('payments/index.html.twig', [
            'form' => $form->createView(),
            'caculRate' => $calculRate,
            'result' => $result
        ]);
    }
}
