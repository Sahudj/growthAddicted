
<!DOCTYPE html>
<html>
<head>
    <title>Certificate of Completion</title>
</head>
<body>
<style type="text/css">
body {
    font-family: Roboto;
}

.certificate-container {
    padding: 10px;
    width: 1024px;
}
.certificate {
    border: 20px solid #0C5280;
    padding: 25px;
    height: 400px;
    position: relative;
}


.certificate-header > .logo {
    width: 200px;
    height: 100px;
}

.certificate-title {
    text-align: center;    
}

.certificate-body {
    text-align: center;
}

h1 {

    font-weight: 400;
    font-size: 48px;
    color: #0C5280;
}

.student-name {
    font-size: 24px;
}

.certificate-content {
    margin: 0 auto;
    width: 750px;
}

.about-certificate {
    width: 380px;
    margin: 0 auto;
}

.topic-description {

    text-align: center;
}

</style>
<div class="certificate-container">
    <div class="certificate">
        <div class="water-mark-overlay"></div>
        <div class="certificate-header">
            <img src="https://growthaddicted.com/public/Final Logo.png"  class="logo" alt="">
        </div>
        <div class="certificate-body">
           
            <h1>Certificate of Completion</h1>
            <p class="student-name">{{ ucfirst(auth()->user()->name)}}</p>
            <div class="certificate-content">
                <div class="about-certificate">
                    <p>
                has completed topic {{$title}} on Date {{$date}}
                </p>
                </div>
            </div>
            <div class="certificate-footer">
                <div class="row">
                    <div class="col-md-6" style="float:left;">
                        <p>Principal: ______________________</p>
                    </div>
                    <div class="col-md-6" style="float:right;">
                    <p>
                      Accredited by
                      <br>
                      <strong>Aman upadhaya</strong>
                      
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>