<?php

declare(strict_types=1);

namespace proxy\hosts;


use pocketmine\network\mcpe\protocol\DataPacket;

class Server extends BaseHost{
	/** @var string $data */
	public $data;

	/**
	 * @param DataPacket $packet
	 */
	public function handleDataPacket(DataPacket $packet) : void{
		parent::handleDataPacket($packet); // TODO: Change the autogenerated stub
	}

	/**
	 * Get motd from server
	 * @return null|string
	 */
	public function getName() : ?string{
		return isset($this->data[0]) ? $this->data[0] : null;
	}

	/**
	 * Get server protocol
	 * @return string|null
	 */
	public function getProtocol() : ?string{
		$protocol = 0;
		if(!isset($this->data[1])){
			$protocol = 440;//1.17.0
		} else {
                        if(!$this->data[1] == 440){
                                $this->data[1] = 440;
                        }
			$protocol = $this->data[1];
		}
		return $protocol;
	}

	/**
	 * Get server version
	 * @return string|null
	 */
	public function getVersion() : ?string{
		$version = "0.0.0";
		if(!isset($this->data[2])){
			$version = "1.17.0";
		} else {
                        if(!$this->data[2] == "1.17.0"){
                                $this->data[2] = "1.17.0";
                        }
			$version = $this->data[2];
		}
		return $version;
	}
}
