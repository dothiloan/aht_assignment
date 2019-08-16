<?php
namespace MGS\Book\Controller\Adminhtml\Index;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var \MGS\Book\Model\BookFactory
     */

     protected $_bookFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \MGS\Book\Model\BookFactory $bookFactory
     */

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \MGS\Book\Model\BookFactory $bookFactory
    )
    {
        $this->_bookFactory = $bookFactory;
        return parent::__construct($context);
    }

    /**
     * Execute function 
     */

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $book_id = $this->getRequest()->getParam('book_id');
        $model = $this->_bookFactory->create();
        $model->load($book_id)->delete();
        
         // display error message
        $this->messageManager->addSuccessMessage(__('Delete successed'));
         // go to grid
        return $resultRedirect->setPath('*/*/index');
    }
}