<?php

namespace RLTSquare\CustomImportExport\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;

/**
 *  Manniegham Product Attributes Patch
 */
class MannieghamProductAttrUpdated implements DataPatchInterface
{
    const PROD_ATTR_ZONE = "zone";
    private $zone = [
        "Bathroom",
        "Indoor",
        "Outdoor",
        "Un-Zoned"
    ];

    const PROD_ATTR_BULB_COLOR = "bulb_color";
    private $color = [
        "CCT",
        "Cool White",
        "Daylight White",
        "Warm White"
    ];

    const PROD_ATTR_KeLVIN = "kelvin";
    private $kelvin = [
        "1800",
        "2000",
        "2200",
        "2300",
        "2500",
        "2600",
        "2700",
        "2800",
        "2900",
        "3000",
        "4000",
        "4200",
        "6250",
        "6500"
    ];

    const PROD_ATTR_ENERGY_RATING = "energy_rating";
    private $rating = [
        "A",
        "A+",
        "A++",
        "B",
        "C",
        "D",
        "E"
    ];

    const PROD_ATTR_DIMMABLE = "dimmable";
    private $dimmable = [
        "Dimmable",
        "Dimmer Included",
        "Non-dimmable",
        "Not Applicable",
        "Step dimmable"
    ];

    const PROD_ATTR_SENSOR = "sensor";
    private $sensor = [
        "Manual override PIR",
        "Photocell & PIR",
        "PIR"
    ];

    const PROD_ATTR_VOLTAGE = "voltage";
    private $voltage = [
        "220-240V",
        "3.7V",
        "Not Applicable"
    ];

    const PROD_ATTR_TESTING_CLASS = "testing_class";
    private $testingClass = [
        "Class 1",
        "Class 2",
        "Class 3",
        "n/a",
        "TBC"
    ];

    const PROD_ATTR_TYPE = "prod_type";
    const PROD_ATTR_BRAND = "brand";
    const PROD_ATTR_SUITE_NAME = "suite_name";
    const PROD_ATTR_MATERIAL = "material";
    const PROD_ATTR_FINISH_DESCRIPTION = "finish_description";
    const PROD_ATTR_BULB_CAP_TYPE_PRIMARY = "bulb_cap_type_primary";
    const PROD_ATTR_LUMENS = "lumens";
    const PROD_ATTR_BARC_EAN = "barc_ean_13_no";

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * ComingSoonAttributes constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return MannieghamProductAttrUpdated|void
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Zend_Validate_Exception
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_ZONE)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_ZONE,
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Zone',
                    'option' => ['values' => $this->zone],
                    'input' => 'select',
                    'class' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_grid' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'sort_order' => '970',
                    'apply_to' => ''
                ]
            );
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_BULB_COLOR)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_BULB_COLOR,
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Bulb Color',
                    'option' => ['values' => $this->color],
                    'input' => 'select',
                    'class' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_grid' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'sort_order' => '970',
                    'apply_to' => ''
                ]
            );
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_KeLVIN)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_KeLVIN,
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Kelvin',
                    'option' => ['values' => $this->kelvin],
                    'input' => 'select',
                    'class' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_grid' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'sort_order' => '970',
                    'apply_to' => ''
                ]
            );
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_ENERGY_RATING)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_ENERGY_RATING,
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Energy Rating',
                    'option' => ['values' => $this->rating],
                    'input' => 'select',
                    'class' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_grid' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'sort_order' => '970',
                    'apply_to' => ''
                ]
            );
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_DIMMABLE)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_DIMMABLE,
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Dimmable',
                    'option' => ['values' => $this->dimmable],
                    'input' => 'select',
                    'class' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_grid' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'sort_order' => '970',
                    'apply_to' => ''
                ]
            );
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_SENSOR)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_SENSOR,
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Sensor',
                    'option' => ['values' => $this->sensor],
                    'input' => 'select',
                    'class' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_grid' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'sort_order' => '970',
                    'apply_to' => ''
                ]
            );
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_VOLTAGE)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_VOLTAGE,
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Voltage',
                    'option' => ['values' => $this->voltage],
                    'input' => 'select',
                    'class' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_grid' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'sort_order' => '970',
                    'apply_to' => ''
                ]
            );
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_TESTING_CLASS)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_TESTING_CLASS,
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Testing Class',
                    'option' => ['values' => $this->testingClass],
                    'input' => 'select',
                    'class' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_grid' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'sort_order' => '970',
                    'apply_to' => ''
                ]
            );
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_TYPE)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_TYPE, [
                'group' => 'General',
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Product Type',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
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
                'sort_order' => '990',
                'apply_to' => ''
            ]);
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_BRAND)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_BRAND, [
                'group' => 'General',
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Brand',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
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
                'sort_order' => '990',
                'apply_to' => ''
            ]);
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_MATERIAL)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_MATERIAL, [
                'group' => 'General',
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Material',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
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
                'sort_order' => '990',
                'apply_to' => ''
            ]);
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_FINISH_DESCRIPTION)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_FINISH_DESCRIPTION, [
                'group' => 'General',
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Finish Description',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
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
                'sort_order' => '990',
                'apply_to' => ''
            ]);
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_BULB_CAP_TYPE_PRIMARY)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_BULB_CAP_TYPE_PRIMARY, [
                'group' => 'General',
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Bulb Cap Type',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
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
                'sort_order' => '990',
                'apply_to' => ''
            ]);
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_LUMENS)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_LUMENS, [
                'group' => 'General',
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Lumens',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
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
                'sort_order' => '990',
                'apply_to' => ''
            ]);
        }

        if (!$eavSetup->getAttribute(Product::ENTITY, self::PROD_ATTR_BARC_EAN)) {
            $eavSetup->addAttribute(Product::ENTITY, self::PROD_ATTR_BARC_EAN, [
                'group' => 'General',
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Barcode EAN',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
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
                'sort_order' => '990',
                'apply_to' => ''
            ]);
        }
    }

    /**
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }
}
