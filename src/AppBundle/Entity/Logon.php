<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Logon
 *
 * @ORM\Table(name="log_on")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LogonRepository")
 */

class Logon
{

    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`user_id`", type="integer")
     */
    private $user_id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="`login_date`", type="datetime")
     */
    private $login_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="`recent_activity_date`", type="datetime")
     */
    private $recent_activity;

    /**
     * @ORM\Column(name="`ip_address`",type="string", length=40)
     */
    protected $ip_address;

    /**
     * @ORM\Column(name="`session_id`",type="string", length=40)
     */
    protected $session_id;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Logon
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set loginDate
     *
     * @param \DateTime $loginDate
     *
     * @return Logon
     */
    public function setLoginDate($loginDate)
    {
        $this->login_date = $loginDate;

        return $this;
    }

    /**
     * Get loginDate
     *
     * @return \DateTime
     */
    public function getLoginDate()
    {
        return $this->login_date;
    }

    /**
     * Set recentActivity
     *
     * @param \DateTime $recentActivity
     *
     * @return Logon
     */
    public function setRecentActivity($recentActivity)
    {
        $this->recent_activity = $recentActivity;

        return $this;
    }

    /**
     * Get recentActivity
     *
     * @return \DateTime
     */
    public function getRecentActivity()
    {
        return $this->recent_activity;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     *
     * @return Logon
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set sessionId
     *
     * @param string $sessionId
     *
     * @return Logon
     */
    public function setSessionId($sessionId)
    {
        $this->session_id = $sessionId;

        return $this;
    }

    /**
     * Get sessionId
     *
     * @return string
     */
    public function getSessionId()
    {
        return $this->session_id;
    }
}
