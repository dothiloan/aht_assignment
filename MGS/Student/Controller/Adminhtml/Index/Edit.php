<?php
namespace MGS\Student\Controller\Adminhtml\Index;

use Magento\Framework\View\Result\PageFactory;

class Edit extends \Magento\Backend\App\Action
{
		/**
		 * @var Magento\Framework\View\Result\PageFactory
		 */

		 protected $_pageFactory;

		 /**
			* function construct
			*@param \Magento\Backend\App\Action\Context $context
			*@param \Magento\Framework\View\Result\PageFactory $_pageFactory
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
            $student_id = $this->getRequest()->getParam('student_id');

            if(isset($student_id)){
                $title = 'Edit student';
            }else{
                $title = 'Add student';
            }

            $resultPage->getConfig()->getTitle()->prepend(__($title));
            return $resultPage;
		}
}