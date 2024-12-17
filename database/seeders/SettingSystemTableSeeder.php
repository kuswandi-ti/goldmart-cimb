<?php

namespace Database\Seeders;

use App\Models\SettingSystem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSystemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $input = [
            ['key' => 'company_name', 'value' => 'Koperasi FCI Sejahtera', 'created_by' => $user],
            ['key' => 'site_title', 'value' => 'KFCIS System', 'created_by' => $user],
            ['key' => 'company_email', 'value' => 'admin@kfcis.com', 'created_by' => $user],
            ['key' => 'company_phone', 'value' => '081298694640', 'created_by' => $user],
            ['key' => 'company_address', 'value' => 'PT A.W. Faber-Castell Indonesia (FCI), Jalan Raya Narogong No.KM.11, RT.001/RW.005, Pangkalan 1B, Bantar Gebang, Bekasi City, West Java  17151, ID', 'created_by' => $user],
            ['key' => 'fee_loan_regular', 'value' => '0', 'created_by' => $user],
            ['key' => 'fee_loan_funding', 'value' => '0', 'created_by' => $user],
            ['key' => 'fee_loan_social', 'value' => '0', 'created_by' => $user],
            ['key' => 'default_date_format', 'value' => 'd-m-Y', 'created_by' => $user],
            ['key' => 'default_time_format', 'value' => 'H:i:s', 'created_by' => $user],
            ['key' => 'default_language', 'value' => 'id', 'created_by' => $user],
            ['key' => 'decimal_digit_amount', 'value' => '0', 'created_by' => $user],
            ['key' => 'decimal_digit_percent', 'value' => '2', 'created_by' => $user],
            // ['key' => 'company_logo', 'value' => config('common.no_image'), 'created_by' => $user],
            // ['key' => 'company_logo_desktop', 'value' => config('common.no_image'), 'created_by' => $user],
            // ['key' => 'company_logo_toggle', 'value' => config('common.no_image'), 'created_by' => $user],
            ['key' => 'site_microsoft_api_host', 'value' => config('common.site_microsoft_api_host'), 'created_by' => $user],
            ['key' => 'site_microsoft_api_key', 'value' => config('common.site_microsoft_api_key'), 'created_by' => $user],
            ['key' => 'mail_type', 'value' => config('common.mail_mailer'), 'created_by' => $user],
            ['key' => 'mail_host', 'value' => config('common.mail_host'), 'created_by' => $user],
            ['key' => 'mail_username', 'value' => config('common.mail_username'), 'created_by' => $user],
            ['key' => 'mail_password', 'value' => config('common.mail_password'), 'created_by' => $user],
            ['key' => 'mail_encryption', 'value' => config('common.mail_encryption'), 'created_by' => $user],
            ['key' => 'mail_port', 'value' => config('common.mail_port'), 'created_by' => $user],
            ['key' => 'mail_from_address', 'value' => config('common.mail_from_address'), 'created_by' => $user],
            ['key' => 'mail_from_name', 'value' => config('common.mail_from_name'), 'created_by' => $user],
            ['key' => 'midtrans_environment', 'value' => config('common.midtrans_environment'), 'created_by' => $user],
            ['key' => 'midtrans_merchant_id', 'value' => config('common.midtrans_merchant_id'), 'created_by' => $user],
            ['key' => 'midtrans_client_key', 'value' => config('common.midtrans_client_key'), 'created_by' => $user],
            ['key' => 'midtrans_server_key', 'value' => config('common.midtrans_server_key'), 'created_by' => $user],
            ['key' => 'sale_prefix', 'value' => 'INV', 'created_by' => $user],
            ['key' => 'sale_last_number', 'value' => 0, 'created_by' => $user],
            ['key' => 'loan_regular_prefix', 'value' => 'LRE', 'created_by' => $user],
            ['key' => 'loan_regular_last_number', 'value' => 0, 'created_by' => $user],
            ['key' => 'loan_funding_prefix', 'value' => 'LFU', 'created_by' => $user],
            ['key' => 'loan_funding_last_number', 'value' => 0, 'created_by' => $user],
            ['key' => 'loan_social_prefix', 'value' => 'LSO', 'created_by' => $user],
            ['key' => 'loan_social_last_number', 'value' => 0, 'created_by' => $user],
            ['key' => 'saving_deposit_prefix', 'value' => 'DSA', 'created_by' => $user],
            ['key' => 'saving_deposit_last_number', 'value' => 0, 'created_by' => $user],
            ['key' => 'saving_withdraw_prefix', 'value' => 'WSA', 'created_by' => $user],
            ['key' => 'saving_withdraw_last_number', 'value' => 0, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            SettingSystem::create($item);
        }
    }
}
