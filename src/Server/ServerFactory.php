<?php

namespace AshleyDawson\GlideBundle\Server;

use League\Flysystem\FilesystemInterface;
use League\Glide\Api\ApiInterface;
use League\Glide\Responses\SymfonyResponseFactory;

/**
 * Class ServerFactory
 *
 * @package AshleyDawson\GlideBundle\Server
 */
class ServerFactory implements ServerFactoryInterface
{
    /**
     * @var ApiInterface
     */
    private $_api;

    /**
     * Constructor
     *
     * @param ApiInterface $api
     */
    public function __construct(ApiInterface $api)
    {
        $this->_api = $api;
    }

    /**
     * {@inheritdoc}
     */
    public function create(FilesystemInterface $source, FilesystemInterface $cache)
    {
        $server = new Server($source, $cache, $this->_api);
        $server->setResponseFactory(new SymfonyResponseFactory());

        return $server;
    }
}