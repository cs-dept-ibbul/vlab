<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
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

   /*  public function render($request, Exception $e)
    {
        if ($e instanceof TokenMismatchException){
            // Redirect to a form. Here is an example of how I handle mine
            return redirect('/login')->with('csrf_error',"Oops! Seems you couldn't submit form for a long time. Please try again.");
        }

        return parent::render($request, $e);
    }*/
}
