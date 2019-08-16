<?php
namespace LOANDT\Testimonial\Controller\Adminhtml\Index;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var \LOANDT\Testimonial\Model\TestimonialFactory
     */

    protected $_testimonialFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory 
     */

    protected $_pageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     */

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_testimonialFactory = $testimonialFactory;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * Execute function 
     * 
     */

    public function execute()
    {
        $testimonial_id = $this->getRequest()->getParam('testimonial_id');
        if(isset($testimonial_id)){
            $resultPage = $this->_pageFactory->create();
            $resultPage->setActiveMenu('LOANDT_Testimonial::index');
            $resultPage->getConfig()->getTitle()->prepend(__('Edit Testimonial'));
        }
        return $resultPage;        
    }
}