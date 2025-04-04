<?php

/**
 * This file is part of prooph/common.
 * (c) 2014-2025 Alexander Miertsch <kontakt@codeliner.ws>
 * (c) 2015-2025 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace ProophTest\Common\Messaging;

use Assert\InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Prooph\Common\Messaging\DomainMessage;
use Prooph\Common\Messaging\Message;
use Prooph\Common\Messaging\NoOpMessageConverter;

class NoOpMessageConverterTest extends TestCase
{
    #[Test]
    public function it_converts_to_array(): void
    {
        /** @var DomainMessage|MockObject $messageMock */
        $messageMock = $this->getMockBuilder(DomainMessage::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['toArray', 'setPayload', 'messageType', 'payload'])
            ->getMock();

        $messageMock->expects($this->once())->method('toArray');

        $converter = new NoOpMessageConverter();
        $converter->convertToArray($messageMock);
    }

    #[Test]
    public function it_throws_exception_when_message_is_not_a_domain_message(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('was expected to be instanceof of "Prooph\Common\Messaging\DomainMessage" but is not');

        /** @var Message|MockObject $messageMock */
        $messageMock = $this->getMockBuilder(Message::class)
            ->getMock();

        $converter = new NoOpMessageConverter();
        $converter->convertToArray($messageMock);
    }
}
