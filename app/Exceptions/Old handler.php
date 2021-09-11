<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // public function report(Throwable $exception){

    // };

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    // public function render($request, Throwable  $exception)
    // {   
    //      // Check out Error Handling #render for more information 
    //      // render method is responsible for converting a given exception into an HTTP response 
    //      // Catch AthenticationException and redirect back to somewhere else... 
    //      if($exception instanceof AuthenticationException){ 
    //          $guard = array_get($exception->guards(), 0);
    //          switch($guard){ 
    //              case 'admin': 
    //                 return redirect(route('admin.login'));
    //                 break; 

    //              default: 
    //              return redirect(route('login')); 
    //                 break; 
    //             } 
    //         } 
    //     return parent::render($request, $exception);
    // }

    public function render($request, Throwable $exception)
    {
        if($exception instanceof AuthenticationException){
            $guard = Arr::get($exception->guards(), 0);

            return redirect(route( ($guard == 'admin')?'admin.login':'login' ));
        }
        return parent::render($request, $exception);
    }
}
