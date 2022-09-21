<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $e
     *
     * @return Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof UnauthorizedException && !$request->ajax()) {
            return redirect(getRedirectRoute())->withErrors(['forbidden' => 'Invalid Role']);
        }

        if ($exception instanceof AuthorizationException && !$request->ajax()) {
            if (url()->previous() != url()->current())
                return redirect()->back()->withErrors(['forbidden' => $exception->getMessage()]);
            else return redirect(getRedirectRoute())->withErrors(['forbidden' => $exception->getMessage()]);
        }
        if ($exception instanceof ValidationException && ($request->ajax() || Str::contains($request->url(), 'api'))) {
            $errors = array_values($exception->validator->errors()->getMessages());
            return response([
                'message'          => Arr::flatten($errors)[0],
                'success'          => 0,
                'validation_error' => 1
            ], 422);
        }

        return parent::render($request, $exception);
    }
}
