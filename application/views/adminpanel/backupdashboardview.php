<?php $this->load->view("adminpanel/header"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <style>
        .hide {

            visibility: hidden
        }
    </style>
</head>

<script text="text/javascrpit">
    function validateForm() {

        if (document.forms['addform']['addanswer'].value == "") {
            alert("please enter a valid answer");
            return false;
        }

    }
</script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


    <h2>Dashboard</h2>


    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Q no</th>
                    <th>posted by:</th>
                    <th>Question</th>
                    <th>answered by:</th>
                    <th>answer</th>
                    <th>Add answer </th>
                </tr>
            </thead>

            <?php
            if ($result) {
                $counter = 1;
                foreach ($result as $key => $value) {
                    echo "<tr>

                    <form name='addform' action=dashboard/doaddanswer method='post' onsubmit='return validateForm()'>
                     <td>" . $counter . "</td>
                    <td>" . $value['user_posted'] . "</td>
                    <td>" . $value['question'] . "</td>
                    <td>" . $value['user'] . "</td> 
                    <td>" . $value['answer'] . "</td>
        
                    <td>                    
                    <div>
                    <input type='text' name='addanswer' placeholder='Add Answer'>
                    
                    <button type='submit' class='btn btn-success'>Add answer</button> </div></td> 
                    <input type='hidden' name='qid' value=$value[qid]>

</form>
                    </tr>";

                    $counter++;
                }
            } else {
                echo "<tr><td colspan='6'>No questions found</td><tr>";
            }

            ?>

        </table>
    </div>

</main>

</html>
<?php $this->load->view('adminpanel/footer'); ?>