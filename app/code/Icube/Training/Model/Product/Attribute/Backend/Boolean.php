<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Icube\Training\Model\Product\Attribute\Backend;

use Magento\Eav\Model\Entity\Attribute\Source\Boolean as BooleanSource;

/**
 * Product attribute for enable/disable option
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Boolean extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    
    /**
     * 
     *
     * @param \Magento\Framework\DataObject $object
     * @return $this
     */
    public function beforeSave($object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        if ($value == 0) {
            $this->_dataSaveAllowed = false;
        }

        return parent::beforeSave($object);
    }
}
