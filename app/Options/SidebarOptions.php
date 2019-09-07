<?php
namespace App\Options;

class SidebarOptions {

    public static function getSidebarOptions() {
        return [
            'dashboard' => [
                'name' => 'dashboard',
                'icon' => 'chart-pie',
                'route' => 'dashboard',
                'activeString' => 'dashboard',
            ],
            'manage_patients' => [
                'name' => 'manage_patients',
                'icon' => 'user',
                'route' => 'patient.index',
                'activeString' => 'patient*'

            ],
            'bp_records' => [
                'name' => 'bp_records',
                'icon' => 'briefcase-medical',
                'route' => 'bp.index',
                'activeString' => 'bp*'

            ],
        ];
    }

}