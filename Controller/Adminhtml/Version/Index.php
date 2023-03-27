<?php
/**
 * Copyright © Coduo. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.coduo.cz | support@coduo.cz
 */

namespace Coduo\Core\Controller\Adminhtml\Version;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Coduo\Core\Model\Module;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Coduo_Core::config';
    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;
    /**
     * @var Module
     */
    private $module;

    /**
     * Index constructor.
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param Module $module
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        Module $module
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->module = $module;
    }
    /**
     * Index action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $data = [
            'success' => 1,
            'count' => $this->module->getCachedUpdateCount()
        ];

        $result = $this->resultJsonFactory->create();
        $result->setHeader('Cache-Control', 'max-age=302400', true);
        $result->setHeader('Pragma', 'cache', true);
        $result->setData($data);
        return $result;
    }
}
