<?php

namespace Culture;

class Route extends Controller
{
    private array $routes = [];

    public function addRoute($route, $controller, $action, $args= []): void
    {
        $this->routes[$route] = [
            'controller' => $controller,
            'action' => $action,
            'args' => $args,
        ];
    }

    public function route($url): void
    {
        foreach ($this->routes as $route => $params) {
            if ($route == $url) {
                $controller = "\Culture\\" . $params['controller'];
                $action = $params['action'];
                $args = $params['args'];
                break;
            }
        }

        if (isset($controller)) {
            $controller = new $controller();
            call_user_func_array([$controller, $action], $args);
        } else {
            self::pageNotFound();
        }
    }

    public static function routeRequest($request): void
    {
        match ($request) {
            //authentication
            'login' => LoginController::login($_POST),
            //registration
            'register' => RegistrationController::registration($_POST),
            //logout
            'logout' => self::remUserSes(),
            'profileUpdate' => ProfileController::profileUpdate($_POST),
            'createCulture' => CultureController::createCulture($_POST),
            'createOrder' => OrderController::createOrder($_POST),
            'createFertilize' => FertilizeController::store($_POST),
            'createOption' => OptionController::store($_POST),
            'deleteCulture' => CultureController::deleteCulture($_POST['cultureId']),
            'deleteOption' => OptionController::delete($_POST['weightId']),
            'deleteUser' => UserController::deleteUser($_POST['userId']),
            'deleteSquare' => SquareController::deleteSquare($_POST),
            default => self::pageNotFound()
        };
    }
}