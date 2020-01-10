<?php
namespace Icube\Training\Block;

class ContohPageResult extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Icube\Training\Helper\General $general,
        array $data = []
        ){
            $this->general = $general;
            parent::__construct($context, $data);
        }

    // public function funcTest()
    // {
    //     return "Training Page";
    // }
    
}