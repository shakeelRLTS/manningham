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
class MannieghamProductAttr744 implements DataPatchInterface
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
     * @return MannieghamProductAttr|void
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Zend_Validate_Exception
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->removeAttribute(Product::ENTITY, self::PROD_ATTR_KeLVIN);

    }

    /**
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }
}
