<?php

namespace Icube\Training\Model\ResourceModel\TableTraining;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init('Icube\Training\Model\TableTraining','Icube\Training\Model\ResourceModel\TableTraining');
    }
}