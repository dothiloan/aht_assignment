<?php
namespace LOANDT\Testimonial\Controller\Index;

class Edit extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \LOANDT\Testimonial\Model\TestimonialFactory
     */
    protected $_testimonialFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_registry;
    
    /**
     * function construct
     * 
     * @param \Magento\Framework\App\Action\Context $context,
     * @param \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory,
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->_testimonialFactory = $testimonialFactory;
        $this->_registry = $registry;
        parent::__construct($context);
    }

    /**
     * function execute
     * 
     */

    public function execute()
    {
        $testimonial_id = $this->getRequest()->getParam('testimonial_id');
        $this->_registry->register('testimonial_id', $testimonial_id);
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}