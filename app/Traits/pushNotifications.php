<?php

namespace App\Traits;

use App\Models\User;
use DateTime;
use Illuminate\Support\Str;
use onesignal\client\api\DefaultApi;
use onesignal\client\Configuration;
use onesignal\client\model\GetNotificationRequestBody;
use onesignal\client\model\Notification;
use onesignal\client\model\StringMap;
use onesignal\client\model\Player;
use onesignal\client\model\UpdatePlayerTagsRequestBody;
use onesignal\client\model\ExportPlayersRequestBody;
use onesignal\client\model\Segment;
use onesignal\client\model\FilterExpressions;
use PHPUnit\Framework\TestCase;
use GuzzleHttp;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
trait pushNotifications
{
    public function sendNotification($ExternalId,$body,$image = null,$url = null)
    {
        $appId = config('app.APPID');
        $appKeyToken = config('app.APPKEYTOKEN');
        $userKeyToken = config('app.USERKEYTOKEN');

        $config = Configuration::getDefaultConfiguration()
            ->setAppKeyToken($appKeyToken)
            ->setUserKeyToken($userKeyToken);

        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);

        $content = new StringMap();
        $content->setEn($body);

        $notification = new Notification();
        $notification->setAppId($appId);
        $notification->setContents($content);

        //if external id exist or you want to send to specific member
        if($ExternalId !== null && count($ExternalId) > 0)
        {
            $convertedExternalId = array_map('strval', $ExternalId);
            $notification->setIncludeExternalUserIds($convertedExternalId);
            $notification->setChannelForExternalUserIds('push');
        }
        else //else send to all subscribed users
        {
            $notification->setIncludedSegments(['Subscribed Users']);
        }

        // Attach the image to the notification
        $imageUrl = $image; // Replace with the URL of your image
        $notification->setBigPicture($imageUrl);    // for android
        $notification->setChromeWebImage($imageUrl); //for chrome
        $notification->setIosAttachments('{"id1": '.$imageUrl.'}');

        // Set the URL to redirect on click
        if($url !== null)
        {
            $setUrl = $url;
        }
        else
        {
            $setUrl = url('/');
        }
         // Replace with the URL you want to redirect to
        $notification->setUrl($setUrl);

        $result = $apiInstance->createNotification($notification);
        return response()->json(['status'=>'1'],200);
    }
}
