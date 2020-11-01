<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::name('Api.v1.')->prefix('v1')->namespace('Api\v1')->group(function () {

    Route::get('shake_hand', 'ShakeHandController@index')->name('shake_hand');

    Route::group([
        'prefix' => 'auth',
    ], function () {
        Route::post('login', 'AuthController@login')->name('login');
        Route::post('ebuddy_login', 'AuthController@eBuddyLogin')->name('ebuddy.login');
        Route::group([
            'middleware' => ['auth:api', 'client.validate'],
        ], function () {
            Route::post('logout', 'AuthController@logout')->name('logout');
        });
    });

    Route::group([
        'middleware' => ['auth:api', 'client.validate'],
    ], function () {
        Route::post('quote/illustration', 'QuotationController@illustration')->name('quote.illustration');
        Route::post('quote/view', 'QuotationController@getQuotation')->name('quote.view');
        Route::post('quote/list', 'QuotationController@quotationList')->name('quote.list');
        Route::get('quote/list', 'QuotationController@quotationList')->name('quote.list');
        Route::post('quote/riders', 'QuotationController@riders')->name('quote.riders');
        Route::post('quote/occupation_list', 'QuotationController@occupation_list')->name('quote.occupation_list');
        Route::post('quote/get_age', 'QuotationController@get_age')->name('quote.get_age');
        Route::post('pdf/export', 'PdfController@pdfGen')->name('pdf.export');
        Route::post('quote/medical_letter', 'QuotationController@getMedicalLetter')->name('quote.medi_letter');
        Route::post('quote/occ_loading', 'QuotationController@getOccupationLoading')->name('quote.occ_loading');

        //Quotation Surakshitha
        Route::post('quote_surakshitha/illustration', 'QuotationSurakshithaController@illustration')->name('quote_surakshitha.illustration');
        Route::post('quote_surakshitha/view', 'QuotationSurakshithaController@getQuotation')->name('quote_surakshitha.view');
        Route::post('quote_surakshitha/riders', 'QuotationSurakshithaController@riders')->name('quote_surakshitha.riders');

        //Quotation AdyapanaPlus
        Route::post('quote_adyapana_plus/illustration', 'QuotationAdyapanaPlusController@illustration')->name('quote_adyapana_plus.illustration');
        Route::post('quote_adyapana_plus/view', 'QuotationAdyapanaPlusController@getQuotation')->name('quote_adyapana_plus.view');
        Route::post('quote_adyapana_plus/riders', 'QuotationAdyapanaPlusController@riders')->name('quote_adyapana_plus.riders');

        //Quotation PlatinumPlus
        /*
        Route::post('quote_platinum_plus/illustration', 'QuotationPlatinumPlusController@illustration')->name('quote_platinum_plus.illustration');
        Route::post('quote_platinum_plus/view', 'QuotationPlatinumPlusController@getQuotation')->name('quote_platinum_plus.view');
        Route::post('quote_platinum_plus/riders', 'QuotationPlatinumPlusController@riders')->name('quote_platinum_plus.riders');
        */

        //config
        Route::post('conf/hospitals', 'ConfigController@GetHospitalList')->name('conf.hospitals');
        Route::get('conf/date_time', 'ConfigController@getCurrentDateTime')->name('conf.date_time');
        Route::post('conf/upload_types', 'ConfigController@GetUploadTypeList')->name('conf.upload_types');
        /* Proposal API list */
        // Get benefits - sync to proposal tables - INIT
        Route::post('proposal/get_benefits', 'ProposalController@getBenefitsByQuoteRef')->name('proposal.get_benefits');
        // Draft proposal data - Update
        Route::post('proposal/draft', 'ProposalController@draftProposalData')->name('proposal.draft');
        // Save proposal data
        Route::post('proposal/save', 'ProposalController@saveProposalData')->name('proposal.save');

        // Proposal List
        Route::get('proposal/list', 'ProposalController@proposalList')->name('proposal.list');
        Route::post('proposal/view', 'ProposalController@getProposal')->name('proposal.view');
        Route::post('proposal/add_number', 'ProposalController@savePropNumber')->name('proposal.add_number');


        //leads
        Route::post('lead/list', 'LeadController@leadList')->name('lead.list');
        Route::get('lead/list', 'LeadController@leadList')->name('lead.list');
        Route::post('lead/add', 'LeadController@AddLead')->name('lead.add');
        Route::post('lead/update', 'LeadController@UpdateLead')->name('lead.update');
        Route::post('lead/close', 'LeadController@CloseLead')->name('lead.close');
        Route::post('lead/reject', 'LeadController@RejectLead')->name('lead.reject');
        Route::post('lead/getLead', 'LeadController@getLead')->name('lead.add');
        Route::post('lead/get_lead_data', 'LeadController@getLeadExport')->name('lead.export');
        Route::post('lead/add_quote_no', 'LeadController@addQuoteDetails')->name('lead.addQuoteNo');

        /** Appointments */
        Route::get('lead/appointment', 'LeadController@appointmentList')->name('lead.appointment');
        Route::post('appointment/get_appointment', 'LeadController@getSingleAppointment')->name('appointment.get');
        Route::post('appointment/add', 'LeadController@addAppointment')->name('appointment.add');
        Route::post('appointment/update', 'LeadController@updateAppointment')->name('appointment.update');
        Route::post('appointment/get_calendar_list', 'LeadController@getCalendarAppointmentList')->name('appointment.calendar_list');
        Route::get('appointment/get_calendar_all_appointments', 'LeadController@getCalendarAllAppointmentList')->name('appointment.calendar_all_appointments');
        Route::post('appointment/get_calendar_all_appointments', 'LeadController@getCalendarAllAppointmentList')->name('appointment.calendar_all_appointments');
        Route::get('appointment/get_calendar_day_event_list', 'LeadController@eventCalendarEditList')->name('appointment.calendar_list');
        Route::post('appointment/get_calendar_day_event_list', 'LeadController@eventCalendarEditList')->name('appointment.calendar_list');

        //Workflow(image upload)
        Route::post('doc/upload_doc', 'WorkflowController@uploadDocument')->name('doc.upload_doc');
        Route::post('doc/get_upload_doc', 'WorkflowController@getUploadedDocuments')->name('doc.upload_doc');
    });


    
    Route::get('quote/fund', 'QuotationController@fund')->name('quote.fund');

    Route::post('pension_calc', 'PensionCalcController@pensionCalc')->name('pension.pension_calc');
});
