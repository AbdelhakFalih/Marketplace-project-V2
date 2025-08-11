<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            font-family: 'Montserrat', sans-serif;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        .email-header {
            background: #28a745; /* Updated to match primary-green */
            padding: 30px 20px;
            text-align: center;
        }
        .email-header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        .email-body {
            padding: 40px 30px;
        }
        .email-footer {
            background-color: #48c78e; /* Updated to match accent-green */
            padding: 30px 20px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            margin: 20px 0;
        }
        .btn:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        <h1>@yield('header', config('app.name'))</h1>
    </div>
    <div class="email-body">
        @yield('content')
    </div>
    <div class="email-footer">
        <p class="text-muted mb-3" data-translate="email.sent-from">
            Cet email a été envoyé depuis <strong>{{ config('app.name') }}</strong>
        </p>
        <p class="text-muted mb-3" data-translate="email.contact-us">
            Si vous avez des questions, contactez-nous à
            <a href="mailto:{{ config('mail.support_email', 'support@example.com') }}">{{ config('mail.support_email', 'support@example.com') }}</a>
        </p>
        <p class="text-muted" data-translate="email.copyright">
            &copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.
        </p>
    </div>
</div>
</body>
</html>
