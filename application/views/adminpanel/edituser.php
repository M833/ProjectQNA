<?php $this->load->view("adminpanel/header"); ?>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <script type="text/javascript">
        function validateForm() {
            if (document.forms['edituser']['firstname'].value == "") {
                alert("please enter the first name");
                return false;
            }
            if (document.forms['edituser']['lastname'].value == "") {
                alert("please enter the last name");
                return false;
            }
            if (document.forms['edituser']['email'].value == "") {
                alert("please enter an email");
                return false;
            }
            if (document.forms['edituser']['occupation'].value == "") {
                alert("enter an occupation");
                return false;
            }
            if (document.forms['edituser']['password'].value == "") {
                alert("enter a password");
                return false;
            }
            if (document.forms['edituser']['repeatpassword'].value == "") {
                alert("please confirm your password");
                return false;
            }
            if (document.forms['edituser']['password'].value != document.forms['edituser']['repeatpassword'].value) {
                alert("password and repeat password don't match");
                return false;
            }

        }
    </script>

    <h1>Edit User</h1>

    <div class="loginbox">

        <form id="adduserform" name="edituser" action="<?php echo base_url(); ?>admin/dashboard/doedituser" method="post" onsubmit="return validateForm()">

            <div class="m-b-30">
                <div class="form-group" name="status">
                    <label for="option1">suspend</label>
                    <input id="option1" type="radio" name="radiobt" value="0" <?= $userinfo->status == "0" ? "selected" : ""; ?> class="radio-switch">
                </div>
                <div class="form-group">
                    <label for="option2">Unsuspend</label>
                    <input id="option2" type="radio" name="radiobt" value="1" <?= $userinfo->status == "1" ? "selected" : ""; ?> class="radio-switch">
                </div>

            </div>
            <br>

            <label for="uname">First Name</label><br>
            <input type="hidden" name="uid" value="<?php echo $userinfo->uid ?>">
            <input type="text" id="usernameid" name="firstname" value="<?php echo $userinfo->first_name ?>"><br>

            <label for="uname">Last Name</label><br>
            <input type="text" id="usernameid" name="lastname" value="<?php echo $userinfo->last_name ?>"><br>

            <label for="uname">Email</label><br>
            <input type="text" id="emailid" name="email" value="<?php echo $userinfo->email ?>"><br>

            <label for="uname">occupation</label><br>
            <input type="text" id="occupationid" name="occupation" value="<?php echo $userinfo->occupation ?>"><br>
            <label for="uname">date of birth</label><br>
            <input type="date" id="birthid" name="birth" value="<?php echo $userinfo->birth ?>"><br>

            <label for="lname">Password</label><br>
            <input type="password" id="passwordid" name="password" value="<?php echo $userinfo->password ?>"><br>
            <label for="lname">Repeat Password</label><br>
            <input type="password" id="repeatpasswordid" name="repeatpassword" value="<?php echo $userinfo->password ?>"><br>
            <button type='submit' class='btn btn-success'>Edit User</button>
    </div>
    </td>
    </form>
    </div>
</main>
</div>
</div>
<?php $this->load->view('adminpanel/footer'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(".delete").click(function() {

        var delete_id = $(this).attr('data-id');

        var bool = confirm('Are you Sure you want to delete the blog forever?');
        console.log(bool);

        if (bool) {
            //alert("Move to delete functionality using AJAX");

            $.ajax({
                url: '<?= base_url() . 'admin/blog/deletequ/' ?>',
                type: 'post',
                data: {
                    'delete_id': delete_id
                },
                success: function(response) {
                    console.log(response);
                    if (response == "deleted") {
                        location.reload();
                    } else if (response == "notdeleted") {
                        alert("Something went wrong!");
                    }
                }
            });
        } else {
            alert("Your Blog is Safe");

        }
    });
    <?php


    if (isset($_SESSION['updated'])) {
        if ($_SESSION['updated'] == "yes") {
            echo 'alert("Data has been updated!");';
        } else if ($_SESSION['updated'] == "no") {
            echo 'alert("Some error occurred & data not updated!");';
        }
    }
    ?>
</script>