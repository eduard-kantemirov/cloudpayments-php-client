<?php

namespace Flowwow\Cloudpayments\Request\Receipt;

use Flowwow\Cloudpayments\BaseRequest;

/**
 * Сведения об безналичной оплате (тег 1234)
 * @see https://developers.cloudkassir.ru/#NonCashPayment
 */
class NonCashPayment extends BaseRequest
{
    /** @var string Сумма безналичной оплаты, тег ОФД 1082 */
    public string $amount;

    /** @var int Способ безналичной оплаты, тег ОФД 1236 */
    public int $paymentMethod;

    /** @var string Идентификатор безналичной оплаты, тег ОФД 1237 */
    public string $paymentId;

    /** @var string|null Дополнительные данные о безналичной оплате, тег ОФД 1238 */
    public ?string $additionalInfo = null;

    /**
     * @param string $amount
     * @param int $paymentMethod
     * @param string $paymentId
     * @param string|null $additionalInfo
     */
    public function __construct(string $amount, int $paymentMethod, string $paymentId, ?string $additionalInfo = null)
    {
        $this->amount = $amount;
        $this->paymentMethod = $paymentMethod;
        $this->paymentId = $paymentId;
        $this->additionalInfo = $additionalInfo;
    }
}
