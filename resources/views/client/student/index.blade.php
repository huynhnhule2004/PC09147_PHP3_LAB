<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ cá nhân - Lê Thị Huỳnh Như</title>
    <link rel="stylesheet" href="{{ asset('assets/client/vendor/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            transition: 0.3s;
        }
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid #007bff;
            object-fit: contain;
            margin-bottom: 15px;
        }
        .skills span {
            background: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 20px;
            display: inline-block;
            margin: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="profile-card p-4">
                <img src="{{ asset('assets/client/images/HUYNH_NHU(CV).jpg') }}" alt="Lê Thị Huỳnh Như" class="avatar">
                <h2 class="mt-3">Lê Thị Huỳnh Như</h2>
                <h5 class="text-muted">Backend Developer</h5>

                <p class="mt-3">
                    Xin chào! Tôi là một lập trình viên Backend với niềm đam mê về hệ thống, cơ sở dữ liệu và tối ưu hiệu suất ứng dụng. 
                    Tôi có kinh nghiệm làm việc với Laravel, Node.js, MySQL và các dịch vụ cloud như Firebase.
                </p>

                <div class="skills my-3">
                    <h5>Kỹ năng</h5>
                    <span>PHP</span>
                    <span>Laravel</span>
                    <span>Spring Boot</span>
                    <span>Node.js</span>
                    <span>MySQL</span>
                    <span>RESTful API</span>
                    <span>Firebase</span>
                    <span>Docker</span>
                    <span>Git/GitHub</span>
                </div>

                <div class="contact">
                    <h5>Liên hệ</h5>
                    <p>Email: <strong>huynhnhule2004@gmail.com</strong></p>
                    <a href="mailto:huynhnhule2004@gmail.com" class="btn btn-primary">Gửi Email</a>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('assets/client/vendor/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}">


</body>
</html>