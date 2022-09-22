<?php

function limpiarVariable($valor)
{
    //limpiar variable de caracteres especiales y espaciosen blanco.
    $valor = str_replace(" ", "", $valor);
    $valor = str_replace("ñ", "n", $valor);
    $valor = str_replace("Ñ", "N", $valor);
    $valor = str_replace("ó", "o", $valor);
    $valor = str_replace("Ó", "o", $valor);
    $valor = str_replace("Ö", "o", $valor);
    $valor = str_replace("é", "e", $valor);
    $valor = str_replace("É", "e", $valor);
    $valor = str_replace("'", "", $valor);
    $valor = str_replace("´", "", $valor);
    $valor = str_replace("`", "", $valor);
    $valor = str_replace('"', "", $valor);
    $valor = str_replace("@", "", $valor);
    $valor = str_replace("Ç", "", $valor);
    $valor = str_replace("ç", "", $valor);
    $valor = str_replace("|", "", $valor);
    $valor = str_replace("[", "", $valor);
    $valor = str_replace("]", "", $valor);
    $valor = str_replace("{", "", $valor);
    $valor = str_replace("}", "", $valor);
    $valor = str_replace("#", "", $valor);
    $valor = str_replace("‘", "", $valor);
    $valor = str_replace("º", "", $valor);
    $valor = str_replace("+", "", $valor);
    $valor = str_replace("*", "", $valor);
    $valor = str_replace("^", "", $valor);
    $valor = str_replace("&", "", $valor);
    $valor = str_replace("%", "", $valor);
    $valor = str_replace("¬", "", $valor);
    $valor = str_replace("¡", "", $valor);
    $valor = str_replace("¿", "", $valor);
    $valor = str_replace("?", "", $valor);
    $valor = str_replace("\\", "", $valor);
    $valor = str_replace("ª", "", $valor);
    $valor = strtolower($valor);
    return $valor;
}