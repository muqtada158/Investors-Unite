<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Members\LenderController;
use App\Http\Controllers\Members\MemberAuthController;
use App\Http\Controllers\Members\MemberDashboardController;
use App\Http\Controllers\Members\MemberHomeController;
use App\Http\Controllers\Members\MemberMyAccountController;
use App\Http\Controllers\Members\MemberNotificationPermissionController;
use App\Http\Controllers\Members\MemberPrivateMoneyLendingController;
use App\Http\Controllers\Members\MemberShowingController;
use App\Http\Controllers\Members\MemberSubscriptionController;
use App\Http\Controllers\PackageSubscriptionController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//-------------------------------------------optimizing routes
Route::get('optimize', [HomeController::class, 'clear_caches'])->name('optimize');
Route::get('send', [MemberDashboardController::class, 'send'])->name('send');

Route::get('/send-test-email', function () {
    $user = "mdmuqtada.twg@gmail.com";
    Mail::raw('This is a test email to check mail configuration.', function ($message) use ($user) {
        $message->to($user)
                ->subject('Test Email from Laravel');
    });

    return 'Test email sent!';
});


Route::get('send-notification', [MemberShowingController::class, 'sendToAllNotification'])->name('sendToAllNotification');

//webhook for subscriptions
Route::post('/stripe/webhook', [WebhookController::class, 'handleWebhook']);

//-------------------------------------------admin routes
Auth::routes();
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    //users routes
    Route::get('users', [HomeController::class, 'users'])->name('admin.users');
    Route::get('user-detail/{member}', [HomeController::class, 'view_user'])->name('admin.view_user');
    Route::post('user-edit/{member}', [HomeController::class, 'edit_user'])->name('admin.edit_user');

    //properties routes
    Route::get('properties', [HomeController::class, 'properties'])->name('admin.properties');
    Route::get('property-step-1', [HomeController::class, 'property_step_1'])->name('admin.property_step_1');
    Route::get('property-step-2', [HomeController::class, 'property_step_2'])->name('admin.property_step_2');
    Route::get('property-step-3', [HomeController::class, 'property_step_3'])->name('admin.property_step_3');
    Route::get('property-detail', [HomeController::class, 'property_detail'])->name('admin.property_detail');

    //cms routes
    Route::get('faqs', [CMSController::class, 'faqs'])->name('admin.faqs');
    Route::get('faqs-create', [CMSController::class, 'faqs_create'])->name('admin.faqs_create');
    Route::get('faqs-edit/{faqs}', [CMSController::class, 'faqs_edit'])->name('admin.faqs_edit');
    Route::post('faqs-add-edit/{faqs?}', [CMSController::class, 'faqs_add_edit'])->name('admin.faqs_add_edit');
    Route::get('faqs-delete/{faqs}', [CMSController::class, 'faqs_delete'])->name('admin.faqs_delete');

    //packages routes
    Route::get('packages', [PackageSubscriptionController::class, 'package_listing'])->name('admin.package_listing');
    Route::get('packages-add', [PackageSubscriptionController::class, 'create_package'])->name('admin.create_package');
    Route::get('packages-edit/{package}', [PackageSubscriptionController::class, 'edit_package'])->name('admin.edit_package');
    Route::post('packages-store/{packages?}', [PackageSubscriptionController::class, 'store_package'])->name('admin.store_package');
    Route::get('packages-delete/{package}', [PackageSubscriptionController::class, 'delete_package'])->name('admin.delete_package');

    //coupons
    Route::get('coupons', [PackageSubscriptionController::class, 'coupons_listing'])->name('admin.coupons_listing');
    Route::get('coupons-add', [PackageSubscriptionController::class, 'coupons_add'])->name('admin.coupons_add');
    Route::post('coupons-store', [PackageSubscriptionController::class, 'coupons_store'])->name('admin.coupons_store');
    Route::get('coupons-edit/{couponId}', [PackageSubscriptionController::class, 'coupons_edit'])->name('admin.coupons_edit');
    Route::post('coupons-update', [PackageSubscriptionController::class, 'coupons_update'])->name('admin.coupons_update');
    Route::get('coupons-delete/{couponId}', [PackageSubscriptionController::class, 'coupons_delete'])->name('admin.coupons_delete');

    //subscription routes
    Route::get('subscription', [PackageSubscriptionController::class, 'subscription_listing'])->name('admin.subscription_listing');
    Route::get('subscription-details/{subscription}', [PackageSubscriptionController::class, 'subscription_details'])->name('admin.subscription_details');

    //onetime payments
    Route::get('one-time-payments', [HomeController::class, 'one_time_payment_listing'])->name('admin.one_time_payment_listing');
    Route::get('one-time-payments-detail/{id}', [HomeController::class, 'one_time_payment_detail'])->name('admin.one_time_payment_detail');
    Route::post('update-one-time-payments', [HomeController::class, 'update_onetime_payment'])->name('admin.update_onetime_payment');

    //subscription payments
    Route::get('subscription-payments', [HomeController::class, 'subscription_payment_listing'])->name('admin.subscription_payment_listing');
    Route::get('subscription-payments-detail/{id}', [HomeController::class, 'subscription_payment_detail'])->name('admin.subscription_payment_detail');


    //contact routes
    Route::get('contact', [HomeController::class, 'contactus'])->name('admin.contactus');
    Route::get('contact-details/{id}', [HomeController::class, 'contact_us_details'])->name('admin.contact_us_details');
    Route::get('contact-details-delete/{id}', [HomeController::class, 'contact_us_details_delete'])->name('admin.contact_us_details_delete');

});




