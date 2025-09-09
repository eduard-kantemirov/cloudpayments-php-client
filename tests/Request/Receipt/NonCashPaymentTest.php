<?php

namespace Tests\Request\Receipt;

use Flowwow\Cloudpayments\Request\Receipt\NonCashPayment;
use PHPUnit\Framework\TestCase;

class NonCashPaymentTest extends TestCase
{
    public function testConstructor()
    {
        $payment = new NonCashPayment('100.50', 1, 'PAY123456', 'Additional info');
        
        $this->assertEquals('100.50', $payment->amount);
        $this->assertEquals(1, $payment->paymentMethod);
        $this->assertEquals('PAY123456', $payment->paymentId);
        $this->assertEquals('Additional info', $payment->additionalInfo);
    }

    public function testAsArray()
    {
        $payment = new NonCashPayment('100.50', 1, 'PAY123456', 'Additional info');
        $expected = [
            'Amount' => '100.50',
            'PaymentMethod' => 1,
            'PaymentId' => 'PAY123456',
            'AdditionalInfo' => 'Additional info'
        ];
        
        $this->assertEquals($expected, $payment->asArray());
    }

    public function testAsArrayWithoutAdditionalInfo()
    {
        $payment = new NonCashPayment('100.50', 1, 'PAY123456');
        $expected = [
            'Amount' => '100.50',
            'PaymentMethod' => 1,
            'PaymentId' => 'PAY123456'
        ];
        
        $this->assertEquals($expected, $payment->asArray());
    }
}
