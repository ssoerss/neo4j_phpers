<?php


namespace User;


class ConnectUsersCommand
{
    private $connectingId;
    private $targetId;

    public function __construct($connectingId, $targetId)
    {

        $this->connectingId = $connectingId;
        $this->targetId = $targetId;
    }

    /**
     * @return mixed
     */
    public function getTargetId()
    {
        return $this->targetId;
    }

    /**
     * @return mixed
     */
    public function getConnectingId()
    {
        return $this->connectingId;
    }
}