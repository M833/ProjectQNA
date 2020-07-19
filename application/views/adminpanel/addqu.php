<?php $this->load->view("adminpanel/header"); ?>

<script text="text/javascrpit">
    function validateForm() {

        if (document.forms['addform']['question'].value == "") {
            alert("please enter a valid question");
            return false;
        }

    }
</script>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


    <h2>ADD Question!</h2>


    <form name="addform" enctype="multipart/form-data" action="<?= base_url() . 'admin/dashboard/addqu_post' ?>" method="post" onsubmit="return validateForm()">


        <div class=" form-group">
            <textarea class="form-control" name="question" placeholder="What's on your mind?"></textarea>
        </div>

        <button type="submit" class="btn btn-primary"> Add Question </button>
    </form>
</main>
</div>
</div>
<?php $this->load->view('adminpanel/footer'); ?>

<script type="text/javascript">
    <?php
    if (isset($_SESSION['inserted'])) {
        if ($_SESSION['inserted'] == "yes") {
            # code...
            echo "alert('Data Inserted Successfully!');";
        } else {
            echo "alert('Not Inserted!');";
        }
    }
    ?>
</script>