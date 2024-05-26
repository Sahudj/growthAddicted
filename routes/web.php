<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\AllCoursesController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\AffiliateController;
use App\Http\Controllers\Manager\TrainingController;
use App\Http\Controllers\Manager\PayoutsController;
use App\Http\Controllers\Manager\OffersController;
use App\Http\Controllers\Manager\CoursesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommonController;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]); 

Route::get('/signup/{token?}', [UserController::class, 'signup']);

Route::get('/about-us', [UserController::class, 'aboutUs']);
Route::get('/alpha-course', [UserController::class, 'alphaCourse']);
Route::get('/digital-skill-hub', [UserController::class, 'digitalSkillHub']);
Route::get('/personal-branding-hub', [UserController::class, 'personalBrandingHub']);
Route::get('/iconic', [UserController::class, 'iconic']);
Route::get('/contact-us', [UserController::class, 'contactUs']);
Route::get('/courses', [UserController::class, 'courses']);
Route::get('/terms-conditions', [UserController::class, 'termsCondition']);
Route::get('/privacy-policy', [UserController::class, 'privacyPolicy']);
Route::get('/disclamer', [UserController::class, 'disclamer']);
Route::get('/refund-policy', [UserController::class, 'refundPolicy']);
Route::get('/faq', [UserController::class, 'faq']);

// new routes
Route::get('/elob-courses/{id}', [UserController::class, 'eloboratedSpecificCourse'])->name('elob-courses');
// Route::post('/elob-courses', [CoursesController::class, 'eloboratedSpecificCourse'])->name('elob-courses');
Route::get('/birthday-wish', [CommonController::class, 'birthdayWish']);

Route::get('/test-email', [UserController::class, 'testEmail']);
Route::post('/login', [LoginController::class, 'login'])->middleware('checkstatus');
Route::get('/return-url-instamozo', [UserController::class, 'return_url_instamozo']);

Route::post('/get-package-data', [UserController::class, 'packageDetails']);
Route::post('/check-ref-code', [UserController::class, 'checkRefCode']);
Route::post('/order', [UserController::class, 'order']);
Route::get('/return-url/{orderId?}', [UserController::class, 'return_url']);
Route::post('/checkout', [UserController::class, 'checkout']);
Route::get('/return-url-instamozo', [UserController::class, 'return_url_instamozo']);

// PhonePay
Route::post('/return-url-phonePay', [UserController::class, 'returnUrlPhonePay']);
Route::post('/callback-url-phonePay', [UserController::class, 'callbackUrlPphonePay']);

Route::post('/upgrade-phonepay', [UserController::class, 'upgradePhonepay']);
Route::post('/callback-upgrade-phonepay', [UserController::class, 'callbackUpgradePhonePay']);

// End PhonePay

