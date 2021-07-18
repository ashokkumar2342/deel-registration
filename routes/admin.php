<?php

use App\Http\Controllers\Admin\reportGenerateBarcode;

Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login'); 
Route::post('login', 'Auth\LoginController@login')->name('admin.login');
Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout.get');

Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard'); 



	Route::get('show-details', 'DashboardController@showStudentDetails')->name('admin.student.show.details');
	Route::get('registration-show-details', 'DashboardController@showStudentRegistrationDetails')->name('admin.student.Registration.details');
	Route::get('token', 'DashboardController@passportTokenCreate')->name('admin.token');
	Route::get('profile', 'DashboardController@proFile')->name('admin.profile');
	Route::get('profile-show', 'DashboardController@proFileShow')->name('admin.profile.show');
	Route::get('profile-show/{profile_pic}', 'DashboardController@proFilePhotoShow')->name('admin.profile.photo.show'); 
	Route::post('profile-update', 'DashboardController@profileUpdate')->name('admin.profile.update');
	Route::post('password-change', 'DashboardController@passwordChange')->name('admin.password.change');
	Route::get('profile-photo', 'DashboardController@profilePhoto')->name('admin.profile.photo');
	Route::post('upload-photo', 'DashboardController@profilePhotoUpload')->name('admin.profile.photo.upload');
	Route::get('photo-refrash', 'DashboardController@profilePhotoRefrash')->name('admin.profile.photo.refrash');
	//---------------account-----------------------------------------	
	Route::prefix('account')->group(function () {
	    Route::get('form', 'AccountController@form')->name('admin.account.form');
	    Route::post('store', 'AccountController@store')->name('admin.account.post');
	    Route::get('list', 'AccountController@index')->name('admin.account.list');
		Route::get('list-user-generate', 'AccountController@listUserGenerate')->name('admin.account.list.user.generate');
		Route::get('status/{account}', 'AccountController@status')->name('admin.account.status');	 
		Route::get('edit/{account}', 'AccountController@edit')->name('admin.account.edit');
		Route::post('update/{account}', 'AccountController@update')->name('admin.account.edit.post');
		Route::get('delete/{account}', 'AccountController@destroy')->name('admin.account.delete');
		Route::get('DistrictsAssign', 'AccountController@DistrictsAssign')->name('admin.account.DistrictsAssign'); 
		Route::get('StateDistrictsSelect', 'AccountController@StateDistrictsSelect')->name('admin.account.StateDistrictsSelect'); 
		Route::get('stateWiseDistrict', 'AccountController@stateWiseDistrict')->name('admin.Master.stateWiseDistrict');   
	    Route::post('DistrictsAssignStore', 'AccountController@DistrictsAssignStore')->name('admin.Master.DistrictsAssignStore');
		Route::get('DistrictsAssignDelete/{id}', 'AccountController@DistrictsAssignDelete')->name('admin.Master.DistrictsAssignDelete');
		Route::get('BlockAssign', 'AccountController@BlockAssign')->name('admin.account.BlockAssign'); 
		Route::get('DistrictBlockAssign', 'AccountController@DistrictBlockAssign')->name('admin.account.DistrictBlockAssign');
		Route::get('DistrictWiseBlock/{print_condition?}', 'AccountController@DistrictWiseBlock')->name('admin.Master.DistrictWiseBlock');
	    Route::post('DistrictBlockAssignStore', 'AccountController@DistrictBlockAssignStore')->name('admin.Master.DistrictBlockAssignStore');
		Route::get('DistrictBlockAssignDelete/{id}', 'AccountController@DistrictBlockAssignDelete')->name('admin.Master.DistrictBlockAssignDelete');
  		Route::get('VillageAssign', 'AccountController@VillageAssign')->name('admin.account.VillageAssign'); 
		Route::get('DistrictBlockVillageAssign', 'AccountController@DistrictBlockVillageAssign')->name('admin.account.DistrictBlockVillageAssign'); 
		Route::get('BlockWiseVillage', 'AccountController@BlockWiseVillage')->name('admin.Master.BlockWiseVillage');
 		Route::post('DistrictBlockVillageAssignStore', 'AccountController@DistrictBlockVillageAssignStore')->name('admin.Master.DistrictBlockVillageAssignStore');
		Route::get('DistrictBlockVillageAssignDelete/{id}', 'AccountController@DistrictBlockVillageAssignDelete')->name('admin.Master.DistrictBlockVillageAssignDelete');
		Route::get('role', 'AccountController@RolePermission')->name('admin.account.role.permission');	
		Route::get('role-menu', 'AccountController@roleMenuTable')->name('admin.account.roleMenuTable'); 
		Route::post('default-user-role-report-generate/{id}', 'AccountController@defaultUserRolrReportGenerate')->name('admin.account.default.user.role.report.generate'); 
		Route::post('role-menu-store', 'AccountController@roleMenuStore')->name('admin.roleAccess.subMenu');
		Route::get('role-quick-menu-view', 'AccountController@quickView')->name('admin.roleAccess.quick.view');
		Route::get('defult-role-menu-show', 'AccountController@defultRoleQuickLinks')->name('admin.account.role.quick_menu');
		Route::post('default-user-role-report-generate/{id}', 'AccountController@quickLinkRoleReportGenerate')->name('admin.account.default.user.role.report.quickLinkPdf'); 
		Route::post('default-role-quick-menu-store', 'AccountController@defaultRoleQuickStore')->name('admin.roleAccess.quick.role.menu.store');
		
		



		

		Route::get('access', 'AccountController@access')->name('admin.account.access');
		Route::get('hot-menu', 'AccountController@accessHotMenu')->name('admin.account.access.hotmenu');
		Route::get('menuTable', 'AccountController@menuTable')->name('admin.account.menuTable');
		Route::get('access/hotmenu', 'AccountController@accessHotMenuShow')->name('admin.account.access.hotmenuTable');
		Route::post('access-store', 'AccountController@accessStore')->name('admin.userAccess.add');
		Route::post('access-hot-menu-store', 'AccountController@accessHotMenuStore')->name('admin.userAccess.hotMenuAdd');
		Route::get('r--status/{account}', 'AccountController@rstatus')->name('admin.account.r_status');	 
		Route::get('w-status/{account}', 'AccountController@wstatus')->name('admin.account.w_status');	 
		Route::get('d-status/{account}', 'AccountController@dstatus')->name('admin.account.d_status');
		Route::get('minu/{account}', 'AccountController@minu')->name('admin.account.minu');				
		Route::get('class-access', 'AccountController@classAccess')->name('admin.account.classAccess');

		 

		 
		 



		Route::get('reset-password', 'AccountController@resetPassWord')->name('admin.account.reset.password'); 
		Route::post('reset-password-change', 'AccountController@resetPassWordChange')->name('admin.account.reset.password.change'); 
		Route::get('menu-ordering', 'AccountController@menuOrdering')->name('admin.account.menu.ordering'); 
		Route::get('menu-ordering-store', 'AccountController@menuOrderingStore')->name('admin.account.menu.ordering.store'); 
		Route::get('submenu-ordering-store', 'AccountController@subMenuOrderingStore')->name('admin.account.submenu.ordering.store'); 
		Route::get('menu-filter/{id}', 'AccountController@menuFilter')->name('admin.account.menu.filte'); 
		Route::post('menu-report', 'AccountController@menuReport')->name('admin.account.menu.report'); 
		Route::get('user-menu-assign-report/{id}', 'AccountController@defaultUserMenuAssignReport')->name('admin.account.user.menu.assign.report'); 
		Route::get('class-user-assign-report-generate/{user_id}', 'AccountController@ClassUserAssignReportGenerate')->name('admin.account.class.user.assign.report.generate'); 
		
						
		// Route::get('status/{minu}', 'AccountController@minustatus')->name('admin.minu.status'); 
	});


	Route::group(['prefix' => 'Master'], function() {
    	Route::get('DistrictWiseTehsil/{print_condition?}', 'MasterController@DistrictWiseTehsil')->name('admin.Master.DistrictWiseTehsil');
	    
    	//-states-//
	    Route::get('/', 'MasterController@showStates')->name('admin.Master.states');	   
	    Route::post('Store/{id?}', 'MasterController@storeState')->name('admin.Master.storeState');	   
	    Route::get('Edit{id}', 'MasterController@editState')->name('admin.Master.editState');
	    Route::get('Delete{id}', 'MasterController@deleteState')->name('admin.Master.deleteState');
        //-districts-//
	    Route::get('Districts', 'MasterController@districts')->name('admin.Master.districts');	
	    Route::get('DistrictsTable', 'MasterController@DistrictsTable')->name('admin.Master.DistrictsTable');
	    Route::get('Districts-Edit/{id}', 'MasterController@districtsEdit')->name('admin.Master.districtsEdit');
	    Route::post('Districts-Store{id?}', 'MasterController@districtsStore')->name('admin.Master.districtsStore');  
	    Route::get('Districts-delete/{id}', 'MasterController@districtsDelete')->name('admin.Master.districtsDelete');
	    //-block-mcs-//
	    Route::get('BlockMCS', 'MasterController@BlockMCS')->name('admin.Master.blockmcs');
	    Route::get('BlockMCSTable', 'MasterController@BlockMCSTable')->name('admin.Master.BlockMCSTable');
	    Route::post('BlockMCSStore{id?}', 'MasterController@BlockMCSStore')->name('admin.Master.BlockMCSStore');	   
	    Route::get('BlockMCSEdit/{id}', 'MasterController@BlockMCSEdit')->name('admin.Master.BlockMCSEdit');
	    Route::get('BlockMCSDelete/{id}', 'MasterController@BlockMCSDelete')->name('admin.Master.BlockMCSDelete');
	    
	    //Tehsils --------
	    Route::get('tahsil', 'MasterController@tahsil')->name('admin.Master.tehsils');
	    Route::get('tahsilTable', 'MasterController@tahsilTable')->name('admin.Master.tahsilTable'); 
	    Route::post('tahsil-store{id?}', 'MasterController@tahsilStore')->name('admin.Master.tahsil.store');
	    Route::get('TehsilEdit/{id}', 'MasterController@TehsilEdit')->name('admin.Master.TehsilEdit');
	    Route::get('TehsilDelete/{id}', 'MasterController@TehsilDelete')->name('admin.Master.TehsilDelete');

	    //-village--//
	    Route::get('village', 'MasterController@village')->name('admin.Master.village');
	    Route::get('villageTable', 'MasterController@villageTable')->name('admin.Master.villageTable');
	    Route::post('village-store{id?}', 'MasterController@villageStore')->name('admin.Master.village.store');	   
	    Route::get('village-edit/{id}', 'MasterController@villageEdit')->name('admin.Master.village.edit');
	    Route::get('village-delete/{id}', 'MasterController@villageDelete')->name('admin.Master.village.delete');
	    
	    // Route::post('villageUpdate/{id}', 'MasterController@villageUpdate')->name('admin.Master.village.villageUpdate'); 
	    Route::get('resolution-detail', 'MasterController@resolutionDetail')->name('admin.Master.resolution.detail');
	    Route::post('resolution-detail-store/{id?}', 'MasterController@resolutionDetailStore')->name('admin.Master.resolution.detail.store');
	    Route::get('resolution-detail-table-show', 'MasterController@resolutionDetailTableShow')->name('admin.Master.resolution.table.show');
	    Route::get('resolution-detail-edit/{id}', 'MasterController@resolutionDetailEdit')->name('admin.Master.resolution.edit');
	    Route::get('resolution-detail-delete/{id}', 'MasterController@resolutionDetailDelete')->name('admin.Master.resolution.delete');

	    Route::get('gram-sachiv-detail', 'MasterController@gramSachivDetail')->name('admin.Master.gram.sachiv.detail');
	    Route::post('gram-sachiv-detail-store/{id?}', 'MasterController@gramSachivDetailStore')->name('admin.Master.gram.sachiv.detail.store');
	    Route::get('gram-sachiv-detail-table-show', 'MasterController@gramSachivDetailTableShow')->name('admin.Master.gram.sachiv.detail.table.show');
	    Route::get('gram-sachiv-detail-edit/{id}', 'MasterController@gramSachivDetailEdit')->name('admin.Master.gram.sachiv.detail.edit');
	    Route::get('gram-sachiv-detail-delete/{id}', 'MasterController@gramSachivDetailDelete')->name('admin.Master.gram.sachiv.detail.delete');

	    Route::get('village-party-detail', 'MasterController@villagePartyDetail')->name('admin.Master.village.party.detail');
	    Route::get('village-party-wise-form', 'MasterController@villagePartyWiseForm')->name('admin.Master.village.party.wise.form');
	    Route::get('village-party-wise-table', 'MasterController@villagePartyWiseTable')->name('admin.Master.village.party.wise.table');
	    Route::post('village-party-detail-store/{id?}', 'MasterController@villagePartyDetailStore')->name('admin.Master.village.party.detail.store');
	    Route::get('village-party-detail-edit/{id?}', 'MasterController@villagePartyDetailEdit')->name('admin.Master.village.party.detail.edit');
	    Route::get('village-party-detail-delete/{id?}', 'MasterController@villagePartyDetailDelete')->name('admin.Master.village.party.detail.delete');
	    
	    
	    
	    
	    
		});


    Route::group(['prefix' => 'deed-registration'], function() {
        Route::get('property-detail-show', 'DeedRegistrationController@propertyDetailShow')->name('admin.deed.property.detail.show');
        Route::post('property-detail-show-post', 'DeedRegistrationController@propertyDetailShowPost')->name('admin.deed.property.detail.show.post');
        Route::get('property-detail-delete/{id}', 'DeedRegistrationController@propertyDetailDelete')->name('admin.deed.property.detail.delete');
        Route::get('/', 'DeedRegistrationController@propertyDetail_entry')->name('admin.deed.registration.index');
        Route::post('show', 'DeedRegistrationController@show_propertyDetail')->name('admin.deed.registration.show_PropertyDetail'); 
        Route::post('property-detail-store', 'DeedRegistrationController@deedPropertyDetailStore')->name('admin.deed.propertydetail.store');
        Route::get('enter-party-detail', 'DeedRegistrationController@enterPartyDetail')->name('admin.deed.registration.enter.party.detail');
        Route::post('enter-party-detail-show', 'DeedRegistrationController@enterPartyDetailShow')->name('admin.deed.registration.enter.party.detail.show');
        Route::get('enter-party-detail-save/{id}', 'DeedRegistrationController@enterPartyDetailSave')->name('admin.deed.registration.enter.party.detail.save');
        Route::post('enter-party-detail-store', 'DeedRegistrationController@enterPartyDetailStore')->name('admin.deed.registration.enter.party.detail.store');
        
        Route::get('deed-finalize', 'DeedRegistrationController@deedFinalize')->name('admin.deed.registration.deed.finalize');
        Route::get('deed-finalize-show', 'DeedRegistrationController@deedFinalizeShow')->name('admin.deed.registration.deed.finalize.show');
        Route::post('deed-finalize-store', 'DeedRegistrationController@deedFinalizeStore')->name('admin.deed.registration.deed.finalize.store');


        Route::get('deed-download', 'DeedRegistrationController@deedDownload')->name('admin.deed.registration.deed.download');
        Route::post('deed-download-show', 'DeedRegistrationController@deedDownloadShow')->name('admin.deed.registration.deed.download.show');
        Route::get('deed-download-pdf/{path}', 'DeedRegistrationController@deedDownloadPdf')->name('admin.deed.registration.deed.download.pdf');
        Route::get('enter-registry-no', 'DeedRegistrationController@enterRegistryNo')->name('admin.deed.enter.enter.registry.no');
        Route::post('enter-registry-no-save', 'DeedRegistrationController@enterRegistryNoSave')->name('admin.deed.enter.enter.registry.no.save');
        Route::get('upload-scan-deed', 'DeedRegistrationController@uploadScanDeed')->name('admin.deed.upload.scan.deed');
        Route::post('upload-scan-deed-store', 'DeedRegistrationController@uploadScanDeedStore')->name('admin.deed.upload.scan.deed.store');
           
           
	 	 
    });
	
	Route::group(['prefix' => 'property-details'], function() {
       Route::get('photo-capture', 'PropertyDetailsController@photoCapture')->name('admin.property.photo.capture');
       Route::get('photo-capture-view', 'PropertyDetailsController@photoCaptureView')->name('admin.property.photo.capture.view');
       Route::post('photo-capture-store', 'PropertyDetailsController@photoCaptureStore')->name('admin.property.photo.capture.store');
       
       Route::get('/', 'PropertyDetailsController@index')->name('admin.property.details.index');
       Route::post('store', 'PropertyDetailsController@store')->name('admin.property.details.store');
       Route::get('photo-capture-display/{path}', 'PropertyDetailsController@photoCaptureDisplay')->name('admin.property.photo.capture.display');
           
	 	 
    });
	Route::prefix('report')->group(function () {
		    Route::get('status', 'ReportController@status')->name('admin.report.status');
		    Route::post('status-show', 'ReportController@statusShow')->name('admin.report.status.show');
		    Route::get('status-delete/{id}{status}', 'ReportController@statusDelete')->name('admin.report.status.delete');
		     
		});
	 
		//---------------minu-----------------------------------------	
	Route::prefix('minu')->group(function () {
	    
		Route::get('status/{minu}', 'MinuController@status')->name('admin.minu.status');	 
		Route::get('r--status/{minu}', 'MinuController@rstatus')->name('admin.minu.r_status');	 
		Route::get('w-status/{minu}', 'MinuController@wstatus')->name('admin.minu.w_status');	 
		Route::get('d-status/{minu}', 'MinuController@dstatus')->name('admin.minu.d_status');
		Route::get('minu/{minu}', 'MinuController@minu')->name('admin.minu.minu');
		Route::post('menu-permission-check', 'MinuController@menuPermissionCheck')->name('admin.account.menu.permission.check'); 	 
		});
	 
	 // 

    
     

      
    Route::group(['prefix' => 'Report'], function() {
           Route::get('PrintVoterList', 'ReportController@PrintVoterList')->name('admin.report.PrintVoterList');
           Route::post('PrintVoterListGenerate', 'ReportController@PrintVoterListGenerate')->name('admin.report.PrintVoterListGenerate');

           Route::get('Report', 'ReportController@Report')->name('admin.report.Report');
           Route::get('ReportGenerateExcel', 'ReportController@ReportGenerateExcel')->name('admin.report.ReportGenerate');
           Route::get('ReportGeneratePDF', 'ReportController@ReportGeneratePDF')->name('admin.report.ReportGeneratePDF');
		//----card-----print-----------card----print-----------card-print-----           
           Route::get('voterCardPrint', 'ReportController@voterCardPrint')->name('admin.report.voterCardPrint');
           Route::get('voterCardPrintGenerate', 'ReportController@cameraTesting')->name('admin.camera.test');
	 	 
    	});
    Route::group(['prefix' => 'property-details'], function() {
           Route::get('/', 'PropertyDetailsController@index')->name('admin.property.details.index');
           
	 	 
    });
          
     
 });



Route::get('/', 'Auth\LoginController@index')->name('admin.home');
Route::get('search-voter', 'Auth\LoginController@searchVoter')->name('admin.search.voter'); 
Route::get('search-voter-form/{id}', 'Auth\LoginController@searchVoterform')->name('admin.search.voter.form'); 
Route::get('search-dis-block', 'Auth\LoginController@searchDisBlock')->name('admin.search.dis.block'); 
Route::get('search-block-village', 'Auth\LoginController@searchBlockVillage')->name('admin.search.block.village'); 
Route::post('search-voter-filter/{id}', 'Auth\LoginController@searchVoterFilter')->name('admin.search.voter.folter'); 

Route::get('admin-password/reset', 'Auth\ForgetPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('passwordreset/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

Route::get('forget-password', 'Auth\LoginController@forgetPassword')->name('admin.forget.password');
Route::post('forget-password-send-link', 'Auth\LoginController@forgetPasswordSendLink')->name('admin.forget.password.send.link');
Route::post('reset-password', 'Auth\LoginController@resetPassword')->name('admin.reset.password');
Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha')->name('admin.refresh.captcha');

