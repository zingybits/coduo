<?php
/**
 * Copyright © Coduo LLC. All rights reserved.
 * See COPYING.txt for license details.
 * https://www.coduo.com | support@coduo.com
 */

namespace Coduo\Core\Block\Adminhtml\System\Config\Field;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Search extends Field
{
    /**
     * @var string
     */
    protected $_template = 'Coduo_Core::system/config/field/search.phtml';

    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        return $this->toHtml();
    }
}
