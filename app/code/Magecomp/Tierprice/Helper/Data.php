<?php 

/**
 * Magento Tierprice Extension
 *
 * @category   Magecomp
 * @package    Magecomp_Tierprice
 * @author     Magecomp Tierprice 
**/

namespace Magecomp\Tierprice\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Data extends AbstractHelper
{
    public function __construct(Context $context) 
    {
        parent::__construct($context);
    }

	public function getStyle()
	{
		return $this->scopeConfig->getValue('tierprice/general/show', ScopeInterface::SCOPE_STORE);
    }
	
	public function IsTierLabelDisplay()
	{
		$styleid = $this->getStyle();
		if($styleid == 1)
			return true;
		else
			return false;
	}
	
	
	public function IsTierDropdownDisplay()
	{
		$styleid = $this->getStyle();
		if($styleid == 2)
			return true;
		else
			return false;
	}
	
	public function getMessageLabel()
	{
		return $this->scopeConfig->getValue('tierprice/general/tiermessage', ScopeInterface::SCOPE_STORE);
	}
}