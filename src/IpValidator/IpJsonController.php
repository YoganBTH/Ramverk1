<?php

namespace Anax\IpValidator;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class IpJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public $ipType;
    public $domainName;
    public $ipAddress;


    public function indexActionGet() : array
    {
        $ipType = null;
        $domainName = null;

        $pattern = "/[\d]+\.[\d]+\.[\d]+\.[\d]+/";

        $request = new \Anax\Request\Request();
        $this->ipAddress = $request->getGet("ip");

        if (filter_var($this->ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $ipType = "IPv6";
        } elseif (filter_var($this->ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $ipType = "IPv4";
        }

        if ($ipType) {
            $domainName = gethostbyaddr($this->ipAddress);
        }

        $json = [
            "Ip address" => $this->ipAddress,
            "Ip type" => $ipType,
            "Domain name" => $domainName,
        ];

        return [$json];
    }

    /**
     * Try to access a forbidden resource.
     * ANY mountpoint/forbidden
     *
     * @return array
     */
    public function forbiddenAction() : array
    {
        // Deal with the action and return a response.
        $json = [
            "message" => __METHOD__ . ", forbidden to access.",
        ];
        return [$json, 403];
    }


}
