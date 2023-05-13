<?php

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
/*--------- for manual user  ------------------*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/blog-details/{slug}', 'HomeController@blogdetails')->name('blogdetails');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/single/{slug}', 'HomeController@singlepage')->name('singlepage');
Route::post('/contactForm', 'HomeController@contactForm')->name('contactForm');
Route::get('/listservices/{slug}', 'HomeController@listservices')->name('listservices');
Route::get('/service-details/{slug}', 'HomeController@servicedetails')->name('servicedetails');
Route::get('/banner-details/{slug}', 'HomeController@bannerdetails')->name('bannerdetails');
Route::get('/exposure', 'HomeController@exposure')->name('exposure');
Route::get('/exposure-details/{slug}', 'HomeController@exposuredetails')->name('exposuredetails');
Route::get('/clients', 'HomeController@clients')->name('clients');
Route::get('/schedule', 'HomeController@schedule')->name('schedule');
Route::post('/scheduleForm', 'HomeController@scheduleForm')->name('scheduleForm');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/legislation', 'InsightController@knowledge')->name('legislation');
Route::get('/history', 'InsightController@history')->name('history');
Route::get('/inews', 'InsightController@inews')->name('inews');
Route::get('/performance', 'InsightController@performance')->name('performance');
Route::get('/snapshot', 'InsightController@snapshot')->name('sanapshot');
Route::get('/utilities', 'InsightController@utilities')->name('utilities');
Route::get('/utilitidetails/{id}', 'InsightController@utilitidetails');
Route::get('/csrInsight', 'InsightController@csrInsight')->name('csrInsight');
   
Route::group(['prefix'=>'administrator', 'namespace'=>'Admin', 'middleware'=>['web']], function(){
    
    Route::get('/', 'LoginController@index')->name('login');

    Route::get('/register', 'LoginController@register')->name('register');
    Route::post('/store', 'LoginController@store')->name('store');

    Route::get('/login', 'LoginController@index')->name('admin_login');
    Route::post('/secure/login', 'LoginController@secure_login')->name('admin_secure_login');
    Route::get('/logout', 'LoginController@logout')->name('admin.logout');
    
    Route::group(['middleware'=>'auth'], function(){
        Route::get('/dashboard', 'HomeController@index')->name('auth.dashboard');
        Route::get('/dashboardpto', 'HomeController@indexpto')->name('auth.dashboardpto');

        Route::post('leavefilter/{leaveId}', 'HomeController@leavefilter')->name('auth.leave.filter');

        Route::get('/users', 'UserController@index')->name('auth.users.index');
        Route::get('/changePassword', 'HomeController@changePassword')->name('change_passsword');
        Route::post('/changePasswordSuccessfully','HomeController@changePasswordSuccessfully')->name('changePasswordSuccessfully');        
        Route::get('/users/create', 'UserController@create')->name('auth.users.create');
        Route::post('/users/store', 'UserController@store')->name('auth.users.store');
        Route::get('/edit/{userId}', 'UserController@edit')->name('auth.users.edit');
        Route::post('/update/{userId}', 'UserController@update')->name('auth.users.update');
        Route::get('/users/delete/{userId}', 'UserController@delete')->name('auth.users.delete');
        Route::get('/users/reset/password/{userId}', 'UserController@resetPassword')->name('auth.users.reset.password');
        Route::get('/users/profile', 'UserController@profile')->name('auth.users.profile');
        Route::post('/deleteuser/{id}', 'UserController@deleteuser')->name('deleteuser');
        Route::get('/removed/users', 'UserController@removed')->name('auth.users.removed');
        Route::post('/undouser/{id}', 'UserController@undouser')->name('undouser');
        Route::get('/delete/{id}', 'UserController@permdeleteuser')->name('auth.user.delete');
        Route::post('/updatePassword/{userid}', 'UserController@updatePassword')->name('auth.user.password'); 


        /* Services Listing */
        
        Route::group(['prefix'=>'services'], function(){            
            Route::get('/', 'ServiceController@index')->name('auth.services.index');
            Route::get('/create', 'ServiceController@create')->name('auth.services.create');            
            Route::post('/store', 'ServiceController@store')->name('auth.services.store');            
            Route::get('/edit/{slug}', 'ServiceController@edit')->name('auth.services.edit');
            Route::post('/update/{slug}', 'ServiceController@update')->name('auth.services.update');
            Route::get('/delete/{id}', 'ServiceController@delete')->name('auth.services.delete');
        }); 

        /* Policies Listing */
        
        Route::group(['prefix'=>'policies'], function(){            
            Route::get('/', 'PolicyController@index')->name('auth.policies.index');
            Route::get('/create', 'PolicyController@create')->name('auth.policies.create');            
            Route::post('/store', 'PolicyController@store')->name('auth.policies.store');            
            Route::get('/edit/{slug}', 'PolicyController@edit')->name('auth.policies.edit');
            Route::post('/update/{slug}', 'PolicyController@update')->name('auth.policies.update');
            Route::get('/delete/{id}', 'PolicyController@delete')->name('auth.policies.delete');
            Route::get('/setfeature/{id}', 'PolicyController@setfeature')->name('auth.policies.setfeature');
            Route::get('/unfeature/{id}', 'PolicyController@unfeature')->name('auth.policies.unfeature');
        }); 
        
        /* Exposures Listing */
        
        Route::group(['prefix'=>'exposures'], function(){            
            Route::get('/', 'ExposureController@index')->name('auth.exposures.index');
            Route::get('/create', 'ExposureController@create')->name('auth.exposures.create');            
            Route::post('/store', 'ExposureController@store')->name('auth.exposures.store');            
            Route::get('/edit/{slug}', 'ExposureController@edit')->name('auth.exposures.edit');
            Route::post('/update/{slug}', 'ExposureController@update')->name('auth.exposures.update');
            Route::get('/delete/{id}', 'ExposureController@delete')->name('auth.exposures.delete');
        }); 
        
        /* Clients Listing */
        
        Route::group(['prefix'=>'clients'], function(){            
            Route::get('/', 'ClientController@index')->name('auth.clients.index');
            Route::get('/create', 'ClientController@create')->name('auth.clients.create');            
            Route::post('/store', 'ClientController@store')->name('auth.clients.store');            
            Route::get('/edit/{slug}', 'ClientController@edit')->name('auth.clients.edit');
            Route::post('/update/{slug}', 'ClientController@update')->name('auth.clients.update');
            Route::get('/delete/{id}', 'ClientController@delete')->name('auth.clients.delete');
        }); 


        /* Blogs Listing */
        
        Route::group(['prefix'=>'blog'], function(){            
            Route::get('/', 'BlogController@index')->name('auth.blog.index');
            Route::get('/create', 'BlogController@create')->name('auth.blog.create');            
            Route::post('/store', 'BlogController@store')->name('auth.blog.store');            
            Route::get('/edit/{slug}', 'BlogController@edit')->name('auth.blog.edit');
            Route::post('/update/{slug}', 'BlogController@update')->name('auth.blog.update');
            Route::get('/delete/{id}', 'BlogController@delete')->name('auth.blog.delete');
        });


        /* Blogs Category Listing */
        
        Route::group(['prefix'=>'blogcategory'], function(){
            Route::get('/category', 'BlogController@category')->name('auth.blogcategory.index');
            Route::get('/createcategory', 'BlogController@createcategory')->name('auth.blogcategory.create');            
            Route::post('/storecategory', 'BlogController@storecategory')->name('auth.blogcategory.store');            
            Route::get('/editcategory/{slug}', 'BlogController@editcategory')->name('auth.blogcategory.edit');
            Route::post('/updatecategory/{slug}', 'BlogController@updatecategory')->name('auth.blogcategory.update');
            Route::get('/deletecategory/{id}', 'BlogController@deletecategory')->name('auth.blogcategory.delete');
        });


        /* Blogs Tags Listing */
        
        Route::group(['prefix'=>'blogtag'], function(){
            Route::get('/tag', 'BlogController@tag')->name('auth.blogtag.index');
            Route::get('/createtag', 'BlogController@createtag')->name('auth.blogtag.create');            
            Route::post('/storetag', 'BlogController@storetag')->name('auth.blogtag.store');            
            Route::get('/edittag/{slug}', 'BlogController@edittag')->name('auth.blogtag.edit');
            Route::post('/updatetag/{slug}', 'BlogController@updatetag')->name('auth.blogtag.update');
            Route::get('/deletetag/{id}', 'BlogController@deletetag')->name('auth.blogtag.delete');
        });

         /* Faqs Listing */
        
        Route::group(['prefix'=>'faq'], function(){            
            Route::get('/', 'FaqController@index')->name('auth.faq.index');
            Route::get('/create', 'FaqController@create')->name('auth.faq.create');            
            Route::post('/store', 'FaqController@store')->name('auth.faq.store');            
            Route::get('/edit/{id}', 'FaqController@edit')->name('auth.faq.edit');
            Route::post('/update/{id}', 'FaqController@update')->name('auth.faq.update');
            Route::get('/delete/{id}', 'FaqController@delete')->name('auth.faq.delete');
        });
        
        
         /* Teams Listing */
        
        Route::group(['prefix'=>'team'], function(){            
            Route::get('/', 'TeamController@index')->name('auth.team.index');
            Route::get('/create', 'TeamController@create')->name('auth.team.create');            
            Route::post('/store', 'TeamController@store')->name('auth.team.store');            
            Route::get('/edit/{id}', 'TeamController@edit')->name('auth.team.edit');
            Route::post('/update/{id}', 'TeamController@update')->name('auth.team.update');
            Route::get('/delete/{id}', 'TeamController@delete')->name('auth.team.delete');
            Route::get('/setfeature/{id}', 'TeamController@setfeature')->name('auth.team.setfeature');
            Route::get('/unfeature/{id}', 'TeamController@unfeature')->name('auth.team.unfeature');
        });
        
        
         /* Testimonials Listing */
        
        Route::group(['prefix'=>'testimonial'], function(){            
            Route::get('/', 'TestimonialController@index')->name('auth.testimonial.index');
            Route::get('/create', 'TestimonialController@create')->name('auth.testimonial.create');            
            Route::post('/store', 'TestimonialController@store')->name('auth.testimonial.store');            
            Route::get('/edit/{id}', 'TestimonialController@edit')->name('auth.testimonial.edit');
            Route::post('/update/{id}', 'TestimonialController@update')->name('auth.testimonial.update');
            Route::get('/delete/{id}', 'TestimonialController@delete')->name('auth.testimonial.delete');
            Route::get('/setfeature/{id}', 'TestimonialController@setfeature')->name('auth.testimonial.setfeature');
            Route::get('/unfeature/{id}', 'TestimonialController@unfeature')->name('auth.testimonial.unfeature');
        });


        Route::group(['prefix'=>'Insights'], function(){

            /* Section Listing */
            
            Route::get('/', 'InsightController@indexSection')->name('auth.insightsection.index');
            Route::get('/create', 'InsightController@createSection')->name('auth.insightsection.create');            
            Route::post('/store', 'InsightController@storeSection')->name('auth.insightsection.store'); 
            Route::get('/edit/{sectionId}', 'InsightController@editSection')->name('auth.insightsection.edit'); 
            Route::post('/update/{sectionId}', 'InsightController@updateSection')->name('auth.insightsection.update');
            Route::post('/deletesection/{id}', 'InsightController@deleteSection')->name('deletesection');

            /* SubSection Listing */

            Route::get('/sub', 'InsightController@indexSubsection')->name('auth.insightsubsection.index');
            Route::get('/subcreate', 'InsightController@createSubsection')->name('auth.insightsubsection.create');            
            Route::post('/substore', 'InsightController@storeSubsection')->name('auth.insightsubsection.store'); 
            Route::get('/subedit/{subsectionId}', 'InsightController@editSubsection')->name('auth.insightsubsection.edit'); 
            Route::post('/subupdate/{subsectionId}', 'InsightController@updateSubsection')->name('auth.insightsubsection.update');
            Route::post('/subdeletesubsection/{id}', 'InsightController@deleteSubsection')->name('deletesubsection');


            /* Knowledge Listing */
            
            Route::get('/knowledge', 'InsightController@indexKnowledge')->name('auth.insightknowledge.index');
            Route::get('/knowledgecreate', 'InsightController@createKnowledge')->name('auth.insightknowledge.create');            
            Route::post('/knowledgestore', 'InsightController@storeKnowledge')->name('auth.insightknowledge.store'); 
            Route::get('/knowledgeedit/{knowledgeId}', 'InsightController@editKnowledge')->name('auth.insightknowledge.edit'); 
            Route::post('/knowledgeupdate/{knowledgeId}', 'InsightController@updateKnowledge')->name('auth.insightknowledge.update');
            Route::post('/knowledgedeletesection/{id}', 'InsightController@deleteKnowledge')->name('deleteknowledge');
            Route::post('/sections', 'InsightController@sectionsAjax')->name('auth.main.section');

        });
        
         /* CMS Pages */
        
        Route::group(['prefix'=>'cms'], function(){            
            Route::get('/home-edit', 'CmsController@edit')->name('auth.home.edit');  
            Route::post('/home-update', 'CmsController@update')->name('auth.home.update');
            
            Route::get('/about-edit', 'CmsController@editabout')->name('auth.about.edit');  
            Route::post('/about-update', 'CmsController@updateabout')->name('auth.about.update');
        });
        
        /* Contents Listing */
        
        Route::group(['prefix'=>'content'], function(){            
            Route::get('/', 'PageController@index')->name('auth.content.index');
            Route::get('/create', 'PageController@create')->name('auth.content.create');            
            Route::post('/store', 'PageController@store')->name('auth.content.store');            
            Route::get('/edit/{slug}', 'PageController@edit')->name('auth.content.edit');
            Route::post('/update/{slug}', 'PageController@update')->name('auth.content.update');
            Route::get('/delete/{id}', 'PageController@delete')->name('auth.content.delete');
        }); 


        /* leaves Listing */
        
        Route::group(['prefix'=>'leave'], function(){
            
            Route::get('/', 'LeaveController@index')->name('auth.leave.index');
            Route::get('/current', 'LeaveController@current')->name('auth.leave.current');
            Route::get('/coming', 'LeaveController@coming')->name('auth.leave.coming');
            Route::get('/next', 'LeaveController@next')->name('auth.leave.next');
            Route::get('/prev', 'LeaveController@prev')->name('auth.leave.prev');
            Route::get('/create', 'LeaveController@create')->name('auth.leave.create');            
            Route::post('/store', 'LeaveController@store')->name('auth.leave.store');            
            Route::get('/edit/{leaveId}', 'LeaveController@edit')->name('auth.leave.edit');
            Route::post('/update/{leaveId}', 'LeaveController@update')->name('auth.leave.update');
            Route::get('/delete/{leaveId}', 'LeaveController@delete')->name('auth.leave.delete');
        });
        
        /* Banners Listing */
        
        Route::group(['prefix'=>'banners'], function(){            
            Route::get('/', 'BannerController@index')->name('auth.banner.index');
            Route::get('/create', 'BannerController@create')->name('auth.banner.create');           
            Route::post('/store', 'BannerController@store')->name('auth.banner.store');            
            Route::get('/edit/{trendId}', 'BannerController@edit')->name('auth.banner.edit');
            Route::post('/update/{trendId}', 'BannerController@update')->name('auth.banner.update');
        });
        
    });
    
});