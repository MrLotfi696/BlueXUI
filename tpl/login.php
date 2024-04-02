<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_TITEL ?></title>
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="h-screen flex flex-col justify-center items-center " style="background-color: #1c1e24;">
    <div class="flex w-3/4">
        <div class="w-full py-6 px-6 rounded-md text-white" style="background-color: #40495a;">
            <h1>برای مشاهده اطلاعات سرویس، لینک یا نام سرویس خود را در کادر زیر وارد کنید.</h1>
            <p class="mt-3" id="errorMSG" style="color: red;"></p>
            <div class="flex flex-col md:flex-row gap-4 mt-5">
                <input type="text" class="w-full bg-blue-500 shadow-md shadow-blue-500/50 rounded py-2 px-4" name="link" id="inputLink" required>
                <button type="submit" class="bg-blue-500 shadow-md shadow-blue-500/50 rounded py-2 px-4" id="btnsubmit">بررسی</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center text-white mb-5 mt-6">
        <h1>طراحی شده با ❤️ و کمی چای!</h1>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('#btnsubmit').click(function(e) {
            var value = $('#inputLink').val();
            $.ajax({
                url: "libs/auth.php",
                method: "post",
                data: {
                    link: value
                },
                success: function(responsive) {
                    if (responsive == 1) {
                        window.location.replace("index.php");
                    } else {
                        document.getElementById('errorMSG').innerHTML = "نام یا لینک سرویس نامعتبر می‌باشد.";
                        setInterval(function (e) {
                            document.getElementById('errorMSG').innerHTML = "";
                        }, 3500);
                    }
                }
            });
        });
    </script>
</body>

</html>