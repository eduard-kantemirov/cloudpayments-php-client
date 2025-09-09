<?php

namespace Tests\Request\Receipt;

use Flowwow\Cloudpayments\Request\Receipt\CustomerReceipt;
use Flowwow\Cloudpayments\Request\Receipt\ReceiptItem;
use Flowwow\Cloudpayments\Request\Receipt\ReceiptAmounts;
use Flowwow\Cloudpayments\Request\Receipt\NonCashPayment;
use PHPUnit\Framework\TestCase;

class CustomerReceiptTest extends TestCase
{
    public function testNewFields()
    {
        $items = [new ReceiptItem('Test', '100', '100')];
        $amounts = new ReceiptAmounts();
        
        $receipt = new CustomerReceipt($items, '0', $amounts);
        $receipt->isInternetPayment = true;
        $receipt->setTimeZoneCode(2);
        $receipt->nonCashPayments = [
            new NonCashPayment('50', 1, 'PAY1'),
            new NonCashPayment('50', 1, 'PAY2', 'Info')
        ];

        $this->assertTrue($receipt->isInternetPayment);
        $this->assertEquals(2, $receipt->timeZoneCode);
        $this->assertCount(2, $receipt->nonCashPayments);
    }

    public function testTimeZoneCodeValidation()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $items = [new ReceiptItem('Test', '100', '100')];
        $amounts = new ReceiptAmounts();
        $receipt = new CustomerReceipt($items, '0', $amounts);
        
        $receipt->setTimeZoneCode(12); // Invalid value
    }
}
