<?php

/**
 * Test if the object provided is an instance of Illuminate\Database\Eloquent\Collection or an array
 * Returns true if so
 * @param mixed array|\Illuminate\Database\Eloquent\Collection $object
 * @return bool $response
 */
function is_collection($object)
{
    $response = false;
    if ($object instanceof \Illuminate\Database\Eloquent\Collection || is_array($object)) {
        $response = true;
    }
    return $response;
}

/**
 * Test if the object provided is an instance of Illuminate\Database\Eloquent\Collection or an array
 * and if the collection or array has an element at the index provided
 * Returns true if so
 * @param mixed array|\Illuminate\Database\Eloquent\Collection $object
 * @param int $index
 * @return bool $response
 */
function is_collection_with_element($object, $index)
{
    $response = false;
    if ($object instanceof \Illuminate\Database\Eloquent\Collection) {
        if ($object->has($index)) {
            $response = true;
        }
    } else if (is_array($object)) {
        if (isset($object[$index])) {
            $response = true;
        }
    }
    return $response;
}

/**
 * Test if an Object is an array or Illuminate\Database\Eloquent\Collection
 * and check if it has at least one element
 * Returns true if so
 * @param mixed array|\Illuminate\Database\Eloquent\Collection $object
 * @return bool $response
 */
function is_collection_with_elements($object)
{
    $response = is_collection($object);
    if ($response == true && count($object) > 0) {
        $response = true;
    } else {
        $response = false;
    }
    return $response;
}
