<?php

namespace Modules\ZaloPay\Gateway\Command;

use Magento\Payment\Gateway\CommandInterface;

/**
 * Class CompleteCommand
 *
 * @package Modules\ZaloPay\Gateway\Command
 */
class CompleteCommand implements CommandInterface
{
    /**
     * @var UpdateDetailsCommand
     */
    private $updateDetailsCommand;

    /**
     * @var UpdateOrderCommand
     */
    private $updateOrderCommand;

    /**
     * @param UpdateDetailsCommand $updateDetailsCommand
     * @param UpdateOrderCommand   $updateOrderCommand
     */
    public function __construct(
        UpdateDetailsCommand $updateDetailsCommand,
        UpdateOrderCommand $updateOrderCommand
    ) {
        $this->updateDetailsCommand = $updateDetailsCommand;
        $this->updateOrderCommand   = $updateOrderCommand;
    }

    /**
     * @param array $commandSubject
     * @return \Magento\Payment\Gateway\Command\ResultInterface|void|null
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Payment\Gateway\Command\CommandException
     */
    public function execute(array $commandSubject)
    {
        $this->updateDetailsCommand->execute($commandSubject);
        $this->updateOrderCommand->execute($commandSubject);
    }
}
