<?php 
namespace LOANDT\Testimonial\Block;

use LOANDT\Testimonial\Model\ResourceModel\Testimonial\CollectionFactory as TestimonialCollectionFactory;

class Listing extends \Magento\Framework\View\Element\Template
{
    protected $_testimonialCollectionFactory;

    protected $_customerSession;

    protected $_storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        TestimonialCollectionFactory $testimonialCollectionFactory,
        \Magento\Customer\Model\SessionFactory $customerSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        $this->_testimonialCollectionFactory = $testimonialCollectionFactory;
        $this->_customerSession = $customerSession->create();
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }
    public function getList()
    {
        $collection = $this->_testimonialCollectionFactory->create();
        return $collection;
    }

    public function getLoggedinCustomerId() {
        if ($this->_customerSession->isLoggedIn()) {
            return $this->_customerSession->getId();
        }
        return false;
    } 

    public function getUrlMedia()
    {
        $mediaUrl = $this ->_storeManager-> getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA );
        return $mediaUrl;
    }

}