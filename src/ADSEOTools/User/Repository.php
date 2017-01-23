<?php

namespace ADSEOTools\User;


use ArchangelDB\ADB2;

class Repository
{
    const AD_USER_TABLE = "ad_users";

    const AD_WEBSITES_TABLE = "ad_user_websites";

    private $db;

    public function __construct(ADB2 $db)
    {
        $this->db = $db;
    }

    /**
     * @param $userId
     * @return array
     */
    private function fetchUserByUserId($userId)
    {
        return $this->db->fetchOne(self::AD_USER_TABLE, ['user_id' => $userId]);
    }

    private function fetchUserByAdUserId($adUserId)
    {
        return $this->db->fetchOne(self::AD_USER_TABLE, ['ad_user_id' => $adUserId]);
    }

    public function fetchWebsites($userId)
    {
        $userRecord = $this->fetchUserByUserId($userId);

        if (empty($userRecord)) {
            throw new \Exception("User identified by id $userId has not been located.");
        }

        $adUserId = $userRecord['ad_user_id'];

        $websites = $this->db->fetchAll(self::AD_WEBSITES_TABLE, ['ad_user_id' => $adUserId]);
    }
}