<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Message</title>
</head>

<body
    style="margin:0; padding:0; background:#f3f4f6; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f3f4f6; padding:40px 10px;">
        <tr>
            <td align="center">

                <!-- Container -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:14px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.08);">

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px 35px; color:#111827;">

                            <h2 style="margin:0 0 10px; font-size:22px;">Hello Admin</h2>

                            <p style="margin:0 0 20px; font-size:15px; color:#4b5563; line-height:1.7;">
                                You have received a new message from your website contact form.
                            </p>

                            <!-- Info Box -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#f9fafb; border-radius:10px; padding:15px;">
                                <tr>
                                    <td style="padding:8px 0;"><strong>Name:</strong> {{ $name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 0;"><strong>Email:</strong> {{ $email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 0;"><strong>Phone:</strong> {{ $phone ?? 'N/A' }}</td>
                                </tr>
                            </table>

                            <!-- Message -->
                            <div
                                style="margin-top:20px; padding:18px; border-left:4px solid #0f172a; background:#f8fafc; border-radius:8px;">
                                <p style="margin:0 0 8px; font-weight:bold;">Message</p>
                                <p style="margin:0; color:#374151; line-height:1.6;">
                                    {{ $comment ?? '' }}
                                </p>
                            </div>

                        </td>
                    </tr>

                    <!-- CTA Button -->
                    <tr>
                        <td align="center" style="padding:25px;">
                            <a href="https://your-site.com"
                                style="background:#0f172a; color:#ffffff; text-decoration:none; padding:12px 24px; border-radius:8px; font-size:14px; display:inline-block;">
                                Visit Website
                            </a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding:18px; font-size:12px; color:#9ca3af; background:#f3f4f6;">
                            © {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
