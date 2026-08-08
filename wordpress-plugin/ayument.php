<?php
/*
Plugin Name: AyuMent Core
Plugin URI: https://ayument.com
Description: Core functionality for the AyuMent AI-powered Ayurveda platform.
Version: 1.0.0
Author: Mr. Manish Kumar & Mr. Ashish Ranjan
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit;
}

function ayument_core_menu() {

    add_menu_page(
        'AyuMent',
        'AyuMent',
        'manage_options',
        'ayument-dashboard',
        'ayument_dashboard_page',
        'dashicons-heart',
        25
    );

}

add_action('admin_menu', 'ayument_core_menu');

function ayument_dashboard_page() {
?>
<div class="wrap">

<h1>🌿 AyuMent Dashboard</h1>

<h2>Welcome to AyuMent</h2>

<p>AI + Real Ayurvedic Consultation Platform</p>

<hr>

<h3>Modules</h3>

<ul>
<li>🤖 AI Consultation</li>
<li>👨‍⚕️ Consult Ayurvedic Doctor</li>
<li>📋 Patients</li>
<li>💊 Prescriptions</li>
<li>📅 Appointments</li>
<li>📚 Research Hub</li>
<li>⚙️ Settings</li>
</ul>

</div>
<?php
}