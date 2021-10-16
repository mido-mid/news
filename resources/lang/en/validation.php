<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

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

    'custom' => [
        'media' => [
            'required' => 'يجب أن تختار الصورة',
            'image' => 'يجب أن يكون الملف المرفوع هو صورة',
            'mimes' => 'jpg,jpeg,png يجب أن تكون الصور من نوع',
            'max' => 'حجم الوسائط لا يزيد عن 5 ميجابيتس',
        ],
        'image' => [
            'required' => 'يجب أن تختار الصورة',
            'image' => 'يجب أن يكون الملف المرفوع هو صورة',
            'mimes' => 'jpg,jpeg,png يجب أن تكون الصور من نوع',
            'max' => 'حجم الوسائط لا يزيد عن 5 ميجابيتس',
        ],
        'category_id' => [
            'required' => 'يجب أن تختار القسم',
        ],
        'name' => [
            'required' => 'يجب أن تكتب اسمك',
            'min' => 'يجب أن لا يقل الإسم عن 3 حروف',
            'max' => 'يجب أن لا يزيد الإسم عن 100 حرف',
            'not_regex' => 'يجب أن يتكون الإسم من حروف فقط',
            'string' => 'هناك خطأ في صيغة الإسم',
        ],
        'title' => [
            'required' => 'يجب أن تكتب عنوان الخبر',
            'min' => 'يجب أن لا يقل عنوان الخبر عن 3 حروف',
            'max' => 'يجب أن لا يزيد عنوان الخبر عن 255 حرف',
            'string' => 'هناك خطأ في صيغة عنوان الخبر',
        ],
        'body' => [
            'required' => 'يجب أن تكتب تفاصيل الخبر',
        ],
        'author' => [
            'required' => 'يجب أن تكتب اسم الكاتب',
            'min' => 'يجب أن لا يقل اسم الكاتب عن 3 حروف',
            'max' => 'يجب أن لا يزيد اسم الكاتب عن 100 حرف',
            'not_regex' => 'يجب أن يتكون اسم الكاتب من حروف فقط',
            'string' => 'هناك خطأ في صيغة اسم الكاتب',
        ],
        'email' => [
            'required' => 'يجب أن تكتب البريد الإلكتروني الخاص بك',
            'email' => 'هناك خطأ في صيغة البريد الإلكتروني',
            'unique' => 'يمتلك شخص أخر هذا البريد الإلكتروني',
            'max' => 'يجب أن لا يزيد اسم الكاتب عن 200 حرف',
        ],
        'password' => [
            'required' => 'يجب أن تكتب كلمة السر الخاصة بك',
            'string' => 'هناك خطأ في صيغة كلمة السر',
            'min' => 'يجب أن لا تقل كلمة السر عن 8 حروف',
            'confirmed' => 'خطأ في إعادة كتابة كلمة السر',
        ],
        'type' => [
            'required' => 'يجب أن تختار النوع',
        ],
        'complaint' => [
            'required' => 'يجب أن تكتب تفاصيل الشكوي',
            'not_regex' => 'يجب أن تتكون تفاصيل الشكوي من حروف فقط',
        ],
        'phone' => [
            'required' => 'يجب أن تكتب رقم هاتفك',
            'digits' => 'يجب أن يتكون رقم الهاتف من 11 رقم',
        ],
        'link' => [
            'required' => 'يجب أن تكتب رابط الإعلان',
            'url' => 'هناك خطأ في صيغة االرابط',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => "الإسم",
        'email' => "البريد الإلكتروني",
        'type' => "النوع",
        'category_id' => "القسم",
        'title' => "عنوان الخبر",
        'body' => "تفاصيل الخبر",
        'author' => " اسم الكاتب",
        'media' => "الصور",
        'image' => "الصورة",
        'password' => "كلمة السر",
        'password_confirmation' => "تأكيد كلمة السر",
    ],

];
