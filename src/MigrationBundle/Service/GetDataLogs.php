<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 27/02/17
 * Time: 23:24
 */

namespace MigrationBundle\Service;


use Monolog\Logger;

class GetDataLogs
{
    /**
     * @var Logger
     */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

}