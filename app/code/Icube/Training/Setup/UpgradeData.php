<?php
namespace Icube\Training\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Model\Product;
use \Magento\Catalog\Model\ResourceModel\Category;
use \Magento\Catalog\Setup\CategorySetup;

class UpgradeData implements UpgradeDataInterface
{
	private $eavSetupFactory;
    const CATEGORIES
    = [
        [
            'parent_id' => 2,
            'name'      => 'Extra',
            'path'      => '1/2'
        ]
    ];

    /** @var \Magento\Catalog\Model\ResourceModel\Category */
    protected $categoryResourceModel;
    /** @var \Magento\Catalog\Setup\CategorySetup */
    protected $categorySetup;


	public function __construct(
        EavSetupFactory $eavSetupFactory,
        Category $categoryResourceModel,
        CategorySetup $categorySetup
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->categorySetup         = $categorySetup;
        $this->categoryResourceModel = $categoryResourceModel;
	}
	
	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
        if (version_compare($context->getversion(), '2.0.3', '<')){
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            $eavSetup->addAttribute(
                Product::ENTITY,
                'training_attribute',
                [
                    'type' => 'int',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Add to Category?',
                    'input' => 'boolean',
                    'class' => '',
                    'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => true,
                    'user_defined' => false,
                    'default' => 0,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple'
                ]
            );
            foreach (self::CATEGORIES as $category) {
                $this->addCategories($category);
            }
        } 
        // else if (version_compare($context->getversion(), '2.0.1', '<')) {
        //     $setup->startSetup();
        //     $this->eavSetupFactory->updateAttribute(Product::ENTITY,155,'default',0,null); 
        //     $this->eavSetupFactory->updateAttribute(Product::ENTITY,155,'backend','Icube\Training\Model\Product\Attribute\Backend\Boolean',null); 
        //     $setup->endSetup();
        // }
    }
    
    private function addCategories(array $category)
    {
        $new_category = $this->categorySetup->createCategory(
            [
                'data' => [
                    'parent_id'       => $category['parent_id'],
                    'name'            => $category['name'],
                    'path'            => $category['path'],
                    'is_active'       => 1,
                    'include_in_menu' => 1,
                ],
            ]
        );
        $this->categoryResourceModel->save($new_category);

        return $category;
    }
}