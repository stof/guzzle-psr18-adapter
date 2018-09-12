<?php

namespace RicardoFiorani\GuzzlePsr18Adapter;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Client extends \GuzzleHttp\Client implements ClientInterface
{

    /**
     * Sends a PSR-7 request and returns a PSR-7 response.
     *
     * Every technically correct HTTP response MUST be returned as-is, even if it represents an HTTP
     * error response or a redirect instruction. The only special case is 1xx responses, which MUST
     * be assembled in the HTTP client.
     *
     * The client MAY do modifications to the Request before sending it. Because PSR-7 objects are
     * immutable, one cannot assume that the object passed to ClientInterface::sendRequest() will be the same
     * object that is actually sent. For example, the Request object that is returned by an exception MAY
     * be a different object than the one passed to sendRequest, so comparison by reference (===) is not possible.
     *
     * @link https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-7-http-message-meta.md#why-value-objects
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface If an error happens while processing the request.
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->send($request);
    }
}
