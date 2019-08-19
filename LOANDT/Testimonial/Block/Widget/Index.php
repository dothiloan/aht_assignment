<?php 
namespace LOANDT\Testimonial\Block\Widget;

use Magento\Widget\Block\BlockInterface;

use LOANDT\Testimonial\Model\ResourceModel\Testimonial\CollectionFactory as TestimonialCollectionFactory;

class Index extends \Magento\Framework\View\Element\Template implements BlockInterface
{
    protected $_testimonialCollectionFactory;

    protected $_storeManager;

    protected $_template = "widget/index.phtml";

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