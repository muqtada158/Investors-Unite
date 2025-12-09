<?php

namespace App\Jobs;

use App\Models\Member;
use App\Models\NotificationPermissions;
use App\Traits\pushNotifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class pushNotificationsJob implements ShouldQueue
{
    use pushNotifications, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $member;
    protected $body;
    protected $image;
    protected $type;
    protected $myUrl;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($member, $body, $image, $type, $myUrl)
    {
        $this->member = $member;
        $this->body = $body;
        $this->image = $image;
        $this->type = $type;
        $this->myUrl = $myUrl;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $member = Member::where('device_token',$this->member)->first();
        $permission = NotificationPermissions::where('member_id',$this->member)->first();

        if(isset($permission) && $permission[$this->type] == 1)
        {
            $this->sendNotification($this->member,$this->body,$this->image,$this->myUrl);
        }
        elseif($this->type === 'sendToAll')
        {
            $this->sendNotification(null,$this->body,$this->image,$this->myUrl);
        }
    }
}
