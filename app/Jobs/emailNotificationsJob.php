<?php

namespace App\Jobs;

use App\Models\Member;
use App\Models\NotificationPermissions;
use App\Traits\emailNotifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class emailNotificationsJob implements ShouldQueue
{
    use emailNotifications, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $member;
    protected $message;
    protected $emailType;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($member, $message, $emailType)
    {
        $this->member = $member;
        $this->message = $message;
        $this->emailType = $emailType;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->member as $member)
        {
            $getMember = Member::where('email',$member)->first();
            $permission = NotificationPermissions::where('member_id',$getMember->id)->first();
            switch ($this->emailType)
            {
                case 'dealPosted':
                    if(isset($permission) && $permission->email_house_tour == 1)
                    {
                        $this->dealPosted($member,$this->message);
                    }
                    break;
                case 'showingsBuyer':
                    if(isset($permission) && $permission->email_house_tour == 1)
                    {
                        $this->showingsBuyer($member,$this->message);
                    }
                    break;
                case 'makeAnOffer':
                    if(isset($permission) && $permission->email_offer_received == 1)
                    {
                        $this->makeAnOffer($member,$this->message);
                    }
                    break;
                case 'jvPartnerRequest':
                    if(isset($permission) && $permission->email_jv_partner == 1)
                    {
                        $this->jvPartnerRequest($member,$this->message);
                    }
                    break;
                case 'showingsDealer':
                    if(isset($permission) && $permission->email_house_tour == 1)
                    {
                        $this->showingsDealer($member,$this->message);
                    }
                    break;
                default:
                    if(isset($permission) && $permission->email_buy_now == 1)
                    {
                        $this->buyNow($member,$this->message);
                    }
                    break;
            }
        }
    }
}
