<?php 
namespace LOANDT\Testimonial\Block;

use LOANDT\Testimonial\Model\ResourceModel\Testimonial\CollectionFactory as TestimonialCollectionFactory;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_testimonialCollectionFactory;

    protected $_storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        TestimonialCollectionFactory $testimonialCollectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        $this->_testimonialCollectionFactory = $testimonialCollectionFactory;
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }
    public function getList()
    {
        $collection = $this->_testimonialCollectionFactory->create();
        $collection->addFieldToFilter('status', 1);
        return $collection;
    }

    public function getUrlMedia()
    {
        $mediaUrl = $this ->_storeManager-> getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA );
        return $mediaUrl;
    }

}