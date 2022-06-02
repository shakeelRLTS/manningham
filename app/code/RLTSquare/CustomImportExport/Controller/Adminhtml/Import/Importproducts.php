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
class Importproducts extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    private $fileFactory;
    private $directory;

    public function __construct(
        \Magento\Backend\App\Action\Context              $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        \Magento\Framework\Filesystem                    $filesystem
    )
    {
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

                $filepath = 'export/newproducts.csv';
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
                $headings = $csvData[0];
                foreach ($csvData as $row => $data) {
                    if ($row > 0) {
                        $productData = [];
                        $productData['sku'] = $data[0];
                        $productData['store_view_code'] = '';
                        $productData['attribute_set_code'] = 'Default';
                        $type = 'simple';
                        $visible = 'Catalog, Search';
                        $productData['product_type'] = $type;
                        $categories = 'Default Category/' . $data[4];
                        $productData['categories'] = $categories;
                        $productData['product_websites'] = 'base';
                        $productData['name'] = $data[6];
//                        $description = $headings[10]." : ".$data[10]."\n".$headings[12]." : ".$data[12]."\n".$headings[15]." : ".$data[15]
//                            ."\n".$headings[17]." : ".$data[17]."\n".$headings[18]." : ".$data[18]."\n".$headings[19]." : ".$data[19]."\n".$headings[20]." : ".$data[20]
//                            ."\n".$headings[21]." : ".$data[21]."\n".$headings[22]." : ".$data[22]."\n".$headings[24]." : ".$data[24]."\n".$headings[25]." : ".$data[25]
//                            ."\n".$headings[27]." : ".$data[27]."\n".$headings[28]." : ".$data[28]."\n".$headings[29]." : ".$data[29]."\n".$headings[30]." : ".$data[30]
//                            ."\n".$headings[31]." : ".$data[31]."\n".$headings[32]." : ".$data[32]."\n".$headings[33]." : ".$data[33]."\n".$headings[35]." : ".$data[35]
//                            ."\n".$headings[36]." : ".$data[36]."\n".$headings[37]." : ".$data[37]."\n".$headings[38]." : ".$data[38]."\n".$headings[39]." : ".$data[39]
//                            ."\n".$headings[40]." : ".$data[40]."\n".$headings[43]." : ".$data[43]."\n".$headings[44]." : ".$data[44]."\n".$headings[45]." : ".$data[45]
//                            ."\n".$headings[46]." : ".$data[46]."\n".$headings[47]." : ".$data[47];
                        $description = '<table class="data table additional-attributes" id="product-attribute-specs-table">
                                            <caption class="table-caption">More Information</caption>
                                            <tbody>';

                        if ($data[43] != '') {
                            $description .= '<tr>
                                              <td class="col data" data-th="' . $headings[43] . '">' . $data[43] . '</td>
                                            </tr>';
                        }

                        if ($data[44] != '') {
                            $description .= '<tr>
                                              <td class="col data" data-th="' . $headings[44] . '">' . $data[44] . '</td>
                                            </tr>';
                        }

                        if ($data[45] != '') {
                            $description .= '<tr>
                                              <td class="col data" data-th="' . $headings[45] . '">' . $data[45] . '</td>
                                            </tr>';
                        }

                        if ($data[46] != '') {
                            $description .= '<tr>
                                              <td class="col data" data-th="' . $headings[46] . '">' . $data[46] . '</td>
                                            </tr>';
                        }

//                        if ($data[9] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[9].'</th>
//                                                    <td class="col data" data-th="'.$headings[9].'">'.$data[9].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[10] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[10].'</th>
//                                                    <td class="col data" data-th="'.$headings[10].'">'.$data[10].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[12] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[12].'</th>
//                                                    <td class="col data" data-th="'.$headings[12].'">'.$data[12].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[15] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[15].'</th>
//                                                    <td class="col data" data-th="'.$headings[15].'">'.$data[15].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[17] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[17].'</th>
//                                                    <td class="col data" data-th="'.$headings[17].'">'.$data[17].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[18] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[18].'</th>
//                                                    <td class="col data" data-th="'.$headings[18].'">'.$data[18].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[19] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[19].'</th>
//                                                    <td class="col data" data-th="'.$headings[19].'">'.$data[19].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[20] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[20].'</th>
//                                                    <td class="col data" data-th="'.$headings[20].'">'.$data[20].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[21] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[21].'</th>
//                                                    <td class="col data" data-th="'.$headings[21].'">'.$data[21].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[22] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[22].'</th>
//                                                    <td class="col data" data-th="'.$headings[22].'">'.$data[22].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[24] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[24].'</th>
//                                                    <td class="col data" data-th="'.$headings[24].'">'.$data[24].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[25] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[25].'</th>
//                                                    <td class="col data" data-th="'.$headings[25].'">'.$data[25].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[27] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[27].'</th>
//                                                    <td class="col data" data-th="'.$headings[27].'">'.$data[27].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[28] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[28].'</th>
//                                                    <td class="col data" data-th="'.$headings[28].'">'.$data[28].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[29] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[29].'</th>
//                                                    <td class="col data" data-th="'.$headings[29].'">'.$data[29].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[30] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[30].'</th>
//                                                    <td class="col data" data-th="'.$headings[30].'">'.$data[30].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[31] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[31].'</th>
//                                                    <td class="col data" data-th="'.$headings[31].'">'.$data[31].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[32] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[32].'</th>
//                                                    <td class="col data" data-th="'.$headings[32].'">'.$data[32].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[33] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[33].'</th>
//                                                    <td class="col data" data-th="'.$headings[33].'">'.$data[33].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[35] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[35].'</th>
//                                                    <td class="col data" data-th="'.$headings[35].'">'.$data[35].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[36] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[36].'</th>
//                                                    <td class="col data" data-th="'.$headings[36].'">'.$data[36].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[37] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[37].'</th>
//                                                    <td class="col data" data-th="'.$headings[37].'">'.$data[37].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[38] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[38].'</th>
//                                                    <td class="col data" data-th="'.$headings[38].'">'.$data[38].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[39] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[39].'</th>
//                                                    <td class="col data" data-th="'.$headings[39].'">'.$data[39].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[40] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[40].'</th>
//                                                    <td class="col data" data-th="'.$headings[40].'">'.$data[40].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[43] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[43].'</th>
//                                                    <td class="col data" data-th="'.$headings[43].'">'.$data[43].'</td>
//                                                </tr>';
//                        }
//
//                        if ($data[49] != '') {
//                            $description.= '<tr>
//                                                    <th class="col label" scope="row">'.$headings[49].'</th>
//                                                    <td class="col data" data-th="'.$headings[49].'">'.$data[49].'</td>
//                                                </tr>';
//                        }
                        $description .= '</tbody>
                                        </table>';

                        $productData['description'] = $description;
                        $shortDes = '<div class="key-features-section">
                                        <div class="key-features-title">Key Features:</div>
                                        <ul>';

                        if ($data[59] != '') {
                            $shortDes .= '<li>
                                                <label class="label">' . $headings[59] . '</label>
                                                <span class="data">' . $data[59] . '</span>
                                            </li>';
                        }

                        if ($data[0] != '') {
                            $shortDes .= '<li>
                                                <label class="label">' . $headings[0] . '</label>
                                                <span class="data">' . $data[0] . '</span>
                                            </li>';
                        }

                        if ($data[1] != '') {
                            $shortDes .= '<li>
                                                <label class="label">' . $headings[1] . '</label>
                                                <span class="data">' . $data[1] . '</span>
                                            </li>';
                        }

                        if ($data[7] != '') {
                            $shortDes .= '<li>
                                                <label class="label">' . $headings[7] . '</label>
                                                <span class="data">' . $data[7] . '</span>
                                            </li>';
                        }

                        if ($data[8] != '') {
                            $shortDes .= '<li>
                                                <label class="label">' . $headings[8] . '</label>
                                                <span class="data">' . $data[8] . '</span>
                                            </li>';
                        }

                        $shortDes .= '</ul>
                                        <div class="key-features-more-info-btn">
                                            <a class="action add" href="{{store url=""}}#specification">View Full Specification</a>
                                        </div>
                                    </div>';


                        $productData['short_description'] = $shortDes;
                        $productData['weight'] = $data[49];
                        $productData['product_online'] = '1';
                        $productData['tax_class_name'] = 'Taxable Goods';
                        $productData['visibility'] = $visible;
                        $productData['price'] = $data[2];
                        $productData['special_price'] = '';
                        $productData['special_price_from_date'] = '';
                        $productData['special_price_to_date'] = '';
                        $myString = str_replace('-', ' ', $data[6]);
                        $myString = str_replace('   ', ' ', $myString);
                        $myString = str_replace(' ', '-', $myString);
                        $myString = strtolower($myString);
                        $myStringUnique = rand(1, 100);
                        $productData['url_key'] = $myString . '_' . $myStringUnique;
                        $productData['meta_title'] = $data[6];
                        $productData['meta_keywords'] = '';
                        $productData['meta_description'] = $data[6];
                        $productData['base_image'] = $data[50];
                        $productData['base_image_label'] = '';
                        $productData['small_image'] = $data[50];
                        $productData['small_image_label'] = '';
                        $productData['thumbnail_image'] = $data[50];
                        $productData['thumbnail_image_label'] = '';
                        $productData['swatch_image'] = $data[50];
                        $productData['swatch_image_label'] = '';
                        $productData['created_at'] = '';
                        $productData['updated_at'] = '';
                        $productData['new_from_date'] = '';
                        $productData['new_to_date'] = '';
                        $productData['display_product_options_in'] = 'Block after Info Column';
                        $productData['map_price'] = '';
                        $productData['msrp_price'] = '';
                        $productData['map_enabled'] = '';
                        $productData['gift_message_available'] = '';
                        $productData['custom_design'] = '';
                        $productData['custom_design_from'] = '';
                        $productData['custom_design_to'] = '';
                        $productData['custom_layout_update'] = '';
                        $productData['page_layout'] = '';
                        $productData['product_options_container'] = '';
                        $productData['msrp_display_actual_price_type'] = 'Use config';
                        $productData['country_of_manufacture'] = '';

                        $productSpecs = '<table class="data table additional-attributes" id="product-attribute-specs-table">
                                            <caption class="table-caption">More Information</caption>
                                            <tbody>';

                        if ($data[59] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[59] . '</th>
                                                    <td class="col data" data-th="' . $headings[59] . '">' . $data[59] . '</td>
                                                </tr>';
                        }

                        if ($data[0] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[0] . '</th>
                                                    <td class="col data" data-th="' . $headings[0] . '">' . $data[0] . '</td>
                                                </tr>';
                        }

                        if ($data[1] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[1] . '</th>
                                                    <td class="col data" data-th="' . $headings[1] . '">' . $data[1] . '</td>
                                                </tr>';
                        }


                        if ($data[3] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[3] . '</th>
                                                    <td class="col data" data-th="' . $headings[3] . '">' . $data[3] . '</td>
                                                </tr>';
                        }

                        if ($data[5] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[5] . '</th>
                                                    <td class="col data" data-th="' . $headings[5] . '">' . $data[5] . '</td>
                                                </tr>';
                        }

                        if ($data[7] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[7] . '</th>
                                                    <td class="col data" data-th="' . $headings[7] . '">' . $data[7] . '</td>
                                                </tr>';
                        }

                        if ($data[8] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[8] . '</th>
                                                    <td class="col data" data-th="' . $headings[8] . '">' . $data[8] . '</td>
                                                </tr>';
                        }

                        if ($data[9] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[9] . '</th>
                                                    <td class="col data" data-th="' . $headings[9] . '">' . $data[9] . '</td>
                                                </tr>';
                        }

                        if ($data[10] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[10] . '</th>
                                                    <td class="col data" data-th="' . $headings[10] . '">' . $data[10] . '</td>
                                                </tr>';
                        }

                        if ($data[12] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[12] . '</th>
                                                    <td class="col data" data-th="' . $headings[12] . '">' . $data[12] . '</td>
                                                </tr>';
                        }

                        if ($data[13] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[13] . '</th>
                                                    <td class="col data" data-th="' . $headings[13] . '">' . $data[13] . '</td>
                                                </tr>';
                        }

                        if ($data[14] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[14] . '</th>
                                                    <td class="col data" data-th="' . $headings[14] . '">' . $data[14] . '</td>
                                                </tr>';
                        }

                        if ($data[15] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[15] . '</th>
                                                    <td class="col data" data-th="' . $headings[15] . '">' . $data[15] . '</td>
                                                </tr>';
                        }

                        if ($data[16] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[16] . '</th>
                                                    <td class="col data" data-th="' . $headings[16] . '">' . $data[16] . '</td>
                                                </tr>';
                        }

                        if ($data[17] != '') {
                            if (is_numeric($data[17][0])) {
                                $productSpecs .= '<tr>
                                                <th class="col label" scope="row">' . $headings[17] . '</th>
                                                    <td class="col data" data-th="' . $headings[17] . '">' . $data[17] . '</td>
                                                    }
                                                </tr>';
                            }else{
                                $tempPrice=str_replace($data[17][0],'',$data[17]);
                                $productSpecs .= '<tr>
                                                <th class="col label" scope="row">' . $headings[17] . '</th>
                                                    <td class="col data" data-th="' . $headings[17] . '">' . $tempPrice . '</td>
                                                    }
                                                </tr>';
                            }
                        }

                        if ($data[18] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[18] . '</th>
                                                    <td class="col data" data-th="' . $headings[18] . '">' . $data[18] . '</td>
                                                </tr>';
                        }

                        if ($data[23] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[23] . '</th>
                                                    <td class="col data" data-th="' . $headings[23] . '">' . $data[23] . '</td>
                                                </tr>';
                        }

                        if ($data[24] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[24] . '</th>
                                                    <td class="col data" data-th="' . $headings[24] . '">' . $data[24] . '</td>
                                                </tr>';
                        }

                        if ($data[26] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[26] . '</th>
                                                    <td class="col data" data-th="' . $headings[26] . '">' . $data[26] . '</td>
                                                </tr>';
                        }

                        if ($data[30] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[30] . '</th>
                                                    <td class="col data" data-th="' . $headings[30] . '">' . $data[30] . '</td>
                                                </tr>';
                        }

                        if ($data[34] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[34] . '</th>
                                                    <td class="col data" data-th="' . $headings[34] . '">' . $data[34] . '</td>
                                                </tr>';
                        }

                        if ($data[41] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[41] . '</th>
                                                    <td class="col data" data-th="' . $headings[41] . '">' . $data[41] . '</td>
                                                </tr>';
                        }

                        if ($data[42] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[42] . '</th>
                                                    <td class="col data" data-th="' . $headings[42] . '">' . $data[42] . '</td>
                                                </tr>';
                        }

                        if ($data[48] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[48] . '</th>
                                                    <td class="col data" data-th="' . $headings[48] . '">' . $data[48] . '</td>
                                                </tr>';
                        }

                        if ($data[49] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[49] . '</th>
                                                    <td class="col data" data-th="' . $headings[49] . '">' . $data[49] . '</td>
                                                </tr>';
                        }

                        if ($data[25] != '') {
                            $productSpecs .= '<tr>
                                                    <th class="col label" scope="row">' . $headings[25] . '</th>
                                                    <td class="col data" data-th="' . $headings[25] . '">' . $data[25] . '</td>
                                                </tr>';
                        }

                        $productSpecs .= '</tbody>
                                        </table>';

                        $productData['additional_attributes'] = 'suite_name=' . $data[1] . ',zone=' . $data[3] . ',prod_type=' . $data[5] . ',material=' . $data[7]
                            . ',finish_description=' . $data[8] . ',bulb_cap_type_primary=' . $data[11] . ',bulb_color=' . $data[13] . ',lumens=' . $data[14] . ',kelvin=' . $data[16]
                            . ',energy_rating=' . $data[23] . ',dimmable=' . $data[26] . ',sensor=' . $data[34] . ',voltage=' . $data[41] . ',testing_class=' . $data[42]
                            . ',barc_ean_13_no=' . $data[48] . ',product_specification=' . $productSpecs . ',brand=' . $data[59];

//                        $attrstr = '';
//
//                        if ($data[1] != '') {
//                            $attrstr.= 'suite_name='.$data[1];
//                        }
//                        if ($data[3] != '') {
//                            $attrstr.= ',zone='.$data[3];
//                        }
//                        if ($data[5] != '') {
//                            $attrstr.= ',prod_type='.$data[5];
//                        }
//                        if ($data[7] != '') {
//                            $attrstr.= ',material='.$data[7];
//                        }
//                        if ($data[8] != '') {
//                            $attrstr.= ',finish_description='.$data[8];
//                        }
//                        if ($data[11] != '') {
//                            $attrstr.= ',bulb_cap_type_primary='.$data[11];
//                        }
//                        if ($data[13] != '') {
//                            $attrstr.= ',bulb_color='.$data[13];
//                        }
//                        if ($data[14] != '') {
//                            $attrstr.= ',lumens='.$data[14];
//                        }
//                        if ($data[16] != '') {
//                            $attrstr.= ',kelvin='.$data[16];
//                        }
//                        if ($data[23] != '') {
//                            $attrstr.= ',energy_rating='.$data[23];
//                        }
//                        if ($data[26] != '') {
//                            $attrstr.= ',dimmable='.$data[26];
//                        }
//                        if ($data[34] != '') {
//                            $attrstr.= ',sensor='.$data[34];
//                        }
//                        if ($data[41] != '') {
//                            $attrstr.= ',voltage='.$data[41];
//                        }
//                        if ($data[42] != '') {
//                            $attrstr.= ',testing_class='.$data[42];
//                        }
//                        if ($data[48] != '') {
//                            $attrstr.= ',barc_ean_13_no='.$data[48];
//                        }
//                        if ($productSpecs != '') {
//                            $attrstr.= ',product_specification='.$productSpecs;
//                        }
//
//                        $productData['additional_attributes'] = $attrstr;

                        $productData['qty'] = "100";
                        $productData['out_of_stock_qty'] = '0';
                        $productData['use_config_min_qty'] = '1';
                        $productData['is_qty_decimal'] = '0';
                        $productData['allow_backorders'] = '0';
                        $productData['use_config_backorders'] = '1';
                        $productData['min_cart_qty'] = '1';
                        $productData['use_config_min_sale_qty'] = '1';
                        $productData['max_cart_qty'] = 0;
                        $productData['use_config_max_sale_qty'] = '1';
                        $productData['is_in_stock'] = "1";
                        $productData['notify_on_    stock_below'] = '';
                        $productData['use_config_notify_stock_qty'] = '1';
                        $productData['manage_stock'] = 0;
                        $productData['use_config_manage_stock'] = '1';
                        $productData['use_config_qty_increments'] = '1';
                        $productData['qty_increments'] = '0';
                        $productData['use_config_enable_qty_inc'] = '1';
                        $productData['enable_qty_increments'] = '0';
                        $productData['is_decimal_divided'] = '0';
                        $productData['website_id'] = '0';
                        $productData['related_skus'] = '';
                        $productData['related_position'] = '';
                        $productData['crosssell_skus'] = "";
                        $productData['upsell_skus'] = "";
                        $productData['crosssell_position'] = '';
                        $productData['upsell_position'] = '';

                        $imgstr = '';

                        if ($data[50] != '') {
                            $imgstr .= $data[50];
                        }
                        if ($data[51] != '') {
                            $imgstr .= ',' . $data[51];
                        }
                        if ($data[52] != '') {
                            $imgstr .= ',' . $data[52];
                        }
                        if ($data[53] != '') {
                            $imgstr .= ',' . $data[53];
                        }
                        if ($data[54] != '') {
                            $imgstr .= ',' . $data[54];
                        }
                        if ($data[55] != '') {
                            $imgstr .= ',' . $data[55];
                        }
                        if ($data[56] != '') {
                            $imgstr .= ',' . $data[56];
                        }
                        if ($data[57] != '') {
                            $imgstr .= ',' . $data[57];
                        }
                        if ($data[58] != '') {
                            $imgstr .= ',' . $data[58];
                        }
                        $productData['additional_images'] = $imgstr;
                        $productData['additional_image_labels'] = '';
                        $productData['hide_from_product_page'] = '';
                        $productData['custom_options'] = '';
                        $productData['bundle_price_type'] = '';
                        $productData['bundle_sku_type'] = '';
                        $productData['bundle_price_view'] = '';
                        $productData['bundle_weight_type'] = '';
                        $productData['bundle_values'] = '';
                        $productData['bundle_shipment_type'] = '';
                        $productData['associated_skus'] = '';
                        $productData['downloadable_links'] = '';
                        $productData['downloadable_samples'] = '';
                        $productData['configurable_variations'] = '';
                        $productData['configurable_variation_labels'] = '';

                        $newData[] = $productData;
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
            1 => 'store_view_code',
            2 => 'attribute_set_code',
            3 => 'product_type',
            4 => 'categories',
            5 => 'product_websites',
            6 => 'name',
            7 => 'description',
            8 => 'short_description',
            9 => 'weight',
            10 => 'product_online',
            11 => 'tax_class_name',
            12 => 'visibility',
            13 => 'price',
            14 => 'special_price',
            15 => 'special_price_from_date',
            16 => 'special_price_to_date',
            17 => 'url_key',
            18 => 'meta_title',
            19 => 'meta_keywords',
            20 => 'meta_description',
            21 => 'base_image',
            22 => 'base_image_label',
            23 => 'small_image',
            24 => 'small_image_label',
            25 => 'thumbnail_image',
            26 => 'thumbnail_image_label',
            27 => 'swatch_image',
            28 => 'swatch_image_label',
            29 => 'created_at',
            30 => 'updated_at',
            31 => 'new_from_date',
            32 => 'new_to_date',
            33 => 'display_product_options_in',
            34 => 'map_price',
            35 => 'msrp_price',
            36 => 'map_enabled',
            37 => 'gift_message_available',
            38 => 'custom_design',
            39 => 'custom_design_from',
            40 => 'custom_design_to',
            41 => 'custom_layout_update',
            42 => 'page_layout',
            43 => 'product_options_container',
            44 => 'msrp_display_actual_price_type',
            45 => 'country_of_manufacture',
            46 => 'additional_attributes',
            47 => 'qty',
            48 => 'out_of_stock_qty',
            49 => 'use_config_min_qty',
            50 => 'is_qty_decimal',
            51 => 'allow_backorders',
            52 => 'use_config_backorders',
            53 => 'min_cart_qty',
            54 => 'use_config_min_sale_qty',
            55 => 'max_cart_qty',
            56 => 'use_config_max_sale_qty',
            57 => 'is_in_stock',
            58 => 'notify_on_stock_below',
            59 => 'use_config_notify_stock_qty',
            60 => 'manage_stock',
            61 => 'use_config_manage_stock',
            62 => 'use_config_qty_increments',
            63 => 'qty_increments',
            64 => 'use_config_enable_qty_inc',
            65 => 'enable_qty_increments',
            66 => 'is_decimal_divided',
            67 => 'website_id',
            68 => 'related_skus',
            69 => 'related_position',
            70 => 'crosssell_skus',
            71 => 'crosssell_position',
            72 => 'upsell_skus',
            73 => 'upsell_position',
            74 => 'additional_images',
            75 => 'additional_image_labels',
            76 => 'hide_from_product_page',
            77 => 'custom_options',
            78 => 'bundle_price_type',
            79 => 'bundle_sku_type',
            80 => 'bundle_price_view',
            81 => 'bundle_weight_type',
            82 => 'bundle_values',
            83 => 'bundle_shipment_type',
            84 => 'associated_skus',
            85 => 'downloadable_links',
            86 => 'downloadable_samples',
            87 => 'configurable_variations',
            88 => 'configurable_variation_labels'
        ];
        return $cols;
    }
}
