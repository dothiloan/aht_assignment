<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MGS\Student\Block\Adminhtml\Block\Edit;

use Magento\Backend\Block\Widget\Context;
use MGS\Student\Model\StudentFactory;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var BlockRepositoryInterface
     */
    protected $studentFactory;

    /**
     * @param Context $context
     * @param BlockRepositoryInterface $blockRepository
     */
    public function __construct(
        Context $context,
        StudentFactory $studentFactory
    ) {
        $this->context = $context;
        $this->studentFactory = $studentFactory;
    }

    /**
     * Return CMS block ID
     *
     * @return int|null
     */
    public function getStudentId()
    {
        try {
            return $this->studentFactory->create()->load(
                $this->context->getRequest()->getParam('student_id')
            )->getStudentId();
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
