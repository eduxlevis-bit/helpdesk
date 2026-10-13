<?php
define('APP_NAME', 'IT Helpdesk');

/**
 * Auto-detect BASE_URL — works for XAMPP (localhost/folder) and root domains.
 */
$script_name = $_SERVER['SCRIPT_NAME'] ?? '/';
$public_pos  = strpos($script_name, '/public/');

if ($public_pos !== false) {
    $base_path = substr($script_name, 0, $public_pos + 7); // includes /public
} else {
    $base_path = rtrim(dirname($script_name), '/\\');
    if (strpos($base_path, '/public') === false
        && file_exists(($_SERVER['DOCUMENT_ROOT'] ?? '') . $base_path . '/public')) {
        $base_path .= '/public';
    }
}

define('BASE_PATH', $base_path);
define('BASE_URL',  BASE_PATH);

/* ── Database (edit these for your host) ──────────────────────────────────── */
define('MYSQL_HOST', '127.0.0.1');
define('MYSQL_PORT', '3306');
define('MYSQL_DB',   'it_helpdesk');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');

/* ── Session ──────────────────────────────────────────────────────────────── */
define('SESSION_NAME',   'helpdesk_session');
define('IDLE_TIMEOUT',   1800); // 30 minutes

/* ── Mail ────────────────────────────────────────────────────────────────────
   MAIL_MODE: 'mail' = PHP mail() — works on most shared hosts
              'smtp' = SMTP account (Gmail, cPanel, Mailgun, …)
              'off'  = send nothing, write every message to storage/logs/mail.log
   Free hosts: keep 'mail' if your host allows it, otherwise switch to 'smtp'. */
define('MAIL_MODE',      'smtp');
define('MAIL_FROM',      'eduxlevis@gmail.com');
define('MAIL_FROM_NAME', APP_NAME);
define('MAIL_LOG',       dirname(__DIR__) . '/storage/logs/mail.log');

define('SMTP_HOST',      'smtp.gmail.com');
define('SMTP_PORT',      587);
define('SMTP_SECURE',    'tls');   // tls | ssl | ''
define('SMTP_USER',      'eduxlevis@gmail.com');
define('SMTP_PASS',      'nsgzgrvojxxetlfk');

/* ── Ticket settings ──────────────────────────────────────────────────────── */
define('TICKET_PREFIX', 'HD');
define('PRIORITIES', ['Low', 'Medium', 'High', 'Critical']);
define('STATUSES',   ['Open', 'Assigned', 'In Progress', 'Resolved', 'Closed']);
define('ROLES',      ['admin' => 'Administrator', 'tech' => 'Technician', 'user' => 'User']);
