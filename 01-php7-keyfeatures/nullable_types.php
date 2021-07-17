<?php

/**
 * Exmaple 1: Param with nullable
 * 
 * ? : allow null value on param
 */

function welcome(?string $name) {
    echo $name
}

welcome(); // invalid
welcome(null); // valid


/**
 * Example 2: param allow nullable and default value
 */

function goodbye(?string $name = null)
{
    if (is_null($name)) 
    {
        echo 'Goodbye!';
    } 
    else
    { 
        echo "Goodbye $name!";
    }
}

goodbye(); // valid
goodbye(null); // valid
goodbye('John'); // valid


/**
 * Example 3: return a value OR nullable
 */
function welcome($name): ?string 
{
    return null; // valid
}

function welcome($name): ?string 
{
    return 'welcome '.$name; // valid
}

function welcome($name): ?string 
{
    return 123; // invalid
}

