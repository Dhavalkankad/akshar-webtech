<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Reset Password - <?php echo SITE_NAME; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            background-color: #f5f6fa;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08);
        }

        .header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            padding: 20px;
            text-align: center;
        }

        .header img {
            max-height: 60px;
        }

        .content {
            padding: 30px;
        }

        .content h1 {
            font-size: 22px;
            margin: 0 0 15px;
            color: #222;
        }

        .content p {
            font-size: 15px;
            line-height: 1.6;
            margin: 10px 0;
            color: #555;
        }

        .btn {
            display: inline-block;
            background: #4facfe;
            color: #fff !important;
            padding: 12px 28px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            margin: 20px 0;
            transition: 0.3s ease;
        }

        .btn:hover {
            background: #00c6ff;
        }

        .footer {
            background: #f1f1f1;
            padding: 15px;
            text-align: center;
            font-size: 13px;
            color: #888;
        }

        .footer a {
            color: #4facfe;
            text-decoration: none;
        }

        /* Dark Mode Support */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #121212;
                color: #e0e0e0;
            }

            .container {
                background: #1e1e1e;
                box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.6);
            }

            .content h1 {
                color: #ffffff;
            }

            .content p {
                color: #cccccc;
            }

            .footer {
                background: #222;
                color: #aaa;
            }

            .footer a {
                color: #4facfe;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="<?php echo base_url(); ?>" target="_blank">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="<?php echo SITE_NAME; ?>">
            </a>
        </div>
        <div class="content">
            <h1>Hello <?php echo ucfirst($name); ?>,</h1>
            <p>We received a request to reset your password for your <strong><?php echo SITE_NAME; ?></strong> account.</p>
            <p>Click the button below to securely reset your password:</p>
            <p style="text-align: center;">
                <a href="<?php echo $reset_link; ?>" class="btn" target="_blank">Reset Password</a>
            </p>
            <p>If you didn’t request this change, you can safely ignore this email. Your password will remain unchanged.</p>
        </div>
        <div class="footer">
            <p>&copy; <?php echo date("Y"); ?> <strong><?php echo SITE_NAME; ?></strong>. All rights reserved.</p>
            <p>
                <a href="<?php echo base_url(); ?>">Visit Website</a>
            </p>
        </div>
    </div>
</body>

</html>