//-------------------------------------------members routes


Route::middleware(['member.auth'])->group(function () {
    //login
    Route::get('/member-login',[MemberAuthController::class,'showMemberLoginForm'])->name('member.login-view');
    Route::post('/member',[MemberAuthController::class,'memberLogin'])->name('member.login');

    //register
    Route::post('/member/register',[MemberAuthController::class,'createMember'])->name('member.register');

    //register money lender
    Route::get('/signup-money-lender',[MemberAuthController::class,'signup_money_lender'])->name('member.signup_money_lender');
    Route::post('/signup-money-lender-store',[MemberAuthController::class,'register_money_lender'])->name('member.register_money_lender');
});


// Route::get('/member/register',[MemberAuthController::class,'showMemberRegisterForm'])->name('member.register-view');

//outer routes
    Route::get('/', [MemberHomeController::class, 'index'])->name('index');
    //filter routes of homepage
    Route::post('/', [MemberHomeController::class, 'filterIndex'])->name('filterIndex');
    Route::post('search', [MemberHomeController::class, 'searchIndex'])->name('searchIndex');
    Route::post('/sort', [MemberHomeController::class, 'sortbyIndex'])->name('sortbyIndex');


    Route::get('contact-us', [MemberHomeController::class, 'contact_us'])->name('contact_us');
    Route::post('send-contact', [MemberHomeController::class, 'send_contact'])->name('send_contact');

    Route::get('property-detail/{properties}', [MemberHomeController::class, 'property_detail'])->name('property_detail');


