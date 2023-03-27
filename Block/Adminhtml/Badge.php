<?php
/**
 * Copyright © Coduo. All rights reserved.
 * See COPYING.txt for license details.
 * https://coduo.cz | info@coduo.cz
 */

namespace Coduo\Core\Block\Adminhtml;

use Magento\Backend\Block\Template;
use Coduo\Core\Controller\Adminhtml\Version\Index;
use Coduo\Core\Helper\Data;

class Badge extends Template
{
    const SEARCH_URL = 'https://coduo.cz/';
    /**
     * @var Data
     */
    private $dataHelper;

    /**
     * Badge constructor.
     * @param Template\Context $context
     * @param Data $dataHelper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Data $dataHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->dataHelper = $dataHelper;
    }

    /**
     * @return bool
     */
    public function getNotificationOption()
    {
        return $this->dataHelper->getBadgeNotificationValue();
    }

    /**
     * @return string
     */
    public function getNotificationUrl()
    {
        return $this->getUrl('coduo/version/index');
    }

    /**
     * @return bool
     */
    public function isAuthorized()
    {
        return $this->_authorization->isAllowed(Index::ADMIN_RESOURCE);
    }

    /**
     * @return string
     */
    public function getSearchUrl()
    {
        return self::SEARCH_URL . '?utm_source=search';
    }
}
