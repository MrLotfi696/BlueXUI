<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_TITEL ?></title>
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="container mx-auto" style="background-color: #1c1e24;">
    <div class="flex justify-center items-center mb-5 mt-6">
        <div class="py-6 px-6 w-11/12 h-full rounded-md text-white" style="background-color: #40495a;">
            <h1>مشخصات سرویس شما</h1>
            <div class="flex flex-col xl:flex-row gap-4 mt-5">
                <div class="w-full flex flex-col gap-4">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="basis-3/4 flex justify-between items-center bg-blue-500 shadow-md shadow-blue-500/50 rounded py-4 px-6 text-sm">
                            <span>نام کانفیگ : </span>
                            <span><?= $dataUser['remark'] ?></span>
                        </div>
                        <div class="basis-3/4 flex justify-between items-center bg-blue-500 shadow-md shadow-blue-500/50 rounded py-4 px-6 text-sm">
                            <span><i class="fa-solid fa-rocket ml-1"></i> وضعیت کانفیگ : </span>
                            <span><?= ($dataUser['enable'] == 1) ? "فعال" : "غیرفعال" ?></span>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-4">
                        <div class="basis-1/2 flex flex-col gap-5 bg-blue-500 shadow-md shadow-blue-500/50 rounded py-6 px-6 text-sm">
                            <div class="flex justify-between items-center">
                                <span><i class="fa-solid fa-user-check ml-1"></i> وضعیت آنلاینی : </span>
                                <span><?= $dataUser['online'] ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span><i class="fa-regular fa-calendar ml-1"></i> انقضا کانفیگ : </span>
                                <span dir="ltr"><?= $dataUser['expiryTime'] ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span><i class="fa-solid fa-layer-group ml-1"></i> حجم کل : </span>
                                <span dir="ltr"><?= $dataUser['total'] ?></span>
                            </div>
                        </div>
                        <div class="basis-1/2 flex flex-col gap-5 bg-blue-500 shadow-md shadow-blue-500/50 rounded py-6 px-6 text-sm">
                            <div class="flex justify-between items-center">
                                <span><i class="fa-solid fa-cloud-arrow-down ml-1"></i> حجم کل مصرف شده : </span>
                                <span dir="ltr"><?= $dataUser['total_used'] ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span><i class="fa-solid fa-server ml-1"></i> حجم باقی مانده : </span>
                                <span dir="ltr"><?= $dataUser['remaning_trafic'] ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span><i class="fa-regular fa-clock ml-1"></i> زمان باقی مانده : </span>
                                <span><?= $dataUser['remaning_days'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-4">
                        <div class="w-full flex flex-col gap-4 bg-blue-500 shadow-md shadow-blue-500/50 rounded py-4 px-6">
                            <h2>برنامه های کاربردی</h2>
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="flex justify-between items-center rounded px-4 py-2 w-full md:w-64 lg:w-72 xl:w-64" style="background-color: #40495a;">
                                    <span>V2rayNG</span>
                                    <a href="<?= $arr_Programs['V2rayNG']; ?>" target=”_blank”><i class="fa-solid fa-download"></i></a>
                                </div>

                                <div class="flex justify-between items-center rounded px-4 py-2 w-full md:w-64 lg:w-72 xl:w-64" style="background-color: #40495a;">
                                    <span>NekoBox</span>
                                    <a href="<?= $arr_Programs['NekoBox']; ?>" target=”_blank”><i class="fa-solid fa-download"></i></a>
                                </div>

                                <div class="flex justify-between items-center rounded px-4 py-2 w-full md:w-64 lg:w-72 xl:w-64" style="background-color: #40495a;">
                                    <span>FoXray</span>
                                    <a href="<?= $arr_Programs['FoXray']; ?>" target=”_blank”><i class="fa-solid fa-download"></i></a>
                                </div>
                                <div class="flex justify-between items-center rounded px-4 py-2 w-full md:w-64 lg:w-72 xl:w-64" style="background-color: #40495a;">
                                    <span>V2Box</span>
                                    <a href="<?= $arr_Programs['V2Box']; ?>" target=”_blank”><i class="fa-solid fa-download"></i></a>
                                </div>
                            </div>
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="flex justify-between items-center rounded px-4 py-2 w-full md:w-64 lg:w-72 xl:w-64" style="background-color: #40495a;">
                                    <span>Streisand</span>
                                    <a href="<?= $arr_Programs['Streisand']; ?>" target=”_blank”><i class="fa-solid fa-download"></i></a>
                                </div>

                                <div class="flex justify-between items-center rounded px-4 py-2 w-full md:w-64 lg:w-72 xl:w-64" style="background-color: #40495a;">
                                    <span>V2rayN</span>
                                    <a href="<?= $arr_Programs['V2rayN']; ?>" target=”_blank”><i class="fa-solid fa-download"></i></a>
                                </div>

                                <div class="flex justify-between items-center rounded px-4 py-2 w-full md:w-64 lg:w-72 xl:w-64" style="background-color: #40495a;">
                                    <span>NetMod</span>
                                    <a href="<?= $arr_Programs['NetMod']; ?>" target=”_blank”><i class="fa-solid fa-download"></i></a>
                                </div>

                                <div class="flex justify-between items-center rounded px-4 py-2 w-full md:w-64 lg:w-72 xl:w-64" style="background-color: #40495a;">
                                    <span>Nekoray</span>
                                    <a href="<?= $arr_Programs['Nekoray']; ?>" target=”_blank”><i class="fa-solid fa-download"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center text-footer text-white mb-5 mt-6">
        <p>طراحی شده با ❤️ و کمی چای!</p>
    </div>
</body>

</html>