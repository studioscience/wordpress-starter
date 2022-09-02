<?php
if (!function_exists("js_console")) {
  function js_console(mixed $data, string $type = "log"): void {
    $json = addslashes(json_encode($data));

    echo "<script>";
    echo "(() => {";
    echo "const decoded = JSON.parse(\"${json}\");";
    echo "console.${type}(decoded);";
    echo "})()";
    echo "</script>";
  }
}
