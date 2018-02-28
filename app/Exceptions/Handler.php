<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Database\Eloquent\RelationNotFoundException;

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
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
			if ($e instanceof MethodNotAllowedHttpException || $e instanceof NotFoundHttpException) {
				return response()->json([
										'message' => "Requête incorrecte",
										'infos' => $request->getMethod()." ".$request->getUri()
												], 405);
			} elseif ($e instanceof RelationNotFoundException) {
				return response()->json([
										'message' => "Les relations demandées ne sont pas correctes.",
										'infos' => $e->getMessage()
												], 404);
			} elseif ($e instanceof HttpException) {
				return response()->json([
										'message' => "Requête impossible à traiter.",
										'infos' => $e->getMessage()
												], 404);
			} elseif ($e instanceof FatalErrorException || $e instanceof QueryException) {
				return response()->json([
										'message' => "Erreur de l'API au cours du traitement.",
										'infos' => $e->getMessage()
												], 500);
			} elseif ($e instanceof ErrorException) {
				return response()->json([
										'message' => "Erreur de l'API au cours du traitement.",
										'infos' => $e->getMessage()
												], 500);
			} elseif (method_exists($e, 'render') && $response = $e->render($request)) {
				return $response;
			} else {
				return parent::render($request, $e);
			}
    }
}
