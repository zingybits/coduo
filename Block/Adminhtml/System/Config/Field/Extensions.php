<?php
/**
 * Copyright © Coduo LLC. All rights reserved.
 * See COPYING.txt for license details.
 * https://www.coduo.com | support@coduo.com
 */

namespace Coduo\Core\Block\Adminhtml\System\Config\Field;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Coduo\Core\Model\Module;

class Extensions extends Field
{
    /**
     * @var string
     */
    protected $_template = 'Coduo_Core::system/config/field/extensions.phtml';
    /**
     * @var Module
     */
    private $module;

    public function __construct(
        Context $context,
        Module $module,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->module = $module;
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        return $this->toHtml();
    }

    /**
     * @return int
     */
    public function getUpdateCount()
    {
        return $this->module->getUpdateCount();
    }

    /**
     * @return array
     */
    public function getExtensionList()
    {
        return $this->module->getOutDatedExtension();
    }

    /**
     * @return array
     */
    public function getRelatedProduct()
    {
        $result = [];
        $installedExtensions = $this->module->getMyExtensionList();
        foreach ($this->module->getProductFeed() as $key => $item) {
            if (isset($item['upsell']) && $item['upsell'] == 1 && !array_key_exists($key, $installedExtensions)) {
                $result[$key] = $item;
            }
        }

        return $result;
    }
}
