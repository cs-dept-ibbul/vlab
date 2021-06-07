<?php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
class allowaccess extends BaseVerifier{
	
	protected $except[
		'/ajax-logout'
		'/ajax-check-login'
	]
}