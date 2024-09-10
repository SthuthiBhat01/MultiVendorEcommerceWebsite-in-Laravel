<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\AdminView;
use App\Http\Controllers\Auth\SellerRegisterController;
use App\Http\Controllers\Auth\SellerLoginController;
use App\Http\Controllers\SellerView;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EmailVerification;
use App\Http\controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdditionalDetailController;
use App\Http\Controllers\NewsEventsController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Auth::routes();

Auth::routes(['verify' => true]);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';


Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send.message');
Route::get('/messages/{userId}', [MessageController::class, 'getMessages'])->name('messages.get');



//-------------------Multi-login(user,admin,seller) and registration(user,admin,seller)  Routes Starts here-----------//
Route::middleware(['web'])->group(function () {
Route::get('/adminlogin', [AdminLoginController::class, 'create'])->name('adminlogin');

Route::post('/adminlogin', [ AdminLoginController::class, 'store']);


Route::get('/adminregister', [AdminRegisterController::class, 'create'])->name('adminregister');
Route::post('/adminregister', [AdminRegisterController::class, 'store']);
});



Route::middleware(['web'])->group(function () {
Route::get('/sellerlogin', [SellerLoginController::class, 'create'])->name('sellerlogin');
Route::post('/sellerlogin', [SellerLoginController::class, 'store']);

Route::get('/sellerregister', [SellerRegisterController::class, 'create'])->name('sellerregister');
Route::post('/sellerregister', [SellerRegisterController::class, 'store']);
});


Route::middleware(['web'])->group(function () {
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

});

//-------------------------------------Multi-login and registration Routes Ends here----------------------------------//

Route::get('/listyourcompany', [HomeController::class, 'listcompany'])->name('listcompany');
Route::post('/listyourcompany', [HomeController::class, 'listcompanypost'])->name('listcompanypost');






//----------email-verification page route------------//

Route::get('/email',[EmailVerification::class,'EmailMsg']);





//-----------------email-verification page route ends here-------------//





//--------------------------    MIDDLEWARE PROTECTED ROUTES  ------------------------ //



