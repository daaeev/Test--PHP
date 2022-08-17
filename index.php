<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body style="background: #e8e8e8">

<div class="container">
    <div class="row justify-content-center">
        <div class="form-container bg-light rounded py-3 px-5 col-7" style="margin-top: 50px">
            <p class="h3 text-center">Authorize</p>

            <div class="alert alert-success d-none" id="auth-success">
                Вы успешно авторизовались!
            </div>

            <div id="auth-errors" class="alert alert-danger d-none">
                <ul class="m-0" id="errors-list"></ul>
            </div>

            <form id="auth-form">
                <div class="form-group pb-3">
                    <label>First name</label>
                    <input type="text" class="form-control" placeholder="Your first name" name="first_name">
                </div>

                <div class="form-group pb-3">
                    <label>Last name</label>
                    <input type="text" class="form-control" placeholder="Your last name" name="last_name">
                </div>

                <div class="form-group pb-3">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" placeholder="Your email" name="email">
                </div>

                <div class="form-group pb-3">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" placeholder="Your password" name="password">
                </div>

                <div class="form-group pb-3">
                    <label>Confirm password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
                </div>

                <button type="submit" class="btn btn-success w-100 fw-bold">Authorize</button>
            </form>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
<script src="./js/app.js"></script>

</body>
</html>