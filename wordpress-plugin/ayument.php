<?php
/*
Plugin Name: AyuMent Core
Plugin URI: https://ayument.com
Description: Core functionality for the AyuMent AI-powered Ayurveda platform.
Version: 1.1.0
Author: Mr. Manish Kumar & Mr. Ashish Ranjan
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit;
}


/*
|--------------------------------------------------------------------------
| AYUMENT ADMIN MENU
|--------------------------------------------------------------------------
*/

function ayument_core_menu() {

    add_menu_page(
        'AyuMent Dashboard',
        'AyuMent',
        'manage_options',
        'ayument-dashboard',
        'ayument_dashboard_page',
        'dashicons-heart',
        25
    );

    add_submenu_page(
        'ayument-dashboard',
        'AI Consultation',
        'AI Consultation',
        'manage_options',
        'ayument-ai',
        'ayument_ai_page'
    );

    add_submenu_page(
        'ayument-dashboard',
        'Consult Doctor',
        'Consult Doctor',
        'manage_options',
        'ayument-doctor',
        'ayument_doctor_page'
    );

    add_submenu_page(
        'ayument-dashboard',
        'Patients',
        'Patients',
        'manage_options',
        'ayument-patients',
        'ayument_patients_page'
    );

    add_submenu_page(
        'ayument-dashboard',
        'Appointments',
        'Appointments',
        'manage_options',
        'ayument-appointments',
        'ayument_appointments_page'
    );

    add_submenu_page(
        'ayument-dashboard',
        'Prescriptions',
        'Prescriptions',
        'manage_options',
        'ayument-prescriptions',
        'ayument_prescriptions_page'
    );

    add_submenu_page(
        'ayument-dashboard',
        'Medicine Store',
        'Medicine Store',
        'manage_options',
        'ayument-store',
        'ayument_store_page'
    );

    add_submenu_page(
        'ayument-dashboard',
        'Research Hub',
        'Research Hub',
        'manage_options',
        'ayument-research',
        'ayument_research_page'
    );

    add_submenu_page(
        'ayument-dashboard',
        'Analytics',
        'Analytics',
        'manage_options',
        'ayument-analytics',
        'ayument_analytics_page'
    );

    add_submenu_page(
        'ayument-dashboard',
        'Settings',
        'Settings',
        'manage_options',
        'ayument-settings',
        'ayument_settings_page'
    );
}

add_action('admin_menu', 'ayument_core_menu');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

