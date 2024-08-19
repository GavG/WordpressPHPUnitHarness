<?php

declare(strict_types=1);

namespace GavG\WordpressPhpUnitHarness\Structs;

readonly class Response
{
    public function __construct(
        public string|false $data,
        public int|bool $responseCode,
        public ?string $error = null,
        public string|bool|null $contentType = null,
    ) {}
}
