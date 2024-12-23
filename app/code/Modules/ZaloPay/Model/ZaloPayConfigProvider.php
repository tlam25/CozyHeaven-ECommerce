<?php

namespace Modules\ZaloPay\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\Locale\ResolverInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Asset\Repository;
use Magento\Payment\Helper\Data as PaymentHelper;

/**
 * Class ZaloPayConfigProvider
 *
 * @package Modules\ZaloPay\Model
 */
class ZaloPayConfigProvider implements ConfigProviderInterface
{
    /**
     * @var PaymentHelper
     */
    protected $paymentHelper;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var Repository
     */
    private $assetRepository;

    /**
     * ZaloPayConfigProvider constructor.
     *
     * @param Repository    $assetRepository
     * @param PaymentHelper $paymentHelper
     * @param UrlInterface  $urlBuilder
     */
    public function __construct(
        Repository $assetRepository,
        PaymentHelper $paymentHelper,
        UrlInterface $urlBuilder
    ) {
        $this->paymentHelper   = $paymentHelper;
        $this->urlBuilder      = $urlBuilder;
        $this->assetRepository = $assetRepository;
    }

    /**
     * @inheritdoc
     */
    public function getConfig()
    {
        return [
            'payment' => [
                'zalopay' => [
                    'redirectUrl' => $this->urlBuilder->getUrl('zalopay/payment/start'),
                    'logoSrc' => $this->assetRepository->getUrl('Modules_ZaloPay::images/logo.png')
                ]
            ]
        ];
    }
}
