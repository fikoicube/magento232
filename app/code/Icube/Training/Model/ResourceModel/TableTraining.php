<?php

namespace Icube\Training\Model\ResourceModel;

class TableTraining extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('table_training', 'entity_id');
    }
}