<?php

if (!function_exists('hello')) {
  function hello() {
    return "Hello, world!";
  }
}

if (!function_exists('hashtagify')) {
  function hashtagify($classifier) {
    return strtolower(studly_case($classifier));
  }
}
