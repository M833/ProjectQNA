<?php $this->load->view("adminpanel/header"); ?>
<script text="text/javascrpit">
    function validateForm() {

        if (document.forms['addform']['question'].value == "") {
            alert("please enter a valid data");
            return false;
        }

    }
</script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


    <h2>Edit question!</h2>

    <form name="addform" enctype="multipart/form-data" action="<?= base_url() . 'admin/dashboard/editqu_post' ?>" method="post" onsubmit="return validateForm()">


        <div class="m-b-30">
            <div class="form-group" name="publish_unpublish">
                <label for="option1">Publish</label>
                <input id="option1" type="radio" name="radiobt" value="1" <?= ($result[0]['status'] == "1" ? "selected" : ""); ?> class="radio-switch">
            </div>
            <div class="form-group">
                <label for="option2">Unpublish</label>
                <input id="option2" type="radio" name="radiobt" value="0" <?= ($result[0]['status'] == "0" ? "selected" : ""); ?> class="radio-switch">
            </div>

        </div>
        <br>
        <input type="hidden" name="qid" value="<?= $qid ?>">
        <div class="form-group" style="margin-top: 10px;">
            <textarea type="text" class="form-control" name="question" placeholder="what do you want to ask?"><?= $result[0]['question'] ?></textarea>
        </div>


        <button type="submit" class="btn btn-primary"> Edit Question </button>
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