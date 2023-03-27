<?php
/**
 * Copyright © Coduo LLC. All rights reserved.
 * See COPYING.txt for license details.
 * https://www.coduo.com | support@coduo.com
 */

namespace Coduo\Core\Block\Adminhtml\System\Config\Composer;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Coduo\Core\Model\Module;

class Version extends Field
{
    /**
     * @var Module
     */
    private $module;

    /**
     * @param Context $context
     * @param Module $module
     * @param array $data
     */
    public function __construct(
        Context $context,
        Module $module,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->module = $module;
    }

    /**
     * @param  AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        // Remove scope label
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }

    /**
     * @param  AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $isElementIdModuleName = (strpos($element->getOriginalData('id'), 'Coduo_') === 0);
        $moduleName = $isElementIdModuleName ? $element->getOriginalData('id') : $this->getModuleName();

        return 'v' . $this->module->getInstalledVersion($moduleName);
    }
}
