<!doctype html>
<html lang="en">
<head>
    <title>Ariza qabul qilindi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  
        <!--====== ARIZA PART START ======-->

    <section class="signup pt-25 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 signup-content" style="padding:40px;">
                    <form method="POST" action="fetchariza.php" class="signup-form contact-form" enctype="multipart/form-data">
                        <h4 class="form-title pb-20">Ariza topshirish</h4>
                        <p style="color: red;">Eslatma. Arizachi bu o'qishga qabul qilinayotgan bolaning ota-onasi yoki vasiysi hisoblanadi.</p>
                        <br>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Farzandingizning to'liq ismi *</label>
                                    <input style=" border: 1px solid #444;" type="name" class="form-input"  name="fioa" id="fioa" placeholder="F.I.O"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Arizachining to'liq ismi (Ota-ona yoki vasiy)*</label>
                                    <input style=" border: 1px solid #444;" type="name" class="form-input" name="fiov" id="fiov" placeholder="F.I.O"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yashash manzilingiz  *</label>
                                    <input style=" border: 1px solid #444;" type="text" class="form-input" name="adress" id="adress" placeholder="Kattaqo'rg'on tumani Amir Temur ko'chasi 12-uy"/>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Arizachining telefon raqami *</label>
                                    <input style=" border: 1px solid #444;" type="tel" class="form-input" name="tel1" id="tel1" required placeholder="+9989941854488"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Qo'shimcha telefon raqam *</label>
                                    <input style=" border: 1px solid #444;" type="tel" class="form-input" name="tel2" id="tel2" required placeholder="+998938154488"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Farzandingiz 2021-2022 o'quv yilida nechanchi sinfda o'qiydi *</label>
                                    <input style=" border: 1px solid #444;" type="name" class="form-input" name="sinf" id="sinf" required placeholder="1-11" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passport yoki Tug'ilganlik guvohnomasining nusxasi *</label>
                                    <input style=" border: 1px solid #444;" type="file" class="form-input" name="file_passport" id="file_passport" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>O'quvchining 3x4 rasmi *</label>
                                    <input style=" border: 1px solid #444;" type="file" class="form-input" name="img3x4" id="img3x4" required accept="image/*"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agar arizachi bolani o'z qaramog'iga olgan bo'lsa vasiylik to'g'risidagi hujjatning nusxasi *</label>
                                    <input style=" border: 1px solid #444;" type="file" class="form-input" name="file_vasiy" id="file_vasiy"/>
                                </div>
                            </div>  

                        </div>
                        
                        <div class="form-group">
                            <input style="width: 20px;border:1px solid black;" type="checkbox" name="agree" id="agree-term" class="agree-term" required>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>Ushbu arizani tasdiqlayman.</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="main-btn register-submit" value="Ariza topshirish"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</body>
</html>
