<?php

namespace RLTSquare\WhatsAppChat\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

/**
 * Helper Data
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @param Context $context
     */
	public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * @return mixed
     */
	public function getStatus(){
		return $this->scopeConfig->getValue('whatsApp/whatsapp_chat/status', ScopeInterface::SCOPE_STORE);
	}

    /**
     * @return mixed
     */
    public function getPhone(){
        return $this->scopeConfig->getValue('whatsApp/whatsapp_chat/phone_number', ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getMessage(){
        return $this->scopeConfig->getValue('whatsApp/whatsapp_chat/message', ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getGeneralStatus(){
        return $this->scopeConfig->getValue('whatsApp/general/general_status', ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getGeneralPhone(){
        return $this->scopeConfig->getValue('whatsApp/general/general_phone', ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getGeneralMessage(){
        return $this->scopeConfig->getValue('whatsApp/general/general_message', ScopeInterface::SCOPE_STORE);
    }

}
