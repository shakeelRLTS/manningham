<?php
/**
 * @author RLTSquare Team
 * Created by PhpStorm
 * User: Umer
 * Date: 16/06/2021
 * Time: 11:09 AM
 */
namespace RLTSquare\CustomImportExport\Controller\Adminhtml\Import;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend(__('ImportExport'));
        return $resultPage;
    }
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('RLTSquare_CustomImportExport::rltsquare');
        $resultPage->addBreadcrumb(__('ImportExport'), __('ImportExport'));
        return $resultPage;
    }
}
