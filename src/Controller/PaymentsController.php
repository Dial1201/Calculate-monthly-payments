<?php

namespace App\Controller;


use App\Form\CalculatorType;
use App\Taxes\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentsController extends AbstractController
{
    /**
     * @Route("/", name="payments")
     */
    public function index(Request $request, Calculator $calculator): Response
    {
        // initialisation des var
        $loan = null;
        $term = null;
        $rate = null;
        $result = null;

        // initialisation du formulaire 
        $form = $this->createForm(CalculatorType::class);

        // recois la requete http
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // je recupère les données si le formulaire et soumis et valide
            $datas = $form->getData();

            // je converti les données du tableau en variable
            extract($datas);

            // je fais le traitement du formulaire
            $result = $calculator->calcul($loan, $term, $rate);
        }

        return $this->render('payments/index.html.twig', [
            'form' => $form->createView(),
            'loan' => $loan,
            'term' => $term,
            'rate' => $rate,
            'result' => $result
        ]);
    }
}
