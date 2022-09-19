<?php

namespace Ensi\LaravelOpenApiServerGenerator\Utils;

use Ensi\LaravelOpenApiServerGenerator\DTO\ParsedRouteHandler;

class DefaultsParser
{
    /**
     * Generate a sensible default controller for a route.
     */
    public function getController($route) {
        $group = $route->tags[0] ?? "API";
        $class = $this->camelCase($group) . "Controller";
        $namespace = "App\\Http\\Controllers";

        return new ParsedRouteHandler(
            namespace: $namespace,
            class: $this->camelCase($group),
            fqcn: "$namespace\\$group",
            method: $route->operationId,
        );
    }

    /**
     * Get a sensible default variable name for an enum value.
     */
    public function getEnumVarname($enum) {
        if (ctype_digit($enum)) {
            return '_' . $enum;
        }

        return $this->camelCase($enum);
    }

    /**
     * E.g. "my-example" becomes "MyExample".
     */
    private function camelCase(string $input): string {
        return str_replace(' ', '', ucwords(str_replace(['-', '_', '.'], ' ', $input)));
    }
}
