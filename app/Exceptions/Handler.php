<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use ProtoneMedia\Splade\Facades\Toast;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(\ProtoneMedia\Splade\SpladeCore::exceptionHandler($this));

        $this->reportable(function (Throwable $e) {
            //
        });
        $this->reportable(function (EntityNotFoundException $e) {
            Toast::title(title: 'Ops')
                ->message($e->getMessage())
                ->centerBottom()
                ->autoDismiss(afterSeconds: 20);
        });
    }
}
