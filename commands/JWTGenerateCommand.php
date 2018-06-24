<?php

namespace Autumn\JWTAuth\Commands;

use Tymon\JWTAuth\Commands\JWTGenerateCommand as BaseCommand;

class JWTGenerateCommand extends BaseCommand
{
    public function handle()
    {
        $this->fire();
    }
}
