<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare (strict_types = 1);

namespace RLTSquare\CustomAttributes\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class CreateCustomAttr for Create Custom Product Attribute using Data Patch.
 */
class CreateCustomAttr implements DataPatchInterface {

    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * EavSetupFactory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory          $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply() {

        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute('catalog_product', 'product_top_left_tag', [
            'group' => 'Product Tag Section',
            'type' => 'text',
            'backend' => '',
            'frontend' => '',
            'label' => 'Product Top Left Tag',
            'input' => 'textarea',
            'class' => '',
            'source' => '',
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'wysiwyg_enabled' => true,
            'is_html_allowed_on_front' => true,
            'visible' => true,
            'required' => false,
            'user_defined' => false,
            'default' => '',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => false,
            'used_in_product_listing' => true,
            'unique' => false,
            'apply_to' => ''
        ]);

        $eavSetup->addAttribute('catalog_product', 'product_top_right_tag', [
            'group' => 'Product Tag Section',
            'type' => 'text',
            'backend' => '',
            'frontend' => '',
            'label' => 'Product Top Right Tag',
            'input' => 'textarea',
            'class' => '',
            'source' => '',
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'wysiwyg_enabled' => true,
            'is_html_allowed_on_front' => true,
            'visible' => true,
            'required' => false,
            'user_defined' => false,
            'default' => '',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => false,
            'used_in_product_listing' => true,
            'unique' => false,
            'apply_to' => ''
        ]);

        $eavSetup->addAttribute('catalog_product', 'product_bottom_left_tag', [
            'group' => 'Product Tag Section',
            'type' => 'text',
            'backend' => '',
            'frontend' => '',
            'label' => 'Product Bottom Left Tag',
            'input' => 'textarea',
            'class' => '',
            'source' => '',
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'wysiwyg_enabled' => true,
            'is_html_allowed_on_front' => true,
            'visible' => true,
            'required' => false,
            'user_defined' => false,
            'default' => '',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => false,
            'used_in_product_listing' => true,
            'unique' => false,
            'apply_to' => ''
        ]);

        $eavSetup->addAttribute('catalog_product', 'product_bottom_right_tag', [
            'group' => 'Product Tag Section',
            'type' => 'text',
            'backend' => '',
            'frontend' => '',
            'label' => 'Product Bottom Right Tag',
            'input' => 'textarea',
            'class' => '',
            'source' => '',
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'wysiwyg_enabled' => true,
            'is_html_allowed_on_front' => true,
            'visible' => true,
            'required' => false,
            'user_defined' => false,
            'default' => '',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => false,
            'used_in_product_listing' => true,
            'unique' => false,
            'apply_to' => ''
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies() {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases() {
        return [];
    }
}