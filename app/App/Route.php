<?php

namespace IRFANM\PHP\EREPORT\App;

class Route
{
    private static array $routes = [];

    public static function route(string $method, string $path, string $controller, string $function , array $middleware = []): void
    {
        self::$routes[] = [
            "method" => $method,
            "path" => $path,
            "controller" => $controller,
            "function" => $function,
            "middleware" => $middleware
        ];
    }

    public static function gas(): void
    {
        $path = "/";

        if(isset($_SERVER['PATH_INFO']))
        {
            $path = $_SERVER['PATH_INFO'];
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach(self::$routes as $route)
        {
            $pattern = "#^" . $route['path'] . "$#";

            if(preg_match($pattern, $path, $variables) && $method == $route['method'])
            {
                $function = $route['function'];
                $controller = new $route['controller'];

                array_shift($variables);
                call_user_func_array([$controller, $function], $variables);

                return;
            }
        }

        http_response_code(404);
        // echo "404 : Halaman ra ketemu !.";
        View::redirect('/404');
    }

}