function ayument_dashboard_page() {

    $modules = array(

        array(
            'icon' => '🤖',
            'title' => 'AI Consultation',
            'description' => 'Get AI-assisted Ayurvedic guidance and preliminary health information.',
            'url' => admin_url('admin.php?page=ayument-ai')
        ),

        array(
            'icon' => '👨‍⚕️',
            'title' => 'Consult Doctor',
            'description' => 'Book a consultation with a verified Ayurvedic doctor.',
            'url' => admin_url('admin.php?page=ayument-doctor')
        ),

        array(
            'icon' => '👤',
            'title' => 'Patients',
            'description' => 'Manage patient profiles and consultation records.',
            'url' => admin_url('admin.php?page=ayument-patients')
        ),

        array(
            'icon' => '📅',
            'title' => 'Appointments',
            'description' => 'Schedule and manage consultations and appointments.',
            'url' => admin_url('admin.php?page=ayument-appointments')
        ),

        array(
            'icon' => '💊',
            'title' => 'Prescriptions',
            'description' => 'Manage prescriptions created during consultations.',
            'url' => admin_url('admin.php?page=ayument-prescriptions')
        ),

        array(
            'icon' => '💊',
            'title' => 'Medicine Store',
            'description' => 'Browse and order Ayurvedic medicines and products.',
            'url' => admin_url('admin.php?page=ayument-store')
        ),

        array(
            'icon' => '📚',
            'title' => 'Research Hub',
            'description' => 'Explore Ayurvedic research, literature and educational resources.',
            'url' => admin_url('admin.php?page=ayument-research')
        ),

        array(
            'icon' => '📊',
            'title' => 'Analytics',
            'description' => 'View platform usage and business analytics.',
            'url' => admin_url('admin.php?page=ayument-analytics')
        ),

        array(
            'icon' => '⚙️',
            'title' => 'Settings',
            'description' => 'Configure AyuMent platform settings.',
            'url' => admin_url('admin.php?page=ayument-settings')
        )

    );
    ?>

    <div class="wrap ayument-dashboard">

        <style>

            .ayument-dashboard {
                max-width: 1100px;
                margin-top: 30px;
            }

            .ayument-header {
                background: linear-gradient(135deg, #315c45, #4f8064);
                color: #ffffff;
                padding: 30px;
                border-radius: 14px;
                margin-bottom: 25px;
                box-shadow: 0 5px 18px rgba(0,0,0,0.12);
            }

            .ayument-header h1 {
                color: #ffffff;
                font-size: 32px;
                margin: 0 0 10px;
            }

            .ayument-header p {
                font-size: 16px;
                margin: 0;
            }

            .ayument-badge {
                display: inline-block;
                margin-top: 15px;
                padding: 7px 14px;
                background: rgba(255,255,255,0.18);
                border-radius: 20px;
                font-size: 13px;
                font-weight: 600;
            }

            .ayument-section h2 {
                font-size: 22px;
                margin-bottom: 18px;
            }

            .ayument-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 20px;
            }

            .ayument-card-link {
                text-decoration: none;
                color: inherit;
                display: block;
            }

            .ayument-card {
                background: #ffffff;
                border: 1px solid #e3e8e5;
                border-radius: 14px;
                padding: 24px;
                min-height: 150px;
                box-sizing: border-box;
                transition: all 0.2s ease;
                box-shadow: 0 3px 12px rgba(0,0,0,0.06);
            }

            .ayument-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 22px rgba(0,0,0,0.12);
                border-color: #315c45;
            }

            .ayument-icon {
                font-size: 28px;
                margin-bottom: 10px;
            }

            .ayument-card h2 {
                font-size: 20px;
                margin: 0 0 8px;
                color: #26372d;
            }

            .ayument-card p {
                color: #647067;
                font-size: 14px;
                line-height: 1.6;
                margin: 0 0 18px;
            }

            .ayument-button {
                display: inline-block;
                padding: 8px 16px;
                background: #315c45;
                color: #ffffff;
                border-radius: 6px;
                font-weight: 600;
                font-size: 13px;
            }

            @media (max-width: 700px) {
                .ayument-grid {
                    grid-template-columns: 1fr;
                }
            }

        </style>


        <div class="ayument-header">

            <h1>🌿 AyuMent Dashboard</h1>

            <p>
                Welcome to the future of AI-assisted Ayurvedic healthcare.
            </p>

            <span class="ayument-badge">
                Development Version 1.1.0
            </span>

        </div>


        <div class="ayument-section">

            <h2>Platform Modules</h2>

            <div class="ayument-grid">

                <?php foreach ($modules as $module) : ?>

                    <a
                        class="ayument-card-link"
                        href="<?php echo $module['url']; ?>"
                    >

                        <div class="ayument-card">

                            <div class="ayument-icon">
                                <?php echo $module['icon']; ?>
                            </div>

                            <h2>
                                <?php echo $module['title']; ?>
                            </h2>

                            <p>
                                <?php echo $module['description']; ?>
                            </p>

                            <span class="ayument-button">
                                Open →
                            </span>

                        </div>

                    </a>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

    <?php
}


/*
|--------------------------------------------------------------------------
| AI CONSULTATION
|--------------------------------------------------------------------------
*/

function ayument_ai_page() {
    ayument_module_page(
        '🤖 AI Consultation',
        'AI-assisted Ayurvedic guidance and preliminary health information.',
        'This module will contain the AyuMent AI consultation system.'
    );
}


