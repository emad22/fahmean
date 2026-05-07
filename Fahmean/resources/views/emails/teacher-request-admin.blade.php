<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 80%; margin: 20px auto; border: 1px solid #ddd; padding: 20px; border-radius: 10px; }
        .header { background: #211644; color: #fff; padding: 10px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { padding: 20px; }
        .field { margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        .label { font-weight: bold; color: #211644; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>طلب انضمام معلم جديد</h2>
        </div>
        <div class="content">
            <div class="field"><span class="label">الاسم:</span> {{ $data->frist_name }} {{ $data->last_name }}</div>
            <div class="field"><span class="label">البريد الإلكتروني:</span> {{ $data->email }}</div>
            <div class="field"><span class="label">رقم الهاتف:</span> {{ $data->phone_num }}</div>
            <div class="field"><span class="label">المرحلة الدراسية:</span> {{ $data->academic_level }}</div>
            <div class="field"><span class="label">المادة الدراسية:</span> {{ $data->subject_name }}</div>
            <div class="field"><span class="label">العنوان:</span> {{ $data->address }}</div>
            <div class="field"><span class="label">الخبرة السابقة:</span> <br> {{ $data->work_experience }}</div>
            <div class="field"><span class="label">رابط الفيسبوك:</span> {{ $data->facebook_link ?? 'غير متوفر' }}</div>
            <div class="field"><span class="label">عدد الطلاب المتوقع:</span> {{ $data->students_num ?? 'غير متوفر' }}</div>
        </div>
    </div>
</body>
</html>
