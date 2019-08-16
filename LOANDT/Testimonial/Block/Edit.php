<?php
namespace LOANDT\Testimonial\Block;

class Edit extends \Magento\Framework\View\Element\Template
{
    protected $_registry;
    protected $_testimonialFactory;
    protected $_customerSession;
    protected $_storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data =[],
        \Magento\Framework\Registry $registry,
        \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory,
        \Magento\Customer\Model\SessionFactory $customerSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        $this->_registry = $registry;
        $this->_testimonialFactory = $testimonialFactory;
        $this->_customerSession = $customerSession->create();
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function editTestimonial()
    {
        $testimonial_id = $this->_registry->registry('testimonial_id');
        $testimonial = $this->_testimonialFactory->create()->load($testimonial_id);
        return $testimonial;
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