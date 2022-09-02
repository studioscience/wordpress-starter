<?php

if (!function_exists("camel_to_kebab_case")) {
  /**
   * @param string $original - camel cased input
   * @return string - kebab case
   */
  function camel_to_kebab_case(string $original): string {
    return strtolower(
      preg_replace(
        "/(?<=\d)(?=[A-Za-z])|(?<=[A-Za-z])(?=\d)|(?<=[a-z])(?=[A-Z])/",
        "-",
        $original
      )
    );
  }
}

if (!function_exists("prepare_attribute_string")) {
  /**
   * @param $attributeNames string[] - kebab-case keys to format
   * @param $args - key-value pairs representing attributeName => value
   * @return string - formatted attribute string
   */
  function prepare_attribute_string(
    array $attributeNames,
    array $args
  ): string {
    $kebabArgs = [];
    foreach ($args as $camelKey => $value) {
      $mixedCaseKey = str_replace([" ", "_"], "-", $camelKey);
      $kebabKey = camel_to_kebab_case($mixedCaseKey);
      $kebabArgs[$kebabKey] = $value;
    }
    $uriAttributes = ["action", "cite", "href", "src"];
    $validElementAttributes = array_fill_keys($attributeNames, true);
    $definedAttributes = array_intersect_key(
      $kebabArgs,
      $validElementAttributes
    );

    $formatAttributeValuePairs = function (
      string $key,
      string $value = ""
    ) use ($uriAttributes): string {
      $escapedValue = in_array($key, $uriAttributes)
        ? esc_url($value)
        : esc_attr($value);

      return "$key=\"$escapedValue\"";
    };

    $formattedAttributes = array_map(
      $formatAttributeValuePairs,
      array_keys($definedAttributes),
      array_values($definedAttributes)
    );

    return implode(" ", $formattedAttributes);
  }
}

if (!function_exists("crunch_classes")) {
  /**
   * @param array $classNames - string/boolean pairs representing the className => shouldUseClass
   * @return string - combined class names kept
   */
  function crunch_classes(array $classNames): string {
    $keeperClassNames = [];

    foreach ($classNames as $name => $shouldUseClass) {
      if ($shouldUseClass) {
        $keeperClassNames[] = $name;
      }
    }

    return implode(" ", $keeperClassNames);
  }
}
