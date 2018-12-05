<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Ip adress validator",
            "mount" => "ip",
            "handler" => "\Anax\IpValidator\IpController",
        ],
    ]
];
