<?php
include('../Controllers/signupcontroller.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register as an Agent</title>

    <?php include '../Includes/metatags.php'; ?>

    <link rel="stylesheet" href="../Resources/css/signup.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/loader.css">
    <link rel="stylesheet" type="text/css" href="../Resources/css/email.css">
</head>

<body id="body" onload="load()">
    <div id="lds-facebook">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <main>
        <div class="newpostheader">
            <span onclick="history.back()"><i class="fa fa-arrow-left"></i></a></span>
            <h> Agent Registration </h>
        </div>

        <div class="container">

            <div class="sub-container">

                <div class="logobox">
                    <div class="sub-logo">
                        <p class="logoo">Agent Registration</p>
                    </div>
                </div>


                <div class="login-details">
                    <form action="#">
                        <div class="error"></div><br>


                        <div class="images">
                            <label for="productImage">Upload your passport</label>
                            <div id="upload">
                                <img src="" onClick="trigger()" id="profileDisplay">
                                <input type="file" name="product_image" onchange="displayImage(this)" id="capture" style="display:none">
                                <i class="fa fa-camera" id="camera"></i>
                            </div> <br>

                            <label for="identiyCard">Upload a identity card (it could be your driver's license,voter's card e.t.c) </label>
                            <div id="uploadb">
                                <img src="" onClick="triggerb()" id="profileDisplayb">
                                <input type="file" name="product_image" onchange="displayImageb(this)" id="captureb" style="display:none;border:1px solid red;">
                                <i class="fa fa-camera" id="camerab"></i>
                            </div>
                        </div>

                        <div class="inputbox-details">
                            <label for="productDescription">Product description</label>
                            <textarea id="descid" name="product_description" class="description" placeholder="Product description" autofocus value=" "></textarea>
                        </div>

                        <input type="hidden" name="action" value="first_reg">
                        <div class="others-field">
                            <button type="submit" class="btn" name="register">Sign up</button>
                        </div>

                </div>

                </form>
            </div>
        </div>
        </div>
    </main>



</body>
<script src="../Resources/js/loader.js"></script>
<script src="../Resources/js/validatephone.js"></script>
<script type="text/javascript">
    //const form=document.querySelector("");

    function trigger(e) {
        document.querySelector("#capture").click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    function triggerb(e) {
        document.querySelector("#captureb").click();
    }

    function displayImageb(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplayb').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    const form = document.querySelector("form");
    const btn = document.querySelector("button");
    const error = document.querySelector(".error");

    form.onsubmit = (e) => {
        e.preventDefault();
    }

    btn.onclick = () => {

        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;

                    if (data === "success") {
                        //    error.textContent=data;
                        location.href = "identity.php";
                    } else {
                        error.textContent = data;
                        error.style.display = "block";
                        btn.innerHTML = "Sign up again";
                        btn.style.fontSize = "0.8em";
                    }
                } //status

            } else {
                btn.innerHTML = '<i class="fa fa-spinner fa-pulse"></i>';
                btn.style.color = "white";
                btn.style.fontSize = "1.2em";
            }
        }

        xhr.open("POST", "../Controllers/signupcontroller.php", true);
        let formdata = new FormData(form);
        xhr.send(formdata);





    }
</script>

</html>