//-----   middlewares protected  USER routes starts from here---- //


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class, 'dashboard'])->name('dashboard');
    }); 

    

 //-----------middlewares protected  admin routes starts from here---------- //

    Route::middleware(['auth', 'verified','admin'])->group(function () {

        //route to the view of admin dashboard//
       
        Route::get('/adminindex',[AdminView::class,'adminindex'])->name('adminfrontend.index');


        //routes to add category and subcategory in a admin panel//

        Route::get('/main-category',[CategoryController::class,'create'])->name('adminfrontend.main-category');
        Route::post('/main-category',[CategoryController::class,'store'])->name('adminfrontend.main-category.store');
        Route::get('/main-category/edit/{id}',[CategoryController::class,'edit'])->name('adminfrontend.edit');
        Route::post('/main-category/edit/{id}',[CategoryController::class,'update'])->name('adminfrontend.update');
        Route::post('/main-category/delete', [CategoryController::class, 'destroy'])->name('adminfrontend.main-category.delete');

       
        Route::get('/product-add/create',[ProductController::class,'create'])->name('adminfrontend.product-add');
        Route::post('/product-add/create',[ProductController::class,'store'])->name('adminfrontend.product.store');
        
        Route::get('/product-list',[ProductController::class,'index'])->name('adminfrontend.product-list');
        Route::get('/product-list/edit/{id}',[ProductController::class,'edit'])->name('adminfrontend.product-edit');
        Route::post('/product-list/edit/{id}',[ProductController::class,'update'])->name('adminfrontend.product-edit.update');
        Route::post('/product-list/delete',[ProductController::class,'destroy'])->name('adminfrontend.product.delete');

        //routes to add category and subcategory in a admin panel ends here//


        // -------------------------------------admin frontend routes starts here ---------------------------//


// add client in adminpanel //
Route::get('/user-list',[AdminView::class,'userlist'])->name('user-list');
Route::delete('/users/{id}', [AdminView::class, 'destroyuser'])->name('users.destroy');
Route::delete('/vendor/{id}',[AdminView::class,'destroyvendor'])->name('vendor.destroy');

Route::post('/add-user', [AdminView::class, 'storeUser']);
Route::get('/business-users', [AdminView::class, 'showBusinessUsers'])->name('business.users.list');
Route::post('/admin/business-clients', [AdminView::class, 'storeBusinessClient'])->name('admin.businessClients.store');

Route::get('/admin/profile', [AdminView::class, 'adminuserprofile'])->name('adminfrontend.adminprofile');
Route::put('/admin/profile/update', [AdminView::class, 'adminupdateProfile'])->name('admin.update.profile');

//---------------------------------------------------------------//

// add suppliers in admin //


Route::get('/vendor-list',[AdminView::class,'vendorlist'])->name('vendor.list');

Route::post('/vendors', [AdminView::class, 'addvendor'])->name('vendors.store');

Route::get('/vendor-profile',[AdminView::class,'vendorprofile']);



//----------------------------------------------------------------//

// add careers in adminpanel //

Route::get('admin/add-careers',[AdminView::class,'addcareers'])->name('addcareers');
Route::post('/admin/careers/store', [CareersController::class, 'storeCareer'])->name('admin.careers.store');
Route::get('admin/careers-list',[CareersController::class,'listCareers'])->name('showcareerlist');

Route::get('/admin/careers/edit/{id}', [CareersController::class, 'editCareer'])->name('admin.careers.edit');
Route::post('/admin/careers/update/{id}', [CareersController::class, 'updateCareer'])->name('admin.careers.update');
Route::delete('/admin/careers/delete/{id}', [CareersController::class, 'deleteCareer'])->name('admin.careers.delete');

// add testimonial in adminpanel //

Route::get('admin/add-testimonial',[AdminView::class,'addtestimonials'])->name('addtestimonials');
Route::post('admin/store-testimonial', [TestimonialController::class, 'storeTestimonial'])->name('storetestimonial');

Route::get('admin/testimonials', [TestimonialController::class, 'listTestimonials'])->name('listtestimonials');
Route::get('admin/testimonials/edit/{id}', [TestimonialController::class, 'editTestimonial'])->name('edittestimonial');
Route::post('admin/testimonials/update/{id}', [TestimonialController::class, 'updateTestimonial'])->name('updatetestimonial');
Route::delete('admin/testimonials/delete/{id}', [TestimonialController::class, 'deleteTestimonial'])->name('deletetestimonial');


//additional infomartion in admin panel //
Route::get('admin/add-additional-information', [AdminView::class, 'adddinfodetails'])->name('additionaladdinfo');
Route::get('admin/additional-information', [AdditionalDetailController::class, 'additionalInformation'])->name('additionalinfo');
Route::post('admin/store-additional-info', [AdditionalDetailController::class, 'storeAdditionalInfo'])->name('storeadditionalinfo');
Route::get('admin/additional-info/edit/{id}', [AdditionalDetailController::class, 'editAdditionalInfo'])->name('editadditionalinfo');
Route::post('admin/additional-info/update/{id}', [AdditionalDetailController::class, 'updateAdditionalInfo'])->name('updateadditionalinfo');
Route::delete('admin/additional-info/delete/{id}', [AdditionalDetailController::class, 'deleteAdditionalInfo'])->name('deleteadditionalinfo');


//update vendor status route
Route::post('/updateVendorStatus', [AdminView::class, 'updateVendorStatus'])->name('vendor.updateStatus');



//add news and events in admin


// Define the routes for NewsEventsController
Route::get('/admin/create-newsevents', [NewsEventsController::class, 'create'])->name('addnewsevents');
Route::post('/admin/store-newsevents', [NewsEventsController::class, 'store'])->name('news_events.store');
Route::get('/admin/newsevents-list', [NewsEventsController::class, 'index'])->name('news_events.index');
Route::get('/admin/newsevents/edit/{id}', [NewsEventsController::class, 'edit'])->name('news_events.edit');
Route::put('/admin/newsevents/update/{id}', [NewsEventsController::class, 'update'])->name('adminfrontend.updatenewsevents');
Route::delete('/admin/newsevents/delete/{id}', [NewsEventsController::class, 'destroy'])->name('news_events.destroy');

Route::get('/admin/enquiry',[AdminView::class,'enquirylist'])->name('admin.enquiry');
Route::get('/admin/enquiryview',[AdminView::class,'enquiryview'])->name('admin.enquiryview');



//route for reports
Route::get('/admin/reports', [AdminView::class, 'viewUsersCharts'])->name('admin.reports');

//route for contactform
Route::get('/contact-show',[ContactController::class,'show'])->name('adminfrontend.contacts.show');


//------------------------admin frontend routes  routes ends here----------------------------------//
        


    });






    Route::middleware(['auth', 'verified','seller','checkNewEnquiries'])->group(function () {
        Route::get('/sellerpage',[SellerView::class,'SellerPage'])->name('sellerpage');
        
    });


