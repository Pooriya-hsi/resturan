<?php

use Ghasedak\GhasedakApi;

function imageUrl($image)
{
    return env('ADMIN_PANEL_URL') . env('PRODUCT_IMAGES_PATH') . $image;
}

function salePercent($price, $salePrice)
{
    return round((($price - $salePrice) / $price) * 100);
}

function sendOtpSms($cellphone, $opt)
{
    return 'Done!';

    $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));

    $api->Verify(
        $cellphone,  // receptor
        1,           // 1 for text message and 2 for voice message
        "otp",       // name of the template which you've created in you account
        $opt,        // parameters (supporting up to 10 parameters)
    );
}
