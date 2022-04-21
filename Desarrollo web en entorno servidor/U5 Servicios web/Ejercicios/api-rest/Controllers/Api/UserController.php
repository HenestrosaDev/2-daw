<?php
require_once PROJECT_ROOT_PATH . "/Exceptions/JSONCustomException.php";

/**
 * Each method of this controller is associated with a route. For example, if
 * the user wants to get the list of the users via the /user/list REST endpoint,
 * it will execute the listAction() method.
 * 
 * * Each action has a REST endpoint associated.
 */

class UserController extends BaseController
{
	/**
	 * "/user/list" Endpoint - Get list of users
	 */
	public function listAction()
	{
		$errorDescription = '';
		$requestMethod = $_SERVER["REQUEST_METHOD"];
		$queryStringParams = $this->getQueryStringParams();

		if (strtoupper($requestMethod) == 'GET') {
			try {
				$user = new User();

				$limit = 10; // default limit
				if (isset($queryStringParams['limit']) && $queryStringParams['limit']) {
					$limit = $queryStringParams['limit'];
				}

				$users = $user->getUsers($limit);
				$responseData = json_encode($users);

				$jsonException = new JSONCustomException();
				if ($jsonException->checkError(json_last_error())) {
					throw new Exception($jsonException->checkError(json_last_error()));
				}
			} catch (Error $e) {
				$errorDescription = $e->getMessage() . 'Something went wrong! Please contact support.';
				$errorHeader = 'HTTP/1.1 500 Internal Server Error';
			}
		} else {
			$errorDescription = 'Method not supported';
			$errorHeader = 'HTTP/1.1 422 Unprocessable Entity';
		}

		// send output
		if (!$errorDescription) {
			$this->sendOutput(
				$responseData,
				array('Content-Type: application/json', 'HTTP/1.1 200 OK')
			);
		} else {
			$this->sendOutput(
				json_encode(array('error' => $errorDescription)),
				array('Content-Type: application/json', $errorHeader)
			);
		}
	}
}