//---------------------------MIDDLEWARE ROUTES ENDS HERE----------------------------------- //





//----------------------------------------Users frontend  routes starts here--------------------------------------- //

Route::middleware(['auth'])->group(function () {

Route::get('/myprofile',[HomeController::class,'dashboardmyprofile'])->name('userprofile');
Route::put('/profile', [HomeController::class, 'updateProfile'])->name('profile.update');
});

Route::get('/',[HomeController::class,'indexv4']);



Route::get('/newsv2',[HomeController::class,'newsv2']);

Route::get('/termsandconditions',[HomeController::class,'termsconditions']);
Route::get('/Careers',[HomeController::class,'careeers']);

Route::get('/testimonials',[HomeController::class,'testimonials'])->name('testimonials');

Route::get('/aboutus',[HomeController::class,'aboutus']);



//Contact form 
Route::get('/contactus',[HomeController::class,'contactus'])->name('contactus');
Route::post('/contact-add',[ContactController::class,'contact_store'])->name('contact.store');



Route::get('/view-details/{productId}', [HomeController::class,'showdetails'])->name('viewDetails')->middleware('auth');


Route::get('/show-list',[HomeController::class,'showlist'])->name('productList');




Route::get('/search-products', [ProductController::class, 'searchProducts'])->name('searchProducts');

//------------------------------------------Users frontend routes ends  here----------------------------------- //














//--------------------------seller routes starts  here----------------------------------------------//
Route::get('/sellerprofile',[SellerView::class,'sellerprofile'])->name('sellerfrontend.sellerprofile')->Middleware(['auth','seller']);


Route::post('/seller/update-profile', [SellerView::class, 'updateProfile'])->name('seller.update-profile');


Route::get('/selleraddproducts',[SellerView::class,'selleraddproducts'])->name('selleraddproducts')->Middleware(['auth','seller']);;
Route::post('/selleraddproducts',[SellerView::class,'selleraddproductspost'])->name('selleraddproducts.store');
Route::get('sellerdashboardlisting',[sellerview::class,'sellerdashboardlisting'])->name('sellerlisting')->Middleware(['auth','seller']);;

Route::get('/seller/products/{product}/edit', [sellerview::class, 'edit'])->name('seller.products.edit')->Middleware(['auth','seller']);;
Route::put('/seller/products/{product}', [sellerview::class, 'update'])->name('seller.products.update');
// Route::delete('/seller/products/{id}', [sellerview::class, 'destroyproduct'])->name('seller.products.destroy');
Route::delete('/seller/products/{id}', [sellerview::class, 'destroyproduct'])->name('seller.products.destroy');


Route::get('products/{product}/offers/create', [ProductController::class, 'createoffer'])->name('offers.create')->Middleware(['auth','seller']);;
 Route::post('products/{product}/offers', [ProductController::class, 'storeoffer'])->name('offers.store');
 Route::get('seller/offers', [ProductController::class, 'showOffers'])->name('seller.offers')->Middleware(['auth','seller']);;
 Route::delete('/offers/{offer}', [ProductController::class, 'deleteOffer'])->name('offers.delete');





Route::get('/seller/reports',[sellerview::class,'viewreports'])->name('seller.report')->Middleware(['auth','seller']);;
//---------------------------------seller routes ends here----------------------------------------------//






//enquiry routes 


Route::post('/send-enquiry', [EnquiryController::class, 'store'])->name('send.enquiry');
Route::get('/enquirynotification',[EnquiryController::class,'showEnquiryNotification'])->name('notify.enquiry');

// Route for marking enquiries as seen
Route::post('/seller/enquiries/mark-seen', [EnquiryController::class, 'markAsSeen'])->name('enquiries.markAsSeen');