Route::post('/notify_url', [UserController::class, 'notify_url']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/upgrade-return-url/{orderId?}', [UserController::class, 'upgradeReturnUrl']);


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::get('showLinkRequestForm ', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('showLinkRequestForm ');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    /******************* Office Manager  *****************************/

    Route::group(
        [
            'prefix' => 'user',  //link url parameter
            'namespace' => 'User', //folder
            'middleware' => 'App\Http\Middleware\ManagerMiddleware'
        ], function() {
            Route::match(['get', 'post'], '/', 'App\Http\Controllers\Manager\ManagerController@index');
            Route::get('/dashboard', [ManagerController::class, 'index'])->name('index');
            Route::get('/timestamp', [ManagerController::class, 'timeData'])->name('timeData');
            Route::get('/profile', [ManagerController::class, 'updateProfile'])->name('profile');
            Route::post('/profile', [ManagerController::class, 'updateData'])->name('update-profile');
            
            Route::get('/change-password', [ManagerController::class, 'changePassword'])->name('change-password');
            Route::post('/change-password', [ManagerController::class, 'generatePasswordLink'])->name('change-password');
            
            Route::get('/bank-details', [ManagerController::class, 'bankDetails'])->name('bank-details');
            Route::post('/bank-details', [ManagerController::class, 'updateBankDetails'])->name('bank-details');

            Route::get('/affiliate', [AffiliateController::class, 'affiliate'])->name('affiliate');
            Route::post('/generate-link', [AffiliateController::class, 'generateLink'])->name('generate-link');
          
            Route::get('/training', [TrainingController::class, 'training'])->name('training');
            Route::get('/webinar', [TrainingController::class, 'webinar'])->name('webinar');
            Route::get('/session', [TrainingController::class, 'QAsession'])->name('session');
            Route::get('/support', [TrainingController::class, 'support'])->name('support');
            Route::get('/leaderboard', [TrainingController::class, 'leaderboard'])->name('leaderboard');
            Route::get('/community', [TrainingController::class, 'community'])->name('community');
            Route::get('/traffic', [TrainingController::class, 'traffic'])->name('traffic');
            Route::get('/traffic-details/{orderId}', [TrainingController::class, 'trafficDetails'])->name('traffic');

            Route::get('/payouts', [PayoutsController::class, 'payouts'])->name('payouts');
            Route::get('/offers', [OffersController::class, 'offers'])->name('offers');
            Route::get('/marketing-material', [OffersController::class, 'marketingMaterial'])->name('marketing-material');
            Route::get('/funds', [OffersController::class, 'funds'])->name('funds');
            Route::get('/courses', [CoursesController::class, 'courses'])->name('courses');
            Route::get('/generatePDF/{courseId}', [CoursesController::class, 'generatePDF'])->name('generatePDF');
            Route::post('/upgrade-courses', [CoursesController::class, 'upgradeCourses'])->name('upgrade-courses');
            
         
         
            Route::get('/my-courses/{packageId}/{folderId}/{courseName}', [CoursesController::class, 'myCourses'])->name('my-courses');
            Route::get('/view-webinar/{id}', [TrainingController::class, 'viewWebinar'])->name('view-webinar');
            Route::get('/team-helping-bonus/{type}', [ManagerController::class, 'teamHelpingBonus'])->name('team-helping-bonus');
            Route::get('/commission/{id}/{type}', [ManagerController::class, 'commission'])->name('commission');
            Route::get('addBeneficiaryDetails', [ManagerController::class, 'addBeneficiaryDetails'])->name('addBeneficiaryDetails');

            Route::get('/thankyou/{orderId}', [ManagerController::class, 'thankyou'])->name('thankyou');
            Route::post('/video-watch', [AdminController::class, 'videoWatch'])->name('video-watch');
            Route::get('/startup-video', [ManagerController::class, 'startupVideo'])->name('startup-video');
            Route::post('/contact-mail', [TrainingController::class, 'contactMail'])->name('contact-mail');

            Route::get('/change-bank-details', [ManagerController::class, 'bankForm'])->name('change-bank-details');
            Route::post('/change-bank-details', [ManagerController::class, 'sendReqChangeAccount'])->name('change-bank-details');
    });

    
    /*************************  Admin Router *****************************/

    Route::group(
    [
        'prefix' => 'admin',  //link url parameter
        'middleware' => 'App\Http\Middleware\AdminMiddleware'
    ], function() {
        Route::match(['get', 'post'], '/', 'App\Http\Controllers\Admin\AdminController@index');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
        Route::get('/profile', [AdminController::class, 'updateProfile'])->name('profile');
        Route::post('/profile', [AdminController::class, 'updateData'])->name('update-profile');

        Route::get('/user-listing', [AdminController::class, 'usersListing'])->name('user-listing');
        Route::get('/delete-user/{userId}', [AdminController::class, 'deleteUser'])->name('delete-user');
        Route::get('/add-user', [AdminController::class, 'addUserForm'])->name('add-user');
        Route::post('/add-user', [AdminController::class, 'saveUserDetails'])->name('add-user');
        Route::get('/edit-user/{userId}', [AdminController::class, 'editUser'])->name('edit-user');
        Route::post('/edit-user', [AdminController::class, 'updateUserDetails'])->name('edit-user');

        Route::get('/view/{userId}', [AdminController::class, 'viewDetails'])->name('view');
        Route::get('/team-helping-bonus/{id}', [AdminController::class, 'teamHelpingBonus'])->name('team-helping-bonus');
        Route::post('/shift-team', [AdminController::class, 'shiftTeam'])->name('shift-team');
        Route::post('/send-welcome-mail', [AdminController::class, 'sendWelcomeMail']);
        Route::resource('packages', PackageController::class);
        Route::resource('all-courses', AllCoursesController::class);
        Route::post('add-videos', [AllCoursesController::class, 'addVideos'])->name('add-videos');

        /**************************************************************************************************/
        //Second Phase
        Route::get('/admin-listing', [AdminController::class, 'adminListing'])->name('admin-listing');
        Route::get('/edit-admin-user/{userId}', [AdminController::class, 'editAdminUser'])->name('edit-admin-user');
        Route::post('/edit-admin-user', [AdminController::class, 'updateAdminUserDetails'])->name('edit-admin-user');

        /**************************************************************************************************/

        Route::get('/add-training', [AdminController::class, 'addTrainingForm'])->name('add-training');
        Route::get('/training-listing', [AdminController::class, 'trainingListing'])->name('training-listing');
        Route::post('/add-training', [AdminController::class, 'saveTrainingDetails'])->name('add-training');
        Route::get('/edit-training/{id}', [AdminController::class, 'editTrainingForm'])->name('edit-training');
        Route::post('/edit-training', [AdminController::class, 'updateTrainingDetails'])->name('edit-training');
        Route::get('/delete-training/{id}', [AdminController::class, 'destoryTraining'])->name('delete-training');

        Route::get('/add-webinar', [AdminController::class, 'addWebinarForm'])->name('add-webinar');
        Route::get('/webinar-listing', [AdminController::class, 'webinarListing'])->name('webinar-listing');
        Route::post('/add-webinar', [AdminController::class, 'saveWebinarDetails'])->name('add-webinar');
        Route::get('/edit-webinar/{id}', [AdminController::class, 'editWebinarForm'])->name('edit-training');
        Route::post('/edit-webinar', [AdminController::class, 'updateWebinarDetails'])->name('edit-webinar');
        Route::get('/delete-webinar/{id}', [AdminController::class, 'destoryWebinar'])->name('delete-webinar');
        
        Route::get('/add-session', [AdminController::class, 'addSessionForm'])->name('add-session');
        Route::get('/session-listing', [AdminController::class, 'sessionListing'])->name('session-listing');
        Route::post('/add-session', [AdminController::class, 'saveSessionDetails'])->name('add-session');
        Route::get('/edit-session/{id}', [AdminController::class, 'editSessionForm'])->name('edit-session');
        Route::post('/edit-session', [AdminController::class, 'updateSessionDetails'])->name('edit-session');
        Route::get('/delete-session/{id}', [AdminController::class, 'destorySession'])->name('delete-session');

        Route::get('/all-offers', [AdminController::class, 'offerListing'])->name('offer-listing');
        Route::get('/add-offer', [AdminController::class, 'addOfferForm'])->name('add-offer');
        Route::post('/add-offer', [AdminController::class, 'saveOfferDetails'])->name('add-offer');
        Route::get('/edit-offer/{id}', [AdminController::class, 'editOfferForm'])->name('edit-offer');
        Route::post('/edit-offer', [AdminController::class, 'updateOfferDetails'])->name('edit-offer');
        Route::get('/delete-offer/{id}', [AdminController::class, 'destoryOffer'])->name('delete-offer');

        Route::get('/all-marketing-material', [TrainingController::class,'marketingMaterialListing'])->name('all-marketing-material');
        Route::get('/add-marketing-material', [TrainingController::class, 'marketingMaterial'])->name('add-marketing-material');
        Route::post('/add-marketing-material', [TrainingController::class, 'saveMarketingMaterial'])->name('add-marketing-material');
        Route::get('/edit-marketing-material/{id}', [TrainingController::class, 'editMarketingMaterial'])->name('edit-marketing-material');
        Route::post('/edit-marketing-material', [TrainingController::class, 'updateMarketingMaterial'])->name('edit-marketing-material');
        Route::get('/delete-marketing-material/{id}', [TrainingController::class, 'deleteMarketingMaterial'])->name('delete-marketing-material');
        
        Route::post('/send-bulk-payout', [AdminController::class, 'sendBulkPayout'])->name('send-bulk-payout');

        Route::get('/setting', [AdminController::class, 'settingListing'])->name('setting');
        Route::get('/add-setting', [AdminController::class, 'setting'])->name('setting');
        Route::post('/add-setting', [AdminController::class, 'saveSetting'])->name('setting');
        Route::get('/edit-setting/{id}', [AdminController::class, 'editSetting'])->name('edit-setting');
        Route::post('/update-setting', [AdminController::class, 'updateSetting'])->name('edit-setting');
        Route::post('/delete-course', [AdminController::class, 'deleteCourse'])->name('delete-course');
        
        Route::get('/packages-price', [PackageController::class, 'packagesPrice'])->name('packages-price');
        Route::post('/update-packages-price', [PackageController::class, 'updatePackagesPrice'])->name('update-packages-price');

        Route::get('/upgrade-price', [PackageController::class, 'upgradePackages'])->name('upgrade-price');
        Route::post('/upgrade-packages-price', [PackageController::class, 'updateupgradePrice'])->name('upgrade-packages-price');
        
        Route::get('/affiliate-traffic', [AdminController::class, 'traffic'])->name('traffic');
        Route::get('/unpaid-traffic', [AdminController::class, 'unPaidTraffic'])->name('unPaidTraffic');
        Route::get('/payouts/{type}', [AdminController::class, 'affiliatePayout'])->name('payouts');
        Route::get('/view-payout/{userId}', [AdminController::class, 'viewPayoutDetails'])->name('view-payout'); 
        Route::get('/delete-payout/{affiliateId}', [AdminController::class, 'deletePayoutDetails'])->name('delete-payout');

        Route::get('/edit-payout/{affiliateId}', [AdminController::class, 'editPayoutDetails'])->name('edit-payout'); 
        Route::post('/update-payout', [AdminController::class, 'updatePayoutDetails'])->name('update-payout'); 

        Route::get('/send-payout/{userId}/{amount}', [AdminController::class, 'sendPayout'])->name('send-payout');
        Route::get('/affiliate-traffic-details/{orderId}', [AdminController::class, 'trafficDetails'])->name('traffic');
        Route::get('/members/{type}', [AdminController::class, 'members'])->name('members');
        Route::get('/refund-amount/{userId}', [AdminController::class, 'refundAmount'])->name('refund-amount');
        Route::get('/assign-sponsor/{userId}', [AdminController::class, 'assignAponsor'])->name('assign-sponsor');
        Route::post('/add-sponsor', [AdminController::class, 'addSponsor'])->name('add-sponsor');


        Route::get('/email-template-list', [AdminController::class, 'emailTemplateListing'])->name('email-template-list');  
        Route::get('/email-template', [AdminController::class, 'emailTemplate'])->name('email-template');
        Route::get('/delete-template/{tempId}', [AdminController::class, 'deleteTemplate'])->name('delete-template');
        Route::post('/save-email-template', [AdminController::class, 'saveEmailTemplate'])->name('save-email-template');

        Route::get('/send-email-users', [AdminController::class, 'sendEmailForm'])->name('send-email-users');
        Route::post('/send-email-users', [AdminController::class, 'sendEmailToUsers'])->name('send-email-users');        


        Route::get('/bank-request', [AdminController::class, 'allBankRequest'])->name('bank-request');
        Route::get('/reject-bank-request/{id}', [AdminController::class, 'rejectBankRequest'])->name('reject-bank-request');
        Route::get('/update-bank-details', [AdminController::class, 'changeBankDetails'])->name('update-bank-details');
        Route::get('/change-bank-details/{reqId}', [AdminController::class, 'updateBankDetails'])->name('update-bank-details');

        Route::get('/leaderboards/{pages?}', [TrainingController::class, 'leaderboard'])->name('leaderboard');
        Route::get('/search-order', [TrainingController::class, 'searchOrder'])->name('search-order');
        Route::get('/commissions/{type}', [AdminController::class, 'commission'])->name('commission');

        Route::get('/direct-sale/{id}', [AdminController::class, 'directSale'])->name('direct-sale');

        // Payment Setting 
        Route::get('/payment-setting', [PackageController::class, 'paymentSetting'])->name('payment-setting');
        Route::post('/payment-setting', [PackageController::class, 'savePaymentSetting'])->name('payment-setting');

    }); 


