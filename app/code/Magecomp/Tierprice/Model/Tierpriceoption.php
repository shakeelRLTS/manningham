<?php 
/**
 * Magento Tierprice Extension
 *
 * @category   Magecomp
 * @package    Magecomp_Tierprice
 * @author     Magecomp Tierprice 
**/
namespace Magecomp\Tierprice\Model;

class Tierpriceoption
{
    public function toOptionArray()
    {
        return [
			['value' => 1,'label' => 'Label Format'],
            ['value' => 2,'label' => 'Tabular Format']                 
        ];
    }
}
