<?php

namespace App\Tests;

use App\Taxes\Calculator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PaymentsTest extends WebTestCase
{
    public function testPayments()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/');

        // Verify statue type 200
        // $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        // select the button
        $button = $crawler->selectButton('Je calcul mes mensualités');

        // retrieve the Form object for the form belonging to this button
        $form = $button->form();

        // field values while submitting the form:
        $client->submit($form, [
            'form[loan]' => 150000,
            'form[term]' => 25,
            'form[rate]' => 1.75,
        ]);
    }
}
