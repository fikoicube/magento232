<?php

namespace Icube\Training\Observer;

class ProductAfterSave implements \Magento\Framework\Event\ObserverInterface
{
    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $categoryLinkRepository = $objectManager->get('\Magento\Catalog\Api\CategoryLinkManagementInterface');

        $collection = $this->_collectionFactory
                        ->create()
                        ->addAttributeToFilter('name','Extra')
                        ->setPageSize(1);

        if ($collection->getSize()) {
            $categoryId = $collection->getFirstItem()->getId();
        }
        $sku = $observer->getProduct()->getSku();
        $categoryIds = $observer->getProduct()->getCategoryIds();
        if (is_null($categoryIds)) {
            $categoryIds = array($categoryId);
        } else {
            array_push($categoryIds, $categoryId);
        }
        
        $categoryLinkRepository->assignProductToCategories($sku, $categoryIds);
    }
}