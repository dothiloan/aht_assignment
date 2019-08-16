<?php
namespace MGS\Book\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \MGS\Book\Model\BookFactory
     */

    protected $_bookFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory 
     */

    protected $_pageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \MGS\Book\Model\BookFactory $bookFactory
     */

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \MGS\Book\Model\BookFactory $bookFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_bookFactory = $bookFactory;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * Execute function 
     * 
     */

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->setActiveMenu('MGS_Book::index');
        $resultPage->getConfig()->getTitle()->prepend(__('List of books'));
        return $resultPage;
    }
}