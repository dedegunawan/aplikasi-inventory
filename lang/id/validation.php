<?php
return array(
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    "accepted"         => ":attribute must be accepted.",
    "active_url"       => ":attribute is not a valid URL.",
    "after"            => ":attribute must be a date after :date.",
    "alpha"            => ":attribute may only contain letters.",
    "alpha_dash"       => ":attribute may only contain letters, numbers, and dashes.",
    "alpha_num"        => ":attribute may only contain letters and numbers.",
    "array"            => ":attribute must be an array.",
    "before"           => ":attribute must be a date before :date.",
    "between"          => array(
        "numeric" => ":attribute must be between :min and :max.",
        "file"    => ":attribute must be between :min and :max kilobytes.",
        "string"  => ":attribute must be between :min and :max characters.",
        "array"   => ":attribute must have between :min and :max items.",
    ),
    "confirmed"        => ":attribute confirmation does not match.",
    "date"             => ":attribute harus berupa tanggal.",
    "date_format"      => ":attribute harus mempunyai format :format.",
    "different"        => ":attribute and :other must be different.",
    "digits"           => ":attribute must be :digits digits.",
    "digits_between"   => ":attribute must be between :min and :max digits.",
    "email"            => ":attribute format is invalid.",
    "exists"           => "selected :attribute is invalid.",
    "image"            => ":attribute must be an image.",
    "in"               => "Kode :attribute tidak ada di basis data.",
    "integer"          => ":attribute harus integer (angka bulat)",
    "ip"               => ":attribute must be a valid IP address.",
    "max"              => array(
        "numeric" => ":attribute may not be greater than :max.",
        "file"    => ":attribute may not be greater than :max kilobytes.",
        "string"  => ":attribute may not be greater than :max characters.",
        "array"   => ":attribute may not have more than :max items.",
    ),
    "mimes"            => ":attribute must be a file of type: :values.",
    "min"              => array(
        "numeric" => ":attribute must be at least :min.",
        "file"    => ":attribute must be at least :min kilobytes.",
        "string"  => ":attribute must be at least :min characters.",
        "array"   => ":attribute must have at least :min items.",
    ),
    "not_in"           => "selected :attribute is invalid.",
    "numeric"          => ":attribute harus berupa angka.",
    "regex"            => ":attribute format is invalid.",
    "required"         => ":attribute harus diisi.",
    "required_if"      => ":attribute field is required when :other is :value.",
    "required_with"    => ":attribute field is required when :values is present.",
    "required_without" => ":attribute field is required when :values is not present.",
    "same"             => ":attribute and :other must match.",
    "size"             => array(
        "numeric" => ":attribute must be :size.",
        "file"    => ":attribute must be :size kilobytes.",
        "string"  => ":attribute must be :size characters.",
        "array"   => ":attribute must contain :size items.",
    ),
    "unique"           => ":attribute sudah digunakan.",
    "url"              => ":attribute format is invalid.",
    "in"              => ":attribute tidak ada di database.",
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => array(),
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => array(),
);
