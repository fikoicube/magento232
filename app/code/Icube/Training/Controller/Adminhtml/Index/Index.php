<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Icube\Training\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Icube\Training\Helper\Config $config
    ) {
        $this->_pageFactory = $pageFactory;
        $this->config = $config;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend($this->config->getConfig('general/display_text'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Icube_Training::menu_id');
    }
}