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

    'accepted' => ':attributeを承認してください。',
    'accepted_if' => ':otherが:valueの場合、:attributeを承認してください。',
    'active_url' => ':attributeは有効なURLではありません。',
    'after' => ':attributeには:dateより後の日付を指定してください。',
    'after_or_equal' => ':attributeには:date以降の日付を指定してください。',
    'alpha' => ':attributeには英字のみ使用できます。',
    'alpha_dash' => ':attributeには英数字、ハイフン、アンダースコアのみ使用できます。',
    'alpha_num' => ':attributeには英数字のみ使用できます。',
    'array' => ':attributeには配列を指定してください。',
    'before' => ':attributeには:dateより前の日付を指定してください。',
    'before_or_equal' => ':attributeには:date以前の日付を指定してください。',
    'between' => [
        'numeric' => ':attributeには:minから:maxまでの数字を指定してください。',
        'file' => ':attributeには:min KBから:max KBまでのサイズのファイルを指定してください。',
        'string' => ':attributeには:min文字から:max文字までの文字列を指定してください。',
        'array' => ':attributeの項目は:min個から:max個までにしてください。',
    ],
    'boolean' => ':attributeには真偽値を指定してください。',
    'confirmed' => ':attributeと確認用の値が一致しません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeは:dateと同じ日付でなければなりません。',
    'date_format' => ':attributeの形式は:formatと一致しません。',
    'declined' => ':attributeを拒否する必要があります。',
    'declined_if' => ':otherが:valueの場合、:attributeを拒否する必要があります。',
    'different' => ':attributeと:otherには異なる値を指定してください。',
    'digits' => ':attributeは:digits桁でなければなりません。',
    'digits_between' => ':attributeは:min桁から:max桁の間でなければなりません。',
    'dimensions' => ':attributeの画像サイズが無効です。',
    'distinct' => ':attributeに重複した値があります。',
    'email' => ':attributeは有効なメールアドレスでなければなりません。',
    'ends_with' => ':attributeは次のいずれかで終わらなければなりません：:values',
    'enum' => '選択された:attributeは無効です。',
    'exists' => '選択された:attributeは無効です。',
    'file' => ':attributeはファイルでなければなりません。',
    'filled' => ':attributeは必須です。',
    'gt' => [
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'file' => ':attributeは:valueキロバイトより大きくなければなりません。',
        'string' => ':attributeは:value文字より多くなければなりません。',
        'array' => ':attributeは:value個より多くの項目がなければなりません。',
    ],
    'gte' => [
        'numeric' => ':attributeは:value以上でなければなりません。',
        'file' => ':attributeは:valueキロバイト以上でなければなりません。',
        'string' => ':attributeは:value文字以上でなければなりません。',
        'array' => ':attributeは:value個以上の項目がなければなりません。',
    ],
    'image' => ':attributeは画像でなければなりません。',
    'in' => '選択された:attributeは無効です。',
    'in_array' => ':attributeは:otherに存在しません。',
    'integer' => ':attributeは整数でなければなりません。',
    'ip' => ':attributeは有効なIPアドレスでなければなりません。',
    'ipv4' => ':attributeは有効なIPv4アドレスでなければなりません。',
    'ipv6' => ':attributeは有効なIPv6アドレスでなければなりません。',
    'json' => ':attributeは有効なJSON文字列でなければなりません。',
    'lt' => [
        'numeric' => ':attributeは:valueより小さくなければなりません。',
        'file' => ':attributeは:valueキロバイトより小さくなければなりません。',
        'string' => ':attributeは:value文字より少なくなければなりません。',
        'array' => ':attributeは:value個より少ない項目でなければなりません。',
    ],
    'lte' => [
        'numeric' => ':attributeは:value以下でなければなりません。',
        'file' => ':attributeは:valueキロバイト以下でなければなりません。',
        'string' => ':attributeは:value文字以下でなければなりません。',
        'array' => ':attributeは:value個以下の項目でなければなりません。',
    ],
    'mac_address' => ':attributeは有効なMACアドレスでなければなりません。',
    'max' => [
        'numeric' => ':attributeは:max以下でなければなりません。',
        'file' => ':attributeは:maxキロバイト以下でなければなりません。',
        'string' => ':attributeは:max文字以下でなければなりません。',
        'array' => ':attributeは:max個以下の項目でなければなりません。',
    ],
    'mimes' => ':attributeは:valuesタイプのファイルでなければなりません。',
    'mimetypes' => ':attributeは:valuesタイプのファイルでなければなりません。',
    'min' => [
        'numeric' => ':attributeは:min以上でなければなりません。',
        'file' => ':attributeは:minキロバイト以上でなければなりません。',
        'string' => ':attributeは:min文字以上でなければなりません。',
        'array' => ':attributeは:min個以上の項目がなければなりません。',
    ],
    'multiple_of' => ':attributeは:valueの倍数でなければなりません。',
    'not_in' => '選択された:attributeは無効です。',
    'not_regex' => ':attributeの形式が無効です。',
    'numeric' => ':attributeは数値でなければなりません。',
    'password' => 'パスワードが正しくありません。',
    'present' => ':attributeが存在している必要があります。',
    'prohibited' => ':attributeフィールドは禁止されています。',
    'prohibited_if' => ':otherが:valueの場合、:attributeフィールドは禁止されています。',
    'prohibited_unless' => ':otherが:valuesにない限り、:attributeフィールドは禁止されています。',
    'prohibits' => ':attributeフィールドは:otherの入力を禁止します。',
    'regex' => ':attributeの形式が無効です。',
    'required' => ':attributeは必須です。',
    'required_array_keys' => ':attributeフィールドには:valuesのエントリーを含める必要があります。',
    'required_if' => ':otherが:valueの場合、:attributeは必須です。',
    'required_unless' => ':otherが:valuesでない場合、:attributeは必須です。',
    'required_with' => ':valuesが存在する場合、:attributeは必須です。',
    'required_with_all' => ':valuesが存在する場合、:attributeは必須です。',
    'required_without' => ':valuesが存在しない場合、:attributeは必須です。',
    'required_without_all' => ':valuesが存在しない場合、:attributeは必須です。',
    'same' => ':attributeと:otherは一致しなければなりません。',
    'size' => [
        'numeric' => ':attributeは:sizeでなければなりません。',
        'file' => ':attributeは:sizeキロバイトでなければなりません。',
        'string' => ':attributeは:size文字でなければなりません。',
        'array' => ':attributeは:size個の項目を含まなければなりません。',
    ],
    'starts_with' => ':attributeは次のいずれかで始まる必要があります：:values',
    'string' => ':attributeは文字列でなければなりません。',
    'timezone' => ':attributeは有効なタイムゾーンでなければなりません。',
    'unique' => ':attributeはすでに使用されています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeは有効なURLでなければなりません。',
    'uuid' => ':attributeは有効なUUIDでなければなりません。',

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
        'attribute-name' => [
            'rule-name' => 'カスタムメッセージ',
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

    'attributes' => [],

];
