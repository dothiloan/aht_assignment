<?php
namespace MGS\Student\Controller\Adminhtml\Index;

use Magento\Framework\View\Result\PageFactory;

class Add extends \Magento\Backend\App\Action
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
			return $this->_forward('edit');
		}
}