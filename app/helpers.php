<?php

function old_value($field, $model){
    return $model ? old($field, $model->$field) : old($field);
}
