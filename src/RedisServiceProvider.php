<?php

namespace guyanyijiu\Redis;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RedisServiceProvider implements ServiceProviderInterface{

    public function register(Container $container){

        $container['redis'] = function ($container){
            $config = $container['config']['database.redis'];
            $driver = isset($config['client']) ? $config['client'] : 'predis';

            return new RedisManager($driver, $config);
        };
    }

}
