<?php

namespace Flowwow\Cloudpayments\Request\Receipt;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * @see https://developers.cloudkassir.ru/#customerreceipt
 */
class CustomerReceipt extends BaseRequest
{
    /** @var ReceiptItem[] $items */
    public array                                     $items;
    public string                                    $taxationSystem;
    public ReceiptAmounts                            $amounts;
    public ?string                                   $calculationPlace           = null;
    public ?string                                   $email                      = null;
    public ?string                                   $phone                      = null;
    public ?string                                   $customerInfo               = null;
    public ?string                                   $customerInn                = null;
    public ?bool                                     $isBso                      = null;
    public ?string                                   $agentSign                  = null;
    public ?string                                   $cashierName                = null;
    public ?array                                    $additionalReceiptInfos     = null;
    public ?array                                    $additionalReceiptRequisite = null;
    public ?string                                   $customerBirthday            = null;
    public ?string                                   $customerStateCode          = null;
    public ?string                                   $customerDocType            = null;
    public ?string                                   $customerDoc                = null;
    public ?string                                   $customerPlace              = null;
    public ?ReceiptUserRequisiteData                 $userRequisiteData          = null;
    public ?ReceiptOperationReceiptRequisite         $operationReceiptRequisite  = null;
    /** @var ReceiptIndustryRequisiteCollection[]|null */
    public ?array                                    $industryRequisiteCollection = null;

    /** @var bool|null Признак интернет оплаты, тег ОФД 1125 */
    public ?bool                                     $isInternetPayment = null;

    /** @var int|null Часовая зона места расчета, тег ОФД 1011. Принимает значение от 1 до 11 */
    public ?int                                      $timeZoneCode = null;

    /** @var NonCashPayment[]|null Сведения об безналичной оплате, тег ОФД 1234 */
    public ?array                                    $nonCashPayments = null;

    /**
     * @param ReceiptItem[]  $items
     * @param string         $taxationSystem
     * @param ReceiptAmounts $amounts
     */
    public function __construct(array $items, string $taxationSystem, ReceiptAmounts $amounts)
    {
        $this->items          = $items;
        $this->taxationSystem = $taxationSystem;
        $this->amounts        = $amounts;
    }

    /**
     * @param int|null $timeZoneCode Значение от 1 до 11
     * @throws \InvalidArgumentException
     */
    public function setTimeZoneCode(?int $timeZoneCode): void
    {
        if ($timeZoneCode !== null && ($timeZoneCode < 1 || $timeZoneCode > 11)) {
            throw new \InvalidArgumentException('TimeZoneCode must be between 1 and 11');
        }
        $this->timeZoneCode = $timeZoneCode;
    }
}
