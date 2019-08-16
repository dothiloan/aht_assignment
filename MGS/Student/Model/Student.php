<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MGS\Student\Model;

use MGS\Student\Api\Data\StudentInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Student extends AbstractModel implements StudentInterface, IdentityInterface
{
    /**
     * MGS student cache tag
     */
    const CACHE_TAG = 'mgs_s';

    /**#@+
     * IsMarried statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**#@-*/

    /**#@-*/
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'mgs_student';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\MGS\Student\Model\ResourceModel\Student::class);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId(), self::CACHE_TAG . '_' . $this->getIdentifier()];
    }

    /**
     * Retrieve student id
     *
     * @return int
     */
    public function getStudentId()
    {
        return $this->getData(self::STUDENT_ID);
    }

    /**
     * Retrieve student name 
     *
     * @return string
     */
    public function getName()
    {
        return (string)$this->getData(self::NAME);
    }

    /**
     * Retrieve student address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    /**
     * Retrieve student phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->getData(self::PHONE);
    }

    /**
     * Is married
     *
     * @return int
     */
    public function getIsMarried()
    {
        return (int)$this->getData(self::ISMARRIED);
    }

    /**
     * Set student name
     *
     * @param string $name
     * @return StudentInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set student address
     *
     * @param string $address
     * @return StudentInterface
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * Set student phone
     *
     * @param string $phone
     * @return StudentInterface
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * Set student isMarried
     *
     * @param int $isMarried
     * @return StudentInterface
     */
    public function setIsMarried($isMarried)
    {
        return $this->setData(self::ISMARRIED, $isMarried);
    }


    /**
     * Receive page store ids
     *
     * @return int[]
     */
    public function getStores()
    {
        return $this->hasData('stores') ? $this->getData('stores') : $this->getData('store_id');
    }

    /**
     * Prepare block's statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Married'), self::STATUS_DISABLED => __('Not Married')];
    }
}
