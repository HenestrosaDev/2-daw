<?php
class BaseController
{
	/**
	 * __call magic method. It’s called when you try to invoke a method that
	 * doesn't exist
	 */
	public function __call($name, $arguments)
	{
		$this->sendOutput('', array('HTTP/1.1 404 Not Found'));
	}

	/**
	 * Get URI elements. Useful when we try to validate the REST endpoint called
	 * by the user
	 * 
	 * @return array of URI segments
	 */
	protected function getUriSegments()
	{
		$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$uri = explode('/', $uri);

		return $uri;
	}

	/**
	 * Get query-string params.
	 *
	 * @return array of query string variables that are passed along with the
	 * incoming request
	 */
	protected function getQueryStringParams()
	{
		return parse_str($_SERVER['QUERY_STRING'], $query);
	}

	/**
	 * Send API output.
	 *
	 * @param mixed  $data
	 * @param string $httpHeader
	 */
	protected function sendOutput($data, $httpHeaders = array())
	{
		header_remove('Set-Cookie');

		if (is_array($httpHeaders) && count($httpHeaders)) {
			foreach ($httpHeaders as $httpHeader) {
				header($httpHeader);
			}
		}

		echo $data;
		exit;
	}
}
