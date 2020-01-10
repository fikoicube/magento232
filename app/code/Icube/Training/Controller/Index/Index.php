<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Icube\Training\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * Catalog index page controller.
 */
class Index extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Icube\Training\Model\TableTrainingFactory $tableTrainingFactory
    )
    {
        $this->tableTrainingFactory = $tableTrainingFactory;
        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        // $new = $this->tableTrainingFactory->create()->setData([
        //     'nik' => '200',
        //     'name' => 'success'
        // ]);
        // $new->save();
        // $tmp = $this->tableTrainingFactory->create()->getCollection()->getData();
        // echo json_encode(is_object($tmp)? get_class_methods($tmp): $tmp);
        // die;

        die($this->getInformation('lorem','dolor'));
    }

    public function getInformation($text, $optional = null)
    {
        return "{$text} {$optional}";
    }
}