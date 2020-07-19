<?php $this->load->view("adminpanel/header"); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


    <h2>View Users!</h2>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>User</th>
                <th>Action</th>
            </tr>
        </thead>
        <div id="userlistbox">

            <ul class="userlist">
                <?php foreach ($backenduser as $user) {
                    echo "<tr>
                <td>  <a href=" . base_url() . "admin/dashboard/edituser?id=$user->uid><li>$user->first_name</li></a></td>
                <td><a class=\"btn delete btn-danger\" href='#.' data-id= $user->uid>Delete User</a></td>

                </tr>";
                }
                ?>
            </ul>
</main>
</div>
</div>
<?php $this->load->view('adminpanel/footer'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(".delete").click(function() {

        var delete_id = $(this).attr('data-id');

        var bool = confirm('Are you Sure you want to delete this user forever?');
        console.log(bool);

        if (bool) {
            //alert("Move to delete functionality using AJAX");

            $.ajax({
                url: '<?= base_url() . 'admin/dashboard/deleteuser/' ?>',
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
            alert("Your users is Safe");

        }
    });
</script>