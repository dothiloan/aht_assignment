<?php
namespace LOANDT\Testimonial\Controller\Index;

use Magento\Framework\View\Result\PageFactory;
use  Magento\Framework\App\Filesystem\DirectoryList;

class Save extends \Magento\Framework\App\Action\Action
{
    /*
     * @var Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    protected $_testimonialFactory;

    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;
    
    /*
     * @param Magento\Framwork\App\Action\Context $context
     * @param Magento\Framework\View\Result\PageFactory $pageFactory
     **/
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        PageFactory $pageFactory,
        \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory,
        \Magento\Framework\Image\AdapterFactory $adapterFactory,
        \Magento\Framework\Filesystem $filesystem
        )
    {
        $this->_pageFactory = $pageFactory;
        $this->_testimonialFactory = $testimonialFactory;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        parent::__construct($context);
    }
    
    /*
     * This is main function -> this run first when load action
     */
    public function execute()
    {
        $testimonialInfo = $this->getRequest()->getPostvalue();
        // print_r($testimonialInfo);
        // die();
        if(isset($testimonialInfo['customer_id']) && $testimonialInfo['customer_id'] != 0){
            $testimonial_id = $this->getRequest()->getParam('testimonial_id');
            $imageRequest = $this->getRequest()->getFiles();
            $imageName = $imageRequest['image']['name'];
            if(isset($testimonial_id) && !empty($testimonial_id)){
                if(!empty($imageName)){
                    $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'image']);
                    $uploaderFactory->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $imageAdapter = $this->adapterFactory->create();
                    /* start of validated image */
                    $uploaderFactory->addValidateCallback('custom_image_upload',
                        $imageAdapter,'validateUploadFile');
                    $uploaderFactory->setAllowRenameFiles(true);
                    $uploaderFactory->setFilesDispersion(true);
                    $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
                    $destinationPath = $mediaDirectory->getAbsolutePath('custom_image');
                    $result = $uploaderFactory->save($destinationPath);
                    if (!$result) {
                        throw new LocalizedException(
                            __('File cannot be saved to path: $1', $destinationPath)
                        );
                    }
                    /* you need yo save image 
                         $result['file'] at datbaseQQ 
                    */
                    $imagepath = $result['file'];
                    $data = [
                        'name' => $testimonialInfo['name'],
                        'designation' => $testimonialInfo['designation'],
                        'message' => $testimonialInfo['message'],
                        'email' => $testimonialInfo['email'],
                        'contact' => $testimonialInfo['contact'],
                        'image' => $imagepath,
                        'customer_id' => $testimonialInfo['customer_id']
                    ];
                }else{
                    $data = [
                        'name' => $testimonialInfo['name'],
                        'designation' => $testimonialInfo['designation'],
                        'message' => $testimonialInfo['message'],
                        'email' => $testimonialInfo['email'],
                        'contact' => $testimonialInfo['contact'],
                        'customer_id' => $testimonialInfo['customer_id']
                    ];
                }
                
                $model = $this->_testimonialFactory->create();
                $model->load($testimonial_id)->addData($data)->save();
                return $this->_redirect('testimonial/index/listing');
            }else {
                $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'image']);
                $uploaderFactory->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $imageAdapter = $this->adapterFactory->create();
                /* start of validated image */
                $uploaderFactory->addValidateCallback('custom_image_upload',
                    $imageAdapter,'validateUploadFile');
                $uploaderFactory->setAllowRenameFiles(true);
                $uploaderFactory->setFilesDispersion(true);
                $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $destinationPath = $mediaDirectory->getAbsolutePath('custom_image');
                $result = $uploaderFactory->save($destinationPath);
                if (!$result) {
                    throw new LocalizedException(
                        __('File cannot be saved to path: $1', $destinationPath)
                    );
                }
                /* you need yo save image 
                     $result['file'] at datbaseQQ 
                */
                $imagepath = $result['file'];
                $data = [
                    'name' => $testimonialInfo['name'],
                    'designation' => $testimonialInfo['designation'],
                    'message' => $testimonialInfo['message'],
                    'email' => $testimonialInfo['email'],
                    'contact' => $testimonialInfo['contact'],
                    'image' => $imagepath,
                    'customer_id' => $testimonialInfo['customer_id']
                ];
                $model = $this->_testimonialFactory->create();
                $model->addData($data)->save();
                return $this->_redirect('testimonial/index/listing');
            }
            
        }else {
            return 'You need to sign in';
        }
        
    }
}