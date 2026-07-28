<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Ново запитване от уебсайта</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f7f6; color: #333; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 12px; border: 1px solid #e5e7eb;">
        <h2 style="color: #047857; margin-top: 0;">Ново запитване от уебсайта</h2>
        <p style="font-size: 15px; color: #4b5563;">Получихте ново съобщение през контактната форма на уебсайта:</p>

        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">

        <table style="width: 100%; text-align: left; border-collapse: collapse;">
            <tr>
                <td style="padding: 8px 0; font-weight: bold; width: 120px; color: #047857;">Име:</td>
                <td style="padding: 8px 0;">{{ $data['name'] }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-weight: bold; color: #047857;">Телефон:</td>
                <td style="padding: 8px 0;"><a href="tel:{{ $data['phone'] }}" style="color: #047857;">{{ $data['phone'] }}</a></td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-weight: bold; color: #047857;">Имейл:</td>
                <td style="padding: 8px 0;"><a href="mailto:{{ $data['email'] }}" style="color: #047857;">{{ $data['email'] }}</a></td>
            </tr>
        </table>

        <div style="margin-top: 20px; padding: 15px; background: #f9fafb; border-left: 4px solid #047857; border-radius: 4px;">
            <p style="margin: 0; font-weight: bold; color: #111827; margin-bottom: 8px;">Съобщение:</p>
            <p style="margin: 0; white-space: pre-line; color: #374151;">{{ $data['message'] }}</p>
        </div>

        <p style="font-size: 12px; color: #9ca3af; margin-top: 30px; text-anchor: middle;">
            Това писмо е изпратено автоматично от контактната форма на Свежи Консулт.
        </p>
    </div>
</body>
</html>
