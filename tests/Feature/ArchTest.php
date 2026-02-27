<?php

declare(strict_types=1);

arch('ensures `env()` is only used in config files')
    ->expect('env')
    ->not->toBeUsed()
    ->ignoring('config');

arch('No file in the app directory uses `die`, `dd`, or `dump`.')
    ->expect('App')
    ->not->toUse(['die', 'dd', 'dump', 'ray']);
