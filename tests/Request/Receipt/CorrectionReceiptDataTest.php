<?php

namespace Tests\Request\Receipt;

use Flowwow\Cloudpayments\Request\Receipt\CorrectionReceiptData;
use PHPUnit\Framework\TestCase;

class CorrectionReceiptDataTest extends TestCase
{
    public function testNewFields()
    {
        $correctionData = new CorrectionReceiptData();
        $correctionData->isInternetPayment = true;
        $correctionData->setTimeZoneCode(4);

        $this->assertTrue($correctionData->isInternetPayment);
        $this->assertEquals(4, $correctionData->timeZoneCode);
    }

    public function testTimeZoneCodeValidation()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $correctionData = new CorrectionReceiptData();
        $correctionData->setTimeZoneCode(0); // Invalid value
    }
}
