<?php

declare(strict_types=1);

namespace GavG\WordpressPhpUnitHarness\Traits;

use GavG\WordpressPhpUnitHarness\Structs\Response;

trait MakesWpAdminRequests
{
    protected function wpAdminPostHttpRequest(string $method, $data): Response
    {
        match ($method) {
            'POST' => $_POST = $data,
            'GET' => $_GET = $data,
        };

        ob_start();

        $exception = null;

        try {
            do_action('admin_post_nopriv_' . $data['action']);
        } catch (\Throwable $th) {
            http_response_code(500);
            $exception = $th;
        }

        $output = ob_get_contents();
        ob_end_clean();

        if ($exception) {
            echo sprintf(
                "Exception: %s\nLocation: %s:%s\n\nTrace: %s\n\n",
                $exception->getMessage(),
                $exception->getFile(),
                $exception->getLine(),
                $exception->getTraceAsString(),
            );
        }

        return new Response(
            data: $output,
            responseCode: http_response_code(),
        );
    }
}
