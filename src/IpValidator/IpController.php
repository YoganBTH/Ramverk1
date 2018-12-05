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
class IpController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction() : object
    {
        $title = "Ip validator";
        $page = $this->di->get("page");
        $page->add("anax/ip/index");
        return $page->render([
            "title" => $title,
        ]);
    }

    public function validateAction() : object
    {
        $ipType = null;
        $domainName = null;

        $this->title = "Ip validator";
        $page = $this->di->get("page");
        $pattern = "/[\d]+\.[\d]+\.[\d]+\.[\d]+/";
        $this->ipAddress = $this->di->get("request")->getPost("ipAddress");

        if (filter_var($this->ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $ipType = "IPv6";
        } elseif (filter_var($this->ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $ipType = "IPv4";
        }

        if ($ipType) {
            $domainName = gethostbyaddr($this->ipAddress);
        }

        $page->add("anax/ip/validate", [
            "ipAddress" => $this->ipAddress,
            "ipType" => $ipType,
            "domainName" => $domainName,
        ]);
        return $page->render([
            "title" => $this->title,
        ]);
    }




}
