<?php

namespace Anax\IpValidator;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpControllerTest extends TestCase
{
    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new IpController();
        $this->controller->setDI($this->di);
        //$this->controller->initialize();
    }

    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        // $res = $controller->indexAction();
        // $exp = "Ip validator | ramverk1";
        // $res = $this->controller->indexAction();
        // $this->assertInstanceOf("\Anax\Response\Response", $res);
        // $this->assertEquals($exp, $res);

        $res = $this->controller->indexAction();
        $this->assertInstanceOf("\Anax\Response\Response", $res);
        $body = $res->getBody();
        $exp = "| ramverk1</title>";
        $this->assertContains($exp, $body);
    }



    /**
     * Test the route "info".
     */
    public function testvalidateAction()
    {
        $res = $this->controller->validateAction();
        $this->assertInstanceOf("\Anax\Response\Response", $res);
        $body = $res->getBody();
        $exp = "| ramverk1</title>";
        $this->assertContains($exp, $body);

        // $this->di->get("request")->setPost("ipAddress", "255.255.255.255");
        // $res = $this->controller->validateAction();
        // $this->assertInstanceOf("\Anax\Response\Response", $res);
        // $body = $res->getBody();
        // $exp = "| ramverk1</title>";
        // $this->assertContains($exp, $body);


        // $this->di->get("request")->setPost("ipAddress", "255.255.255.255");
        // $ipv4 = $this->di->get("request")->getPost("ipAddress");
        // // $ipv4 = "255.255.255.255";
        // $this->assertEquals($ipv4, "255.255.255.255");


        // $res = $this->controller->validateAction();
        //
        // $this->assertInstanceOf("\Anax\Response\Response", $res);
        // $body = $res->getBody();
        // $exp = "| ramverk1</title>";
        // $this->assertContains($exp, $body);
        // $this->di->get("request")->setPost("ip", "2a04:ae0c:1804:c400::1001");
        //
        // $res = $this->controller->validateAction();
        // $this->assertInstanceOf("\Anax\Response\Response", $res);
        // $body = $res->getBody();
        // $exp = "| ramverk1</title>";
        // $this->assertContains($exp, $body);


        // $_POST["ipAddress"] = "2001:db8:a0b:12f0::1";
        //
        // $ipv6 = $this->di->get("request")->getPost("ipAddress");
        // $this->controller->validateAction();
        // $this->assertEquals($ipv6, "2001:db8:a0b:12f0::1");
    }
    public function testIpv6PostAction()
    {
        $this->di->get("request")->setPost("ipAddress", "2001:db8:a0b:12f0::1");
        $_POST["ipAddress"] = "2001:db8:a0b:12f0::1";

        $ipv6 = $this->di->get("request")->getPost("ipAddress");
        $this->controller->indexAction();
        $this->assertEquals($ipv6, "2001:db8:a0b:12f0::1");
    }
}
