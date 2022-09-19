<?php

namespace Ensi\LaravelOpenApiServerGenerator\Utils;

class HelperParser
{
    /**
     * Generate a sensible default controller for a route.
     */
    public static function getController($method, $route) {
        $group = $route->tags[0] ?? "API";
        $namespace = "\\App\\Http\\Controllers";

        return new ParsedRouteHandler(
            namespace: $namespace,
            class: self::camelCase($group),
            fqcn: "$namespace\\$group",
            method: $method,
        );
    }

    /**
     * Get a sensible default variable name for an enum value.
     */
    public static function getEnumVarname($enum) {
        if (ctype_digit($enum)) {
            return '_' . $enum;
        }

        return self::camelCase($enum);
    }

    private static function camelCase(string $input): string {
        return str_replace(' ', '', ucwords(str_replace(['-', '_', '.'], ' ', $string)));
    }
}
