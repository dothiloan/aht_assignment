<?php
namespace MGS\Student\Api\Data;

interface StudentInterface
{
    const STUDENT_ID = 'student_id';
    const NAME       = 'name';
    const ADDRESS    = 'address';
    const PHONE      = 'phone';
    const ISMARRIED  = 'isMarried';

    /**
     * get student_id
     * @return int|null
     */
    public function getStudentId();

    /**
     * get name
     * @return string|null
     */
    public function getName();

    /**
     * get address
     * @return string|null
     */
    public function getAddress();

    /**
     * get phone
     * @return string|null
     */
    public function getPhone();

    /**
     * get isMarried
     * @return int|null
     */
    public function getIsMarried();

    /**
     * set name
     * @param string $name
     * return StudentInterface
     */
    public function setName($name);

    /**
     * set address
     * @param string $address
     * return StudentInterface
     */
    public function setAddress($address);

    /**
     * set phone
     * @param string $phone
     * return StudentInterface
     */
    public function setPhone($phone);

    /**
     * set isMarried
     * @param int $isMarried
     * return StudentInterface
     */
    public function setIsMarried($isMarried);
}