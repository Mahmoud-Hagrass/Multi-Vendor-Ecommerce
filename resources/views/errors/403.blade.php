<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>403 | {{ __('dashboard.access_denied') }}</title>

    <!-- Google Font: Cairo (Arabic-friendly) -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet" />

    <style>
        body {
            background-color: #1a202c; /* dark admin panel background */
            color: #e2e8f0; /* light text */
            font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }
        h1 {
            font-size: 8rem;
            margin: 0;
            font-weight: 700;
            color: #e53e3e; /* red */
        }
        p {
            font-size: 1.5rem;
            margin: 20px 0 30px;
            color: #a0aec0; /* muted text */
            font-family: 'Cairo', sans-serif;
        }
        a.btn-back {
            background-color: #3182ce; /* blue */
            color: white;
            padding: 12px 30px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 10px rgba(49, 130, 206, 0.3);
            font-family: 'Cairo', sans-serif;
        }
        a.btn-back:hover {
            background-color: #2b6cb0;
            box-shadow: 0 6px 14px rgba(43, 108, 176, 0.5);
        }
        small {
            color: #718096;
            margin-top: 20px;
            display: block;
            font-style: italic;
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>
<body>
    <h1>403</h1>
    <p>{{ __('dashboard.not_have_permission') }}</p>
    <a href="{{ route('admin.index') }}" class="btn-back">{{ __('dashboard.back_to_dashboard') }}</a>
</body>
</html>
