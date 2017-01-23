<?php

namespace ADSEOTools\User;


class UserEntity
{
    /**
     * @var int foreign key for joining with application user
     */
    private $userId;

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getAdUserId()
    {
        return $this->AdUserId;
    }

    /**
     * @param int $AdUserId
     */
    public function setAdUserId($AdUserId)
    {
        $this->AdUserId = $AdUserId;
    }

    /**
     * @var int primary key
     */
    private $AdUserId;

}