<?php 

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used
    | by the validator class. Some of the rules contain multiple versions,
    | such as the size (max, min, between) rules. These versions are used
    | for different input types such as strings and files.
    |
    | These language lines may be easily changed to provide custom error
    | messages in your application. Error messages for custom validation
    | rules may also be added to this file.
    |
    */

    "accepted"       => "El campo :attribute debe ser aceptado.",
    "active_url"     => "El campo :attribute no es una Url válida.",
    "after"          => "El campo :attribute debe ser una fecha posterior a :date.",
    "alpha"          => "El campo :attribute sólo puede contener letras.",
    "alpha_dash"     => "El campo :attribute sólo puede contener letras, números o guiones.",
    "alpha_num"      => "El campo :attribute sólo puede contener letras o números.",
    "array"          => "El campo :attribute debe tener al menos un elemento seleccionado.",
    "before"         => "El campo :attribute debe ser una fecha previa a :date.",
    "between"        => array(
        "numeric" => "El campo :attribute debe estar entre :min - :max.",
        "file"    => "El campo :attribute debe estar entre :min - :max kilobytes.",
        "string"  => "El campo :attribute debe estar entre :min - :max caracteres.",
    ),
    "confirmed"      => "La confirmación del campo :attribute no coincide.",
    "count"          => "El campo :attribute debe tener exactamente :count elementos seleccionados.",
    "countbetween"   => "El campo :attribute debe tener entre :min y :max elementos seleccionados.",
    "countmax"       => "El campo :attribute debe tener menos de :max elementos seleccionados.",
    "countmin"       => "El campo :attribute debe tener a los menos :min elementos seleccionados.",
    "different"      => "El campo :attribute y el campo :other deben ser distintos.",
    "email"          => "El formato del campo :attribute no es válido.",
    "exists"         => "El campo :attribute seleccionado no es válido.",
    "image"          => "El campo :attribute debe ser una imagen.",
    "in"             => "El campo :attribute seleccionado no es válido.",
    "integer"        => "El campo :attribute debe ser un número entero.",
    "ip"             => "El campo :attribute debe ser una dirección Ip válida.",
    "match"          => "El formato del campo :attribute no es válido.",
    "max"            => array(
        "numeric" => "El campo :attribute debe ser menos que :max.",
        "file"    => "El campo :attribute debe ser menos que :max kilobytes.",
        "string"  => "El campo :attribute debe ser menos que :max characters.",
    ),
    "mimes"          => "El campo :attribute debe ser un archivo de tipo: :values.",
    "min"            => array(
        "numeric" => "El campo :attribute debe ser a lo menos :min.",
        "file"    => "El campo :attribute debe ser a lo menos :min kilobytes.",
        "string"  => "El campo :attribute debe ser a lo menos :min characters.",
    ),
    "not_in"         => "El atributo :attribute no es válido.",
    "numeric"        => "El campo :attribute debe ser un número.",
    "required"       => "El campo :attribute debe ser ingresado.",
    "same"           => "El campo :attribute y el campo :other deben coincidir.",
    "size"           => array(
        "numeric" => "El campo :attribute debe ser de :size.",
        "file"    => "El campo :attribute debe ser de :size kilobyte.",
        "string"  => "El campo :attribute debe ser de :size characters.",
    ),
    "unique"         => "El campo :attribute ya fué tomado.",
    "url"            => "El formato del campo :attribute no es válido.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute_rule" to name the lines. This helps keep your
    | custom validation clean and tidy.
    |
    | So, say you want to use a custom validation message when validating that
    | the "email" attribute is unique. Just add "email_unique" to this array
    | with your custom message. The Validator will handle the rest!
    |
    */

    'custom' => array(),

    /*
    |--------------------------------------------------------------------------
    | Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". Your users will thank you.
    |
    | The Validator class will automatically search this array of lines it
    | is attempting to replace the :attribute place-holder in messages.
    | It's pretty slick. We think you'll like it.
    |
    */

    'attributes' => array(),

);