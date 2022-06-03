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
class Importcustomersaddress extends \Magento\Backend\App\Action implements HttpPostActionInterface
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

                $filepath = 'export/newcustomersaddress.csv';
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
                        $CustomerModel = $objectManager->create('Magento\Customer\Model\Customer');
                        $CustomerModel->setWebsiteId(1);
                        $CustomerModel->loadByEmail($data[4]);
                        $userId = $CustomerModel->getId();
                        $productData['_website'] = 'base';
                        $productData['_email'] = $data[4];
                        $productData['_entity_id'] = $userId;
                        if ($data[17] == '') {
                            $productData['city'] = 'xyz';
                        } else {
                            $productData['city'] = $data[17];
                        }
                        $productData['company'] = $data[14];
                        $productData['country_id'] = $data[19];
                        $productData['fax'] = '';
                        $productData['firstname'] = $data[12];
                        $productData['lastname'] = $data[13];
                        $productData['middlename'] = '';
                        $productData['postcode'] = $data[18];
                        $productData['prefix'] = '';
                        $productData['region'] = $data[20];
                        $productData['region_id'] = 0;
                        $productData['street'] = $data[15];
                        $productData['suffix'] = '';
                        $productData['telephone'] = $data[22];
                        $productData['vat_id'] = '';
                        $productData['vat_is_valid'] = '';
                        $productData['vat_request_date'] = '';
                        $productData['vat_request_id'] = '';
                        $productData['vat_request_success'] = '';
                        $productData['_address_default_billing_'] = 1;
                        $productData['_address_default_shipping_'] = '';
                        $stream->writeCsv($productData);
                        if ($data[23] != '') {
                            $productData['_website'] = 'base';
                            $productData['_email'] = $data[4];
                            $productData['_entity_id'] = $userId;
                            if ($data[28] == '') {
                                $productData['city'] = 'xyz';
                            } else {
                                $productData['city'] = $data[28];
                            }
                            $productData['company'] = $data[25];
                            $productData['country_id'] = $data[30];
                            $productData['fax'] = '';
                            $productData['firstname'] = $data[23];
                            $productData['lastname'] = $data[24];
                            $productData['middlename'] = '';
                            $productData['postcode'] = $data[29];
                            $productData['prefix'] = '';
                            $productData['region'] = $data[31];
                            $productData['region_id'] = 0;
                            $productData['street'] = $data[26];
                            $productData['suffix'] = '';
                            $productData['telephone'] = $data[22];
                            $productData['vat_id'] = '';
                            $productData['vat_is_valid'] = '';
                            $productData['vat_request_date'] = '';
                            $productData['vat_request_id'] = '';
                            $productData['vat_request_success'] = '';
                            $productData['_address_default_billing_'] = '';
                            $productData['_address_default_shipping_'] = '1';
                            $stream->writeCsv($productData);
                        }
                    }
                }
                $content = [];
                $content['type'] = 'filename'; // must keep filename
                $content['value'] = $filepath;
                $content['rm'] = '1'; //remove csv from var folder

                $csvfilename = 'newcustomersaddress.csv';
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
            0 => '_website',
            1 => '_email',
            2 => '_entity_id',
            3 => 'city',
            4 => 'company',
            5 => 'country_id',
            6 => 'fax',
            7 => 'firstname',
            8 => 'lastname',
            9 => 'middlename',
            10 => 'postcode',
            11 => 'prefix',
            12 => 'region',
            13 => 'region_id',
            14 => 'street',
            15 => 'suffix',
            16 => 'telephone',
            17 => 'vat_id',
            18 => 'vat_is_valid',
            19 => 'vat_request_date',
            20 => 'vat_request_id',
            21 => 'vat_request_success',
            22 => '_address_default_billing_',
            23 => '_address_default_shipping_'
            ];

        return $cols;
    }
}
