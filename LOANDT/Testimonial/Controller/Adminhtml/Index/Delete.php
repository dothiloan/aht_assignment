<?php
namespace LOANDT\Testimonial\Controller\Adminhtml\Index;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var \LOANDT\Testimonial\Model\TestimonialFactory
     */

     protected $_testimonialFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory
     */

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \LOANDT\Testimonial\Model\TestimonialFactory $testimonialFactory
    )
    {
        $this->_testimonialFactory = $testimonialFactory;
        return parent::__construct($context);
    }

    /**
     * Execute function 
     */

    public function execute()
    {
        // $resultRedirect = $this->resultRedirectFactory->create();

        $testimonial_id = $this->getRequest()->getParam('testimonial_id');
        $model = $this->_testimonialFactory->create();
        $model->load($testimonial_id)->delete();
        return $this->_redirect('testimonial/index/index');
        
         // display error message
        // $this->messageManager->addSuccessMessage(__('Delete successed'));
         // go to grid
        // return $resultRedirect->setPath('*/*/index');
    }
}