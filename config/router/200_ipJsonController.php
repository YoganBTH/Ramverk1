<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Ip adress REST validator",
            "mount" => "api",
            "handler" => "\Anax\IpValidator\IpJsonController",
        ],
    ]
];
