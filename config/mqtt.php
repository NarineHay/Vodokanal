<?php
/**
 * Created by PhpStorm.
 * User: salman
 * Date: 2/22/19
 * Time: 1:29 PM
 */

return [
    'host'      => env('MQTT_HOST', 'zv1632.su'),
    'password'  => env('MQTT_PASSWORD', 'Armenia2022'),
    'username'  => env('MQTT_USERNAME', 'narine'),
    // 'certfile'  => env('MQTT_CERT_FILE', ''),
    // 'localcert' => env('MQTT_LOCAL_CERT', ''),
    // 'localpk'   => env('MQTT_LOCAL_PK', ''),
    'port'      => env('MQTT_PORT', '1883'),
    // 'timeout'   => (int) env('MQTT_TIMEOUT', 10),
    // 'debug'     => (bool) env('MQTT_DEBUG', false), //Optional Parameter to enable debugging set it to True
    'qos'       => env('MQTT_QOS', 0), // set quality of service here
    'retain'    => env('MQTT_RETAIN', 0), // it should be 0 or 1 Whether the message should be retained.- Retain Flag
    'allow_anonymous'=>env('MQTT_ALLOW_ANONYMOUS', false)
];
