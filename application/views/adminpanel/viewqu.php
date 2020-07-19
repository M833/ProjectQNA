<?php $this->load->view("adminpanel/header"); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


    <h2>View questions!</h2>


    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>question</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <?php
            if ($result) {
                $counter = 1;
                foreach ($result as $key => $value) {
                    echo "<tr>
                    <td>" . $counter . "</td>
                    <td>" . $value['question'] . "</td>
                    <td><a class=\"btn btn-info\" href='" . base_url() . 'admin/dashboard/editqu/' . $value['qid'] . "'>Edit</a></td>
                    
                    <td><a class=\"btn delete btn-danger\" href='#.' data-id='" . $value['qid'] . "'>Delete</a></td>
                    </tr>";

                    $counter++;
                }
            } else {
                echo "<tr><td colspan='6'>No Records found</td><tr>";
            }

            ?>

        </table>
    </div>

</main>
</div>
</div>
<?php $this->load->view('adminpanel/footer'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(".delete").click(function() {

        var delete_id = $(this).attr('data-id');

        var bool = confirm('Are you Sure you want to delete this question forever?');
        console.log(bool);

        if (bool) {
            //alert("Move to delete functionality using AJAX");

            $.ajax({
                url: '<?= base_url() . 'admin/dashboard/deletequ/' ?>',
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
            alert("Your questions are Safe");

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