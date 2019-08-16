<?php 
namespace MGS\Student\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action
{
    /**
     * \Magento\Framework\View\Result\PageFactory 
     */

    protected $_pageFactory;

    /**
     * function construct
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * function execute
     */

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->setActiveMenu('MGS_Student::student');
        $resultPage->getConfig()->getTitle()->prepend(__('List Student'));
        return $resultPage;
    }
}