/*
|--------------------------------------------------------------------------
| CONSULT DOCTOR
|--------------------------------------------------------------------------
*/

function ayument_doctor_page() {
    ayument_module_page(
        '👨‍⚕️ Consult Doctor',
        'Connect users with verified Ayurvedic doctors.',
        'Doctor consultation and booking functionality will be developed here.'
    );
}


/*
|--------------------------------------------------------------------------
| PATIENTS
|--------------------------------------------------------------------------
*/

function ayument_patients_page() {
    ayument_module_page(
        '👤 Patients',
        'Manage patient profiles and consultation records.',
        'Patient management functionality will be developed here.'
    );
}


/*
|--------------------------------------------------------------------------
| APPOINTMENTS
|--------------------------------------------------------------------------
*/

function ayument_appointments_page() {
    ayument_module_page(
        '📅 Appointments',
        'Schedule and manage consultations and appointments.',
        'Appointment scheduling functionality will be developed here.'
    );
}


/*
|--------------------------------------------------------------------------
| PRESCRIPTIONS
|--------------------------------------------------------------------------
*/

function ayument_prescriptions_page() {
    ayument_module_page(
        '💊 Prescriptions',
        'Manage prescriptions created during consultations.',
        'Prescription management functionality will be developed here.'
    );
}


/*
|--------------------------------------------------------------------------
| MEDICINE STORE
|--------------------------------------------------------------------------
*/

function ayument_store_page() {
    ayument_module_page(
        '💊 Medicine Store',
        'Browse and order Ayurvedic medicines and products.',
        'The Ayurvedic medicine store will be developed here.'
    );
}


/*
|--------------------------------------------------------------------------
| RESEARCH HUB
|--------------------------------------------------------------------------
*/

function ayument_research_page() {
    ayument_module_page(
        '📚 Research Hub',
        'Explore Ayurvedic research, literature and educational resources.',
        'Research and educational resources will be developed here.'
    );
}


/*
|--------------------------------------------------------------------------
| ANALYTICS
|--------------------------------------------------------------------------
*/

function ayument_analytics_page() {
    ayument_module_page(
        '📊 Analytics',
        'View platform usage and business analytics.',
        'Analytics and platform insights will be developed here.'
    );
}


/*
|--------------------------------------------------------------------------
| SETTINGS
|--------------------------------------------------------------------------
*/

function ayument_settings_page() {
    ayument_module_page(
        '⚙️ Settings',
        'Configure AyuMent platform settings.',
        'AyuMent configuration and settings will be developed here.'
    );
}


/*
|--------------------------------------------------------------------------
| COMMON MODULE PAGE
|--------------------------------------------------------------------------
*/

function ayument_module_page($title, $description, $message) {
    ?>

    <div class="wrap">

        <div
            style="
                max-width:900px;
                background:#ffffff;
                padding:35px;
                margin-top:30px;
                border-radius:14px;
                border:1px solid #e3e8e5;
                box-shadow:0 4px 15px rgba(0,0,0,0.08);
            "
        >

            <h1 style="font-size:30px;">
                <?php echo $title; ?>
            </h1>

            <p style="font-size:17px;color:#555;">
                <?php echo $description; ?>
            </p>

            <hr>

            <div
                style="
                    margin-top:25px;
                    padding:22px;
                    background:#f1f7f3;
                    border-left:5px solid #315c45;
                    border-radius:8px;
                "
            >

                <h2 style="margin-top:0;">
                    AyuMent Development Module
                </h2>

                <p style="font-size:16px;">
                    <?php echo $message; ?>
                </p>

                <p>
                    <strong>Status:</strong>
                    Development
                </p>

            </div>

            <p style="margin-top:25px;">
                <a
                    href="<?php echo admin_url('admin.php?page=ayument-dashboard'); ?>"
                    class="button button-primary"
                >
                    ← Back to AyuMent Dashboards
                </a>
            </p>

        </div>

    </div>

    <?php
}