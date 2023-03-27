<?php
/**
 * Copyright © Coduo. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.coduo.cz | support@coduo.cz
 */

namespace Coduo\Core\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Coduo\Core\Helper\Data;

class BadgeNotification implements ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => Data::NOTIFICATION_ENABLED, 'label' => 'Yes'],
            ['value' => Data::NOTIFICATION_WITHIN_TAB, 'label' => 'When Tab Open'],
            ['value' => Data::NOTIFICATION_DISABLED, 'label' => __('No')]
        ];
    }
}
