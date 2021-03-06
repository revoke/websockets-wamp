<?php
/**
 * IClient.php
 *
 * @copyright      More in license.md
 * @license        https://www.ipublikuj.eu
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 * @package        iPublikuj:WebSocketsWAMP!
 * @subpackage     Entities
 * @since          1.0.0
 *
 * @date           06.03.17
 */

declare(strict_types = 1);

namespace IPub\WebSocketsWAMP\Entities\Clients;

use Nette\Utils;

use IPub\WebSocketsWAMP\Application;
use IPub\WebSocketsWAMP\Entities;

use IPub\WebSockets\Entities as WebSocketsEntities;

/**
 * WAMP single client connection
 *
 * @package        iPublikuj:WebSocketsWAMP!
 * @subpackage     Entities
 *
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 */
class Client extends WebSocketsEntities\Clients\Client implements IClient
{
	/**
	 * {@inheritdoc}
	 */
	public function event(Entities\Topics\ITopic $topic, $message) : void
	{
		$this->send(Utils\Json::encode([Application\Application::MSG_EVENT, (string) $topic, $message]));
	}
}
