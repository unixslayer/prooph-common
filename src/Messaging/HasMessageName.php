<?php

/**
 * This file is part of prooph/common.
 * (c) 2014-2020 Alexander Miertsch <kontakt@codeliner.ws>
 * (c) 2014-2020 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\Common\Messaging;

/**
 * A message implementing this interface is aware of its name.
 */
interface HasMessageName
{
    public function messageName(): string;
}
