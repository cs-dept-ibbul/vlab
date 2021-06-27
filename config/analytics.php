<?php

return [

    /*
     * The view id of which you want to display data.
     */
    'view_id' => env('ANALYTICS_VIEW_ID'),

    /*
     * Path to the client secret json file. Take a look at the README of this package
     * to learn how to get this file. You can also pass the credentials as an array
     * instead of a file path.
     */
    'service_account_credentials_json' => [
        "type" => "service_account",
        "project_id" => "vlab-315807",
        "private_key_id" => "18cdd7dd0a882699ad219ee1d4b8bd391ef9333e",
        "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDGLluPA+aw0xxS\nbMACIH/YXNIkY+89r6nmZH0nH8qziHxhFkYNnQDhxVaE5orhCnzi4FZPtb658/Hl\n7vot5Xc8U6Y9crS+ogWj9yRdo6z8jW5nEh0HnaaRVg42kQ3c5fl2JlYg5KvAuyWh\nteLgK3oqP2C7kKi3IH2e+jQYCCfHgoeSGWq3Bo7n15bJDPKBjnPY8kLAEfMhfh/T\nyr5I3PplFM+Et1TCXaglR6kBTlfoYAKhhp7bXOl/grj/9+EAMZqpQ3UmZ1bWs6+f\nGIi/ilg+TWiSEUTYUzcRyq8Qaeh0OjkZD02CSkoDTngkryLnM5xA40WDtd8YIRtd\nswJwU9cFAgMBAAECggEAD/iE6Y0m2QmjnuiDfw23l8v/0FhwW3rYTjLmG2d2ZPT4\nZwo4j4N0on0jcuGHAB82/2vqRhFaAy92R0bKCQr/X/sdasF0xjxq3XLpeUAF4l1o\ncAHM7plFEYcgl+5Px8U4ZGMvA4bCE5hRWPXo3b1gjTPfJlvASO+4nT2XF00ISE18\nl9rBvbIHRCAJq4ttsDhI82J/Lt67o2abhslk2sVqvmFzHz9Q0pI+ucHfJOcS7/bU\nKNYZUI7wr3ktpRbZ5JqGiJd8WXPjWe+Cn+a9BQzNVAHhBWouHL5zp/kpgF9+qJbE\nTo8QwCxU9Dvj8wY2UWgwW2smoGts9tnpjz8k4MjmOQKBgQD+7GgT9A31vnrEpUZC\n9PCdyMRYGIeiEvASj7YIi3zYABfwDIa3x/IwTyjFG4mXTcjeZhod30JnOlw/7QN5\nUV8tSarHjFq+Ty3C2DiV9j9WV7nAZ1YnGHR6Ki1iE+QrAxZDpQ2Jq8za+9Tc5oft\nfYrMc8sY1HpQDu7pHrpGm/JBbQKBgQDHBJudZ09VGow7ceNDxu3xnHi2pYZTS9Xr\nPFp+lDCHviV65qwfx+mz4oRECk5GVPCKtrtU+hJQOiVMwwhsu/dBUabXxGTdTaaC\n38vEicuiJEV6gBJu0XuBNhVA7F2F46BiC+6SQG/13+rcLdKLR2O13AX7uXpV3LFa\nt1+21A6E+QKBgQDrI98gwJZ73bZaWuUDb/HeaMkLRZ0eV3+Qb3UGTrvadcOezb8a\nGFmCTBIcNjllEf+9fMqMUVpr434iDRqONgunt3LK2+D7+AcK2ezgDqL/nq2dFvR1\n3W3bHbp85EIrlo5b2QwyuACe4XnIRPCOlKWJzylAfwVPgWbIK2rBJKmBxQKBgBtk\nKvbTDTwtVzenSRw++OjUHFknFwHH4j1qJRpe0v8b0JTFwtLs9OFpP8MNmBBeCG1P\nESF0+ahJGHEkNrigdjtrPYdc5HUBBvXkT2tRe9FpJJbjoaXW9ySliO9SmNygo6Za\n9g7zB3XTx8NeGyhIPxT8n2Yx9QB0S4Ss0GOddBIhAoGATo8mF6e/LiTONRL1217j\nV64L1+6a4h+ktTKB4JtnYKD/9ZQK//XPFa5urbu+gY9ytM2vF+qi0NJ56rQBTtHq\nrSuwPWYSZN0uSjCk7ufqPfSfFoOD7IGHXO7/m6RWHdgMBhqXlLtaco4h2iOwunfM\nIJxM4kYLYL6ZVqGDH9PHDbk=\n-----END PRIVATE KEY-----\n",
        "client_email" => "vlab-645@vlab-315807.iam.gserviceaccount.com",
        "client_id" => "109948744809693344526",
        "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
        "token_uri" => "https://oauth2.googleapis.com/token",
        "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
        "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/vlab-645%40vlab-315807.iam.gserviceaccount.com"
    ],
    //  storage_path('app/analytics/vlab-315807-18cdd7dd0a88.json'),

    /*
     * The amount of minutes the Google API responses will be cached.
     * If you set this to zero, the responses won't be cached at all.
     */
    'cache_lifetime_in_minutes' => 60 * 24,

    /*
     * Here you may configure the "store" that the underlying Google_Client will
     * use to store it's data.  You may also add extra parameters that will
     * be passed on setCacheConfig (see docs for google-api-php-client).
     *
     * Optional parameters: "lifetime", "prefix"
     */
    'cache' => [
        'store' => 'file',
    ],
];
