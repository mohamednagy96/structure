<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
            return response()->json([
                'code' => 404,
                'status' => 'Failed',
                'message' => 'Resource item not found.'
            ], 200);
        }

        if ($exception instanceof NotFoundHttpException && $request->wantsJson()) {
            return response()->json([
                'code' => 404,
                'status' => 'Failed',
                'message' => 'Resource not found.'
            ], 200);
        }
        if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
            return response()->json([
                'code' => 200,
                'error' => 'Data not found in this section.']);

        }


        if ($exception instanceof MethodNotAllowedHttpException && $request->wantsJson()) {
            return response()->json([
                'code' => 405,
                'status' => 'Failed',
                'message' => 'Method not allowed.'
            ], 200);
        }

        if ($exception instanceof MethodNotAllowedHttpException && $request->wantsJson()) {
            return response()->json([
                'code' => 405,
                'status' => 'Failed',
                'message' => 'Method not allowed.'
            ], 200);
        }

        if ($exception instanceof TooManyRequestsHttpException && $request->wantsJson()) {
            return response()->json([
                'code' => 429,
                'status' => 'Failed',
                'message' => 'Too Many Request.'
            ], 200);
        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('admin') || $request->is('admin/*')) {

            return redirect()->route('admin.login.show');
        }
        return redirect()->guest(route('login'));
    }
}
