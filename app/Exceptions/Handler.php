<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
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
//dd($exception);
       if ( $exception instanceof \Illuminate\Session\TokenMismatchException ) {
         return redirect()->route('login')->with('error', 'Your session has expired');
       }
      //
      // if ($exception instanceof ModelNotFoundException) {
      //     //$exception = new NotFoundHttpException($exception->getMessage(), $exception);
      //     return response()->view('errors.404', $exception->name, 404);
      // }
      //
        /** 
            TODO 
        **/
        //In Kernel.php $middlewareGroup->web remed this class,
        // so it won't work
        //Reason: bad return page. See: redirect to login from /manage/post/24
        // should be manage/post/24/edit
        if ($exception instanceof AuthenticationException) {
            //return response()->view('authorization-error', [], 500);
            $request->session()->flush();
            return redirect()->guest('login')->with('error', 'Your session has expired');
            //return redirect()->back()->withInput()->with('error', 'Your session has expired');
        }

      // if ($exception instanceof CustomException) {
      //     return response()->view('errors.404', $exception, 404);
      // }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }
}