//authenticated routes for normal user after login
Route::middleware(['auth:member'])->group(function () {
        //my account routes
        Route::get('my-profile', [MemberMyAccountController::class, 'my_profile'])->name('my_profile');
        Route::post('my-profile-edit', [MemberMyAccountController::class, 'my_profile_edit'])->name('my_profile_edit');
        Route::get('support', [MemberMyAccountController::class, 'support'])->name('support');
        Route::get('card-details', [MemberMyAccountController::class, 'card_details'])->name('card_details');
        // Route::get('direct-message', [MemberMyAccountController::class, 'direct_message'])->name('direct_message');

        //subscriptions
        Route::get('subscriptions', [MemberSubscriptionController::class, 'subscriptions'])->name('subscription');
        Route::get('subscriptions-form/{id}', [MemberSubscriptionController::class, 'subscriptionForm'])->name('subscriptionForm');
        Route::post('validate-coupon', [MemberSubscriptionController::class, 'validateCoupon'])->name('validateCoupon');
        Route::get('cancel-subscriptions', [MemberSubscriptionController::class, 'cancelSubscription'])->name('cancelSubscription');
        Route::post('store-subscription', [MemberSubscriptionController::class, 'store_subscription'])->name('store_subscription');

        //invoice
        Route::get('my-invoices', [MemberSubscriptionController::class, 'getCustomerInvoices'])->name('getCustomerInvoices');

        //notifications
        Route::get('notifications', [MemberMyAccountController::class, 'notifications'])->name('notifications');

        //remaining routes
        Route::get('jv-partners-request', [MemberHomeController::class, 'jv_partners_request'])->name('jv_partners_request');
        Route::get('saved-deals-create/{property_id}', [MemberHomeController::class, 'saved_deals_create'])->name('saved_deals_create');
        Route::get('saved-deals-remove/{property_id}', [MemberHomeController::class, 'saved_deals_remove'])->name('saved_deals_remove');
        Route::get('my-offers', [MemberHomeController::class, 'my_offers'])->name('my_offers');
        Route::get('saved-deals', [MemberHomeController::class, 'saved_deals'])->name('saved_deals');

        //offer and buynow routes for property detail page
        Route::post('offer-received-post', [MemberHomeController::class, 'buyer_make_an_offer'])->name('buyer_make_an_offer')->middleware('complete.profile');

        //inventory routes
        Route::get('inventory', [MemberHomeController::class, 'inventory'])->name('inventory');
        Route::post('inventory-filter', [MemberHomeController::class, 'filter_inventory'])->name('filter_inventory');

        //Jv partners
        Route::post('store-jv-partner', [MemberHomeController::class, 'store_jv_partner'])->name('store_jv_partner')->middleware('complete.profile');

        //showings
        Route::post('store-showings', [MemberShowingController::class, 'store_showing'])->name('store_showing')->middleware('complete.profile');

        //notifications
        Route::post('store-device-token', [MemberAuthController::class, 'storeDeviceToken'])->name('storeDeviceToken');

        //Permissions for notification
        Route::get('validate-member', [MemberNotificationPermissionController::class, 'validate_member'])->name('validate_member');
        Route::post('update-permission', [MemberNotificationPermissionController::class, 'store_permission'])->name('store_permission');
        Route::get('subscription-status', [MemberNotificationPermissionController::class, 'subscription_status'])->name('subscription_status');

        //Payment History
        Route::get('payment-history', [MemberMyAccountController::class, 'payment_history'])->name('payment_history');



    //for buyer routes
    // Route::middleware(['buyer'])->group(function () {
    // });

    // //for seller routes
    // Route::middleware(['seller'])->group(function () {

    // });

    //for property dealer routes After buying Subscription
    Route::middleware(['property.dealer'])->group(function () {
        Route::get('dashboard', [MemberDashboardController::class, 'index'])->name('dashboard.dashboard');

        //buyers
        Route::get('buyers', [MemberDashboardController::class, 'buyers'])->name('dashboard.buyers');
        Route::get('buyers-detail/{member}', [MemberDashboardController::class, 'buyers_detail'])->name('dashboard.buyers_detail');

        //properties
        Route::get('property', [MemberDashboardController::class, 'property_listing'])->name('dashboard.property_listing');
        Route::get('property-step-1', [MemberDashboardController::class, 'property_step_1'])->name('dashboard.property_step_1');
        Route::post('property-step-1-create', [MemberDashboardController::class, 'property_step_1_create_edit'])->name('dashboard.property_step_1_create_edit');
        Route::get('property-step-2', [MemberDashboardController::class, 'property_step_2'])->name('dashboard.property_step_2');
        Route::post('property-step-2-create', [MemberDashboardController::class, 'property_step_2_create_edit'])->name('dashboard.property_step_2_create_edit');
        Route::get('property-step-3', [MemberDashboardController::class, 'property_step_3'])->name('dashboard.property_step_3');
        Route::post('property-final-step-create-edit/{property?}', [MemberDashboardController::class, 'property_detail_add_edit'])->name('dashboard.property_detail_add_edit')->middleware('complete.profile');
        Route::get('property-detail-create', [MemberDashboardController::class, 'property_detail'])->name('dashboard.property_detail');
        Route::get('property-detail-edit/{property}', [MemberDashboardController::class, 'property_detail_edit'])->name('dashboard.property_detail_edit');
        Route::get('property-image/{images}', [MemberDashboardController::class, 'delete_property_image'])->name('dashboard.delete_property_image');
        Route::get('property-delete/{property}', [MemberDashboardController::class, 'delete_property'])->name('dashboard.delete_property');

        //saved deals
        Route::get('my-saved-deals', [MemberDashboardController::class, 'saved_deals'])->name('dashboard.saved_deals');
        Route::get('delete-saved-deals/{saved_deal}', [MemberDashboardController::class, 'delete_saved_deals'])->name('dashboard.delete_saved_deals');

        //offer received
        Route::get('offer-received', [MemberDashboardController::class, 'offers_recevied'])->name('dashboard.offers_recevied');
        Route::get('offer-received-detail/{id}', [MemberDashboardController::class, 'offers_received_specific_property'])->name('dashboard.offers_received_detail');
        Route::get('offer-buynow-detail/{id}', [MemberDashboardController::class, 'offers_buynow_specific_property'])->name('dashboard.offers_buynow_specific_property');
        Route::get('accept-offer/{offer}', [MemberDashboardController::class, 'accept_offer'])->name('dashboard.accept_offer');

        //inventory
        Route::get('my-inventory', [MemberDashboardController::class, 'inventory'])->name('dashboard.inventory');

        //jv partners
        Route::get('my-jv-partners', [MemberDashboardController::class, 'my_jv_partner'])->name('dashboard.my_jv_partner');
        Route::get('my-jv-partners-details/{id}', [MemberDashboardController::class, 'my_jv_partner_detail'])->name('dashboard.my_jv_partner_detail');
        Route::get('accepted-jv-partner/{id}', [MemberDashboardController::class, 'my_jv_partner_detail_accepted'])->name('dashboard.my_jv_partner_detail_accepted');
        Route::get('accept-jv-partner-request/{id}', [MemberDashboardController::class, 'accept_jv_request'])->name('dashboard.accept_jv_request');

        //myshowings
        Route::get('my-showings', [MemberShowingController::class, 'listing_showing'])->name('dashboard.listing_showing');
        Route::get('my-showings-detail/{id}', [MemberShowingController::class, 'showingDetail'])->name('dashboard.showingDetail');
        Route::post('my-showings-confirm/{showings}', [MemberShowingController::class, 'confirmShowingData'])->name('dashboard.confirmShowingData');

        //skiptracing
        Route::get('skip-tracing', [MemberDashboardController::class, 'skip_tracing'])->name('dashboard.skip_tracing');


    });


    //search money lenders
    Route::post('search-money-lenders', [LenderController::class, 'lender_search'])->name('lender_search');

    //private money lenders
    Route::get('find-funding-today', [MemberPrivateMoneyLendingController::class, 'find_funding_today'])->name('find_funding_today');

    //one time payment
    Route::get('one-time-payment', [MemberPrivateMoneyLendingController::class, 'one_time_payment'])->name('one_time_payment');
    Route::post('process-one-time-payment', [MemberPrivateMoneyLendingController::class, 'process_one_time_payment_ajax'])->name('process_one_time_payment_ajax');

    //lender notebook
    Route::get('lender-notebook', [LenderController::class, 'lender_notebook'])->name('lender_notebook');
    Route::get('delete-lender-notebook/{lender_notes}', [LenderController::class, 'delete_note'])->name('delete_note');
    Route::post('get-edit-lender-notebook', [LenderController::class, 'get_edit_data'])->name('get_edit_data');
    Route::post('lender-notebook/{lender_notes?}', [LenderController::class, 'add_edit_lender_notes'])->name('add_edit_lender_notes');

    //lender details
    Route::get('lender-details', [LenderController::class, 'lender_details'])->name('lender_details');
    Route::post('lender-details-update', [LenderController::class, 'lender_details_update'])->name('lender_details_update');



});


    //webhook for stripe subscriptions
