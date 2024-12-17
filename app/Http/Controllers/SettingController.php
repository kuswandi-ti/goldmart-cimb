<?php

namespace App\Http\Controllers\Admin;

use App\Models\SettingSystem;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminSettingFeeUpdateRequest;
use App\Http\Requests\Admin\AdminSettingOtherUpdateRequest;
use App\Http\Requests\Admin\AdminSettingGeneralUpdateRequest;
use App\Http\Requests\Admin\AdminSettingTransactionUpdateRequest;

class SettingController extends Controller
{
    use FileUploadTrait;

    function __construct()
    {
        $this->middleware('permission:system setting', ['only' => ['index', 'generalSettingUpdate', 'feeSettingUpdate']]);
    }

    public function index()
    {
        return view('admin.setting.index');
    }

    public function generalSettingUpdate(AdminSettingGeneralUpdateRequest $request)
    {
        foreach ($request->only('company_name', 'site_title', 'company_phone', 'company_email', 'company_address') as $key => $value) {
            SettingSystem::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'updated_by' => auth()->user()->name],
            );
        }

        if ($request->hasFile('image_company_logo')) {
            $imagePath = $this->handleImageUpload($request, 'image_company_logo', $request->old_image_company_logo, 'company_logo');
            SettingSystem::updateOrCreate(
                ['key' => 'company_logo'],
                ['value' => $imagePath, 'updated_by' => auth()->user()->name],
            );
        }

        if ($request->hasFile('image_company_logo_desktop')) {
            $imagePath = $this->handleImageUpload($request, 'image_company_logo_desktop', $request->old_image_company_logo_desktop, 'company_logo');
            SettingSystem::updateOrCreate(
                ['key' => 'company_logo_desktop'],
                ['value' => $imagePath, 'updated_by' => auth()->user()->name],
            );
        }

        if ($request->hasFile('image_company_logo_toggle')) {
            $imagePath = $this->handleImageUpload($request, 'image_company_logo_toggle', $request->old_image_company_logo_toggle, 'company_logo');
            SettingSystem::updateOrCreate(
                ['key' => 'company_logo_toggle'],
                ['value' => $imagePath, 'updated_by' => auth()->user()->name],
            );
        }

        return redirect()->route('admin.setting.index')->with('success', __('Pengaturan informasi koperasi berhasil diperbarui'));
    }

    public function feeSettingUpdate(AdminSettingFeeUpdateRequest $request)
    {
        foreach ($request->only('fee_loan_regular', 'fee_loan_funding', 'fee_loan_social') as $key => $value) {
            SettingSystem::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'updated_by' => auth()->user()->name],
            );
        }

        return redirect()->route('admin.setting.index')->with('success', __('Pengaturan persentase jasa berhasil diperbarui'));
    }

    public function otherSettingUpdate(AdminSettingOtherUpdateRequest $request)
    {
        foreach ($request->only('decimal_digit_amount', 'decimal_digit_percent') as $key => $value) {
            SettingSystem::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'updated_by' => auth()->user()->name],
            );
        }

        return redirect()->route('admin.setting.index')->with('success', __('Pengaturan lainnya berhasil diperbarui'));
    }

    public function transactionSettingUpdate(AdminSettingTransactionUpdateRequest $request)
    {
        foreach ($request->only(
            'sale_prefix',
            'sale_last_number',
            'loan_regular_prefix',
            'loan_regular_last_number',
            'loan_funding_prefix',
            'loan_funding_last_number',
            'loan_social_prefix',
            'loan_social_last_number',
            'saving_deposit_prefix',
            'saving_deposit_last_number',
            'saving_withdraw_prefix',
            'saving_withdraw_last_number',
        ) as $key => $value) {
            SettingSystem::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'updated_by' => auth()->user()->name],
            );
        }

        return redirect()->route('admin.setting.index')->with('success', __('Pengaturan lainnya berhasil diperbarui'));
    }
}
