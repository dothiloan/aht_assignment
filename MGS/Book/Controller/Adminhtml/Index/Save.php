<?php
namespace MGS\Book\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
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
        if(isset($book_id) && !empty($book_id)){
            $bookInfo = $this->getRequest()->getPostValue();

            $data = [
                 'name' => $bookInfo['name'],
                 'author' => $bookInfo['author'],
                 'publishing_company' => $bookInfo['publishing_company'],
                 'publishing_year' => $bookInfo['publishing_year'],
                 'total' => $bookInfo['total'],
                 'status' => $bookInfo['status']
            ];
            $model = $this->_bookFactory->create();
            $model->load($book_id)->addData($data)->save();

             // display success message
            $this->messageManager->addSuccessMessage(__('Edit successed'));
            // go to grid
            return $resultRedirect->setPath('*/*/index');
        }else{
           $bookInfo = $this->getRequest()->getPostValue();

           $data = [
                'name' => $bookInfo['name'],
                'author' => $bookInfo['author'],
                'publishing_company' => $bookInfo['publishing_company'],
                'publishing_year' => $bookInfo['publishing_year'],
                'total' => $bookInfo['total'],
                'status' => $bookInfo['status']
           ];
           $model = $this->_bookFactory->create();
           $model->addData($data)->save();

            // display success message
            $this->messageManager->addSuccessMessage(__('Add successed'));
            // go to grid
            return $resultRedirect->setPath('*/*/index');
        }

    }
}