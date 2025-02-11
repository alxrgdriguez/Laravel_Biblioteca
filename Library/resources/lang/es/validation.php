<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'max' => [
        'string' => 'El campo :attribute no puede tener más de :max caracteres.',
    ],
    'unique' => 'El campo :attribute ya ha sido registrado.',

    'custom_' => [
        'isbn' => [
            'unique' => 'El ISBN ingresado ya existe. Por favor, ingrese otro.',
        ],
    ],

    'attributes' => [
        'isbn' => 'ISBN',
        'year_publication' => 'Año de Publicación',
    ],


];
