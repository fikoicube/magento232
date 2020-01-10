<?php

namespace Icube\Training\Helper;

use Magento\Store\Model\ScopeInterface;

class Config extends \Magento\Framework\App\Helper\AbstractHelper
{
    const XML_CONFIG_NAME = 'table_training/';

    private $helperContext;

    public function __construct(\Magento\Framework\App\Helper\Context $helperContext)
    {
        parent::__construct($helperContext);
    }

    public function getConfig($groupId, $fieldId = NULL)
    {
        if(is_null($fieldId))
        {
            $configPath = self::XML_CONFIG_NAME . $groupId;
        } else {
            $configPath = self::XML_CONFIG_NAME . $groupId . '/' . $fieldId;
        }

        return $this->scopeConfig->getValue($configPath, ScopeInterface::SCOPE_STORE);
    }
}