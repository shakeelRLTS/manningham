<?php
/**
 * @author RLTSquare Team
 * Created by PhpStorm
 * User: Umer
 * Date: 16/06/2021
 * Time: 1:10 PM
 */
namespace RLTSquare\CustomImportExport\Controller\Adminhtml\Import;

use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Controller\ResultFactory;

/**
 * PLEASE ENTER ONE LINE SHORT DESCRIPTION OF CLASS
 * Class Importproducts
 */
class Importcustomers extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    private $fileFactory;
    private $directory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        \Magento\Framework\Filesystem $filesystem
    ) {
        $this->fileFactory = $fileFactory;
        $this->directory = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
        parent::__construct($context);
    }

    public function execute()
    {
        if ($this->getRequest()->isPost() && !empty($this->getRequest()->isPost())) {
            try {
                $file = $this->getRequest()->getFiles('import_promotedproduct_file');
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                $fileCsv = $objectManager->Create('\Magento\Framework\File\Csv');
                $csvData = $fileCsv->getData($file['tmp_name']);
                $newData = [];

                $filepath = 'export/newcustomers.csv';
                //$this->directory->create('export');
                $stream = $this->directory->openFile($filepath, 'w+');
                $stream->lock();
                $newData[] = $this->sampleCols();
                $headers = [];
                foreach ($newData as $datum => $val) {
                    foreach ($val as $val2) {
                        $headers[] = $val2;
                    }
                }
                $stream->writeCsv($headers);
                foreach ($csvData as $row => $data) {
                    if ($row > 0) {
                        $productData = [];
                        $productData['email'] = $data[4];
                        $productData['_website'] = 'base';
                        $productData['_store'] = 'default';
                        $productData['website_id'] = 1;
                        $productData['created_in'] = 'Default Store View';
                        $productData['firstname'] = $data[8];
                        $productData['middlename'] = '';
                        $productData['lastname'] = $data[9];
                        $productData['group_id'] = '1';
                        $productData['dob'] = '';
                        $productData['taxvat'] = '';
                        $productData['confirmation'] = '';
                        $productData['created_at'] = $data[6];
                        $productData['gender'] = '';
                        $productData['disable_auto_group_change'] = 0;
                        $productData['failures_num'] = 0;
                        $productData['first_failure'] = '';
                        $productData['lock_expires'] = '';
                        $productData['password_hash'] = $data[2];
                        $productData['prefix'] = '';
                        $productData['rp_token'] = '';
                        $productData['rp_token_created_at'] = '';
                        $productData['store_id'] = 1;
                        $productData['suffix'] = '';
                        $productData['updated_at'] = '';
                        $productData['password'] = '';

                        $newData[] = $productData;
                        $stream->writeCsv($productData);
                    }
                }
                $content = [];
                $content['type'] = 'filename'; // must keep filename
                $content['value'] = $filepath;
                $content['rm'] = '1'; //remove csv from var folder

                $csvfilename = 'Customers.csv';
                $this->messageManager->addSuccess(__('The Promoted Products have been imported.'));
                return $this->fileFactory->create($csvfilename, $content, DirectoryList::VAR_DIR);
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(__($e->getMessage()));
            }
        }
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRedirectUrl());
        return $resultRedirect;
    }

    public function getImportCsvCols()
    {
        $cols = [
            0 => 'ID',
            1 => 'user_login',
            2 => 'user_pass',
            3 => 'user_nickname',
            4 => 'user_email',
            5 => 'user_url',
            6 => 'user_registered',
            7 => 'display_name',
            8 => 'first_name',
            9 => 'last_name',
            10 => 'user_status',
            11 => 'roles',
            12 => 'billing_first_name',
            13 => 'billing_last_name',
            14 => 'billing_company',
            15 => 'billing_address_1',
            16 => 'billing_address_2',
            17 => 'billing_city',
            18 => 'billing_postcode',
            19 => 'billing_country',
            20 => 'billing_state',
            21 => 'billing_email',
            22 => 'billing_phone',
            23 => 'shipping_first_name',
            24 => 'shipping_last_name',
            25 => 'shipping_company',
            26 => 'shipping_address_1',
            27 => 'shipping_address_2',
            28 => 'shipping_city',
            29 => 'shipping_postcode',
            30 => 'shipping_country',
            31 => 'shipping_state'
        ];
        return $cols;
    }

    public function sampleCols()
    {
        $cols = [
            0 => 'email',
            1 => '_website',
            2 => '_store',
            3 => 'website_id',
            4 => 'created_in',
            5 => 'firstname',
            6 => 'middlename',
            7 => 'lastname',
            8 => 'group_id',
            9 => 'dob',
            10 => 'taxvat',
            11 => 'confirmation',
            12 => 'created_at',
            13 => 'gender',
            14 => 'disable_auto_group_change',
            15 => 'failures_num',
            16 => 'first_failure',
            17 => 'lock_expires',
            18 => 'password_hash',
            19 => 'prefix',
            20 => 'rp_token',
            21 => 'rp_token_created_at',
            22 => 'store_id',
            23 => 'suffix',
            24 => 'updated_at',
            25 => 'password'];

        return $cols;
    }
}
