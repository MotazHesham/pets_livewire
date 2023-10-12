<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 25,
                'title' => 'client_managment_access',
            ],
            [
                'id'    => 26,
                'title' => 'client_create',
            ],
            [
                'id'    => 27,
                'title' => 'client_edit',
            ],
            [
                'id'    => 28,
                'title' => 'client_show',
            ],
            [
                'id'    => 29,
                'title' => 'client_delete',
            ],
            [
                'id'    => 30,
                'title' => 'client_access',
            ],
            [
                'id'    => 31,
                'title' => 'pet_create',
            ],
            [
                'id'    => 32,
                'title' => 'pet_edit',
            ],
            [
                'id'    => 33,
                'title' => 'pet_show',
            ],
            [
                'id'    => 34,
                'title' => 'pet_delete',
            ],
            [
                'id'    => 35,
                'title' => 'pet_access',
            ],
            [
                'id'    => 36,
                'title' => 'setting_create',
            ],
            [
                'id'    => 37,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 38,
                'title' => 'setting_show',
            ],
            [
                'id'    => 39,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 40,
                'title' => 'setting_access',
            ],
            [
                'id'    => 41,
                'title' => 'package_managment_access',
            ],
            [
                'id'    => 42,
                'title' => 'package_create',
            ],
            [
                'id'    => 43,
                'title' => 'package_edit',
            ],
            [
                'id'    => 44,
                'title' => 'package_show',
            ],
            [
                'id'    => 45,
                'title' => 'package_delete',
            ],
            [
                'id'    => 46,
                'title' => 'package_access',
            ],
            [
                'id'    => 47,
                'title' => 'service_create',
            ],
            [
                'id'    => 48,
                'title' => 'service_edit',
            ],
            [
                'id'    => 49,
                'title' => 'service_show',
            ],
            [
                'id'    => 50,
                'title' => 'service_delete',
            ],
            [
                'id'    => 51,
                'title' => 'service_access',
            ],
            [
                'id'    => 52,
                'title' => 'addon_create',
            ],
            [
                'id'    => 53,
                'title' => 'addon_edit',
            ],
            [
                'id'    => 54,
                'title' => 'addon_show',
            ],
            [
                'id'    => 55,
                'title' => 'addon_delete',
            ],
            [
                'id'    => 56,
                'title' => 'addon_access',
            ],
            [
                'id'    => 57,
                'title' => 'general_setting_access',
            ],
            [
                'id'    => 58,
                'title' => 'slider_create',
            ],
            [
                'id'    => 59,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 60,
                'title' => 'slider_show',
            ],
            [
                'id'    => 61,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 62,
                'title' => 'slider_access',
            ],
            [
                'id'    => 63,
                'title' => 'category_create',
            ],
            [
                'id'    => 64,
                'title' => 'category_edit',
            ],
            [
                'id'    => 65,
                'title' => 'category_show',
            ],
            [
                'id'    => 66,
                'title' => 'category_delete',
            ],
            [
                'id'    => 67,
                'title' => 'category_access',
            ],
            [
                'id'    => 68,
                'title' => 'appointment_create',
            ],
            [
                'id'    => 69,
                'title' => 'appointment_edit',
            ],
            [
                'id'    => 70,
                'title' => 'appointment_show',
            ],
            [
                'id'    => 71,
                'title' => 'appointment_delete',
            ],
            [
                'id'    => 72,
                'title' => 'appointment_access',
            ],
            [
                'id'    => 73,
                'title' => 'contact_create',
            ],
            [
                'id'    => 74,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 75,
                'title' => 'contact_show',
            ],
            [
                'id'    => 76,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 77,
                'title' => 'contact_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
