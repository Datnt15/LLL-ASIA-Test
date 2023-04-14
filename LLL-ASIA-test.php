<?php

$array_length = 10;

$rotation_steps = 4;
// $rotation_steps = -4;
// if rotation steps > 0 => items move from left to right
// else, items move backward

print_r(handler($rotation_steps, $array_length));

function solution($arr, $rotation_steps) {
  $number_to_slice = $rotation_steps > 0 ? abs($rotation_steps) : count($arr) - abs($rotation_steps);
  $temp_arr = array_slice($arr, 0, $number_to_slice);
  array_splice($arr, 0, $number_to_slice);
  return array_merge($arr, $temp_arr);
}

// Using loop
function solution_2($arr, $rotation_steps) {
  $i = 0;
  while ($i < abs($rotation_steps)) {
    if ($rotation_steps > 0) {
      $first_item = array_shift($arr);
      array_push($arr, $first_item);
    }
    else {
      $last_item = array_pop($arr);
      array_unshift($arr, $last_item);
    }
    $i++;
  }
  return $arr;
}

function handler($rotation_steps, $array_length) {
  if (!is_int($array_length) || $array_length <= 0) {
    echo "Invalid array length";
    return;
  }
  if (!is_int($rotation_steps)) {
    echo "Invalid rotation steps";
    return;
  }

  $rotation_steps %= $array_length;
// we just need integral part of rotation_steps

  // Render array
  $arr = [];
  for ($i = 0; $i < $array_length; $i++) {
    $arr[$i] = $i + 1;
  }

  // Show origin array
  echo implode(' ', $arr) . ' <br> ';
  if ($rotation_steps === 0) {
    echo implode(' ', $arr);
    return;
  }

  // Show rotated array
  echo implode(' ', solution($arr, $rotation_steps));
}

?>