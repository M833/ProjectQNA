<?php $this->load->view("adminpanel/header"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <main>
        <table class="table table-striped table-sm">
            <?php
            if (isset($question)) {
                if (count($question) == 0) {
                    echo "no results found";
                } else {
                    echo ' <thead>
                <tr>
                    <th>posted by:</th>
                    <th>Question</th>
                    <th>answered by:</th>
                    <th>answer</th>
                </tr>
            </thead>
';


                    foreach ($question as $s) {

                        echo '<div class="divTableRow">';
                        echo '<td><div class="divTableCell">' . $s->user_posted . '</div> </td>';
                        echo '<td><div class="divTableCell">' . $s->question . '</div> </td>';
                        echo '<td><div class="divTableCell">' . $s->user . '</div> </td>';
                        echo '<td><div class="divTableCell">' . $s->answer . '</div> </td>';



                        echo '</div>';
                    }
                    echo "</div></div>";
                }
            }
            ?>

    </main>
    </table>

</html>
<?php $this->load->view('adminpanel/footer'); ?>