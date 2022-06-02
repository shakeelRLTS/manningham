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
class Importcustomorders extends \Magento\Backend\App\Action implements HttpPostActionInterface
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
                $orderids = [];

                $filepath = 'export/neworders.csv';
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
                        $productData['sku'] = $data[0];
                        $productData['tier_price_website'] = 'All Websites [GBP]';
                        $productData['tier_price_customer_group'] = 'ALL GROUPS';
                        $productData['tier_price_qty'] = '5';
                        $productData['tier_price'] = '8';
                        $productData['tier_price_value_type'] = 'Discount';

                        $stream->writeCsv($productData);

                        $productData = [];
                        $productData['sku'] = $data[0];
                        $productData['tier_price_website'] = 'All Websites [GBP]';
                        $productData['tier_price_customer_group'] = 'ALL GROUPS';
                        $productData['tier_price_qty'] = '10';
                        $productData['tier_price'] = '10';
                        $productData['tier_price_value_type'] = 'Discount';

                        $stream->writeCsv($productData);

                    }
                }
                $content = [];
                $content['type'] = 'filename'; // must keep filename
                $content['value'] = $filepath;
                $content['rm'] = '1'; //remove csv from var folder

                $csvfilename = 'Product.csv';
                $this->messageManager->addSuccess(__('The Promoted Products have been imported.'));
                return $this->fileFactory->create($csvfilename, $content, DirectoryList::VAR_DIR);
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(__($e->getMessage()));
            }
        } else {
            $this->messageManager->addError(__($e->getMessage()));
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
            1 => 'Type',
            2 => 'SKU',
            3 => 'Name',
            4 => 'Published',
            5 => 'Is featured?',
            6 => 'Visibility in catalog',
            7 => 'Short description',
            8 => 'Description',
            9 => 'Date sale price starts',
            10 => 'Date sale price ends',
            11 => 'Tax status',
            12 => 'Tax class',
            13 => 'In stock?',
            14 => 'Stock',
            15 => 'Low stock amount',
            16 => 'Backorders allowed?',
            17 => 'Sold individually?',
            18 => 'Weight (kg)',
            19 => 'Length (cm)',
            20 => 'Width (cm)',
            21 => 'Height (cm)',
            22 => 'Allow customer reviews?',
            23 => 'Purchase note',
            24 => 'Sale price',
            25 => 'Regular price',
            26 => 'Categories',
            27 => 'Tags',
            28 => 'Shipping class',
            29 => 'Images',
            30 => 'Download limit',
            31 => 'Download expiry days',
            32 => 'Parent',
            33 => 'Grouped products',
            34 => 'Upsells',
            35 => 'Cross-sells',
            36 => 'External URL',
            37 => 'Button text',
            38 => 'Position',
            39 => 'Attribute 1 name',
            40 => 'Attribute 1 value(s)',
            41 => 'Attribute 1 visible',
            42 => 'Attribute 1 global',
            43 => 'Meta: Features',
            44 => 'Meta: Overview',
            45 => 'Meta: _yoast_wpseo_title',
            46 => 'Meta: _yoast_wpseo_metadesc',
            47 => 'Meta: overview-heading',
            48 => 'Meta: _overview-heading',
            49 => 'Meta: col-1-image',
            50 => 'Meta: _col-1-image',
            51 => 'Meta: col-1-heading',
            52 => 'Meta: _col-1-heading',
            53 => 'Meta: col-1-desc',
            54 => 'Meta: _col-1-desc',
            55 => 'Meta: col-2-image',
            56 => 'Meta: _col-2-image',
            57 => 'Meta: col-2-heading',
            58 => 'Meta: _col-2-heading',
            59 => 'Meta: col-2-desc',
            60 => 'Meta: _col-2-desc',
            61 => 'Meta: col-3-image',
            62 => 'Meta: _col-3-image',
            63 => 'Meta: col-3-heading',
            64 => 'Meta: _col-3-heading',
            65 => 'Meta: col-3-desc',
            66 => 'Meta: _col-3-desc',
            67 => 'Meta: where_to_buy',
            68 => 'Meta: _where_to_buy',
            69 => 'Meta: _yoast_wpseo_content_score',
            70 => 'Meta: _wpuf_form_id',
            71 => 'Meta: _wpuf_lock_editing_post',
            72 => 'Meta: _wpuf_res_display',
            73 => 'Meta: _sub_allowed_term_ids',
            74 => 'Meta: _wp_old_date',
            75 => 'Meta: _yoast_wpseo_primary_product_cat',
            76 => 'Meta: FAQ',
            77 => 'Meta: custom_permalink',
            78 => 'Meta: _yoast_wpseo_meta-robots-noindex',
            79 => 'Meta: _yoast_wpseo_meta-robots-nofollow',
            80 => 'Meta: Info',
            81 => 'Attribute 2 name',
            82 => 'Attribute 2 value(s)',
            83 => 'Attribute 2 visible',
            84 => 'Attribute 2 global',
            85 => 'Meta: _wpcom_is_markdown',
            86 => 'Meta: overview',
            87 => 'Meta: _yoast_wpseo_focuskw',
            88 => 'Meta: _yoast_wpseo_linkdex'
        ];
        return $cols;
    }

    public function sampleCols()
    {


        $cols = [
            0 => 'sku',
            1 => 'tier_price_website',
            2 => 'tier_price_customer_group',
            3 => 'tier_price_qty',
            4 => 'tier_price',
            5 => 'tier_price_value_type'

        ];
        return $cols;
    }
}
