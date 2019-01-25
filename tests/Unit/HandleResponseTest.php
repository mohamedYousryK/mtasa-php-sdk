<?php

/*****************************************************************************
 *
 *  PROJECT:     MTA PHP SDK
 *  LICENSE:     See LICENSE in the top level directory
 *  FILE:        HandleResponseTest.php
 *
 *  Multi Theft Auto is available from http://www.multitheftauto.com/
 *
 *****************************************************************************/

declare(strict_types=1);

namespace MultiTheftAuto\Sdk\Model;

use MultiTheftAuto\Sdk\Response\HandleResponse;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class HandleResponseTest extends TestCase
{
    public function testItReturnsBody(): void
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn('someBody');
        $this->assertEquals('someBody', HandleResponse::getBody($response));
    }

    public function testItReturnsBodyFromStream(): void
    {
        $stream = $this->createMock(StreamInterface::class);
        $stream->method('getContents')->willReturn('someBody');
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn($stream);
        $this->assertEquals('someBody', HandleResponse::getBody($response));
    }
}
