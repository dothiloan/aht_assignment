<?php
namespace MGS\Book\Controller\Adminhtml\Index;

class Edit extends \Magento\Backend\App\Action
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
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
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
        $book_id = $this->getRequest()->getParam('book_id');
        if(isset($book_id)){
            $resultPage = $this->_pageFactory->create();
            $resultPage->setActiveMenu('MGS_Book::index');
            $resultPage->getConfig()->getTitle()->prepend(__('Edit book'));
        }else{
            $resultPage = $this->_pageFactory->create();
            $resultPage->setActiveMenu('MGS_Book::index');
            $resultPage->getConfig()->getTitle()->prepend(__('Add book'));
        }
        return $resultPage;
        
    }
}