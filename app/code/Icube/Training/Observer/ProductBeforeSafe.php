<?php

namespace Icube\Training\Observer;

class ProductBeforeSafe implements \Magento\Framework\Event\ObserverInterface
{
    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // $isCategoryIDFound = 0;
        $training_attribute_value = $observer->getProduct()->getData('training_attribute');
        // $category_ids_value  = $observer->getProduct()->getData('category_ids');
        // $collection = $this->_collectionFactory
        //                 ->create()
        //                 ->addAttributeToFilter('name','Extra')
        //                 ->setPageSize(1);

        // if ($collection->getSize()) {
        //     $categoryId = $collection->getFirstItem()->getId();
        // }

        // if (is_array($category_ids_value)) {
        //     foreach ($category_ids_value as $cat) {
        //         if (intval($cat) == $categoryId) {
        //             $isCategoryIDFound = 1;
        //             break;
        //         }
        //     }
        // } else {
        //     if($category_ids_value == $categoryId){
        //         $isCategoryIDFound = 1;
        //     }
        // }

        if ($training_attribute_value == 0) {
            throw new \Magento\Framework\Exception\InputException(__('Turn the "Add to Category?" button on!'));
        }
        // if (!$isCategoryIDFound) {
        //     throw new \Magento\Framework\Exception\InputException(__('Only can be added to "Extra" Category!'));
        // }
    }
}