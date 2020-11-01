<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

/**
 * Class Handler.
 *
 * @author Rakitha Dissanayake <rakithadd@gmail.com>
 *
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        GeneralException::class,
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
     * @param Exception $exception
     *
     * @throws Exception
     * @return mixed|void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof UnauthorizedException) {

            return $request->expectsJson()
                ? response()->json([
                    'meta' => [
                        'status' => 'false',
                        'status_message' => 'Unauthorized action.'
                    ],
                ],200)
                : redirect()
                ->route(home_route())
                ->withFlashDanger(__('auth.general_error'));
        }

        if($exception instanceof MethodNotAllowedHttpException){
            if($request->expectsJson()){
                return response()->json([
                    'meta' => [
                        'status' => 'false',
                        'status_message' => 'Method not allowed.'
                    ],
                ],200);
            }
        }

        if ($exception instanceof  NotFoundHttpException){
            if($request->expectsJson()){
                return response()->json([
                    'meta' => [
                        'status' => 'false',
                        'status_message' => 'Route does not exists.'
                    ],
                ],200);
            }
        }

        if ($exception instanceof  ModelNotFoundException){
            if($request->expectsJson()){
                return response()->json([
                    'meta' => [
                        'status' => 'false',
                        'status_message' => 'Model does not exists.'
                    ],
                ],200);
            }
        }

        if ($exception instanceof  TokenMismatchException){
            if($request->expectsJson()){
                return response()->json([
                    'meta' => [
                        'status' => 'false',
                        'status_message' => 'Token mismatch.'
                    ],
                ],200);
            }
        }

        // if ($exception instanceof  QueryException){
        //     if($request->expectsJson()){
        //         return response()->json([
        //             'meta' => [
        //                 'status' => 'false',
        //                 'status_message' => 'Query exception.'
        //             ],
        //         ],200);
        //     }
        // }

        return parent::render($request, $exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException  $exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
            ? response()->json([
                    'meta' => [
                        'status' => 'false',
                        'status_message' => 'Web service unauthenticated.'
                    ],
                ],200)
            : redirect()->guest(route('frontend.auth.login'));
    }
}
