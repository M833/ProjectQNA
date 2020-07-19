<?php $this->load->view("adminpanel/header"); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


    <h2>Dashboard</h2>


    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Q no</th>
                    <th>posted by:</th>
                    <th>Question</th>
                    <th>Add answer </th>
                </tr>
            </thead>

            <?php
            if ($result) {
                $counter = 1;
                foreach ($result as $key => $value) {
                    echo "<tr>

                    <form action=doaddanswer method='post'>
                     <td>" . $counter . "</td>
                    <td>" . $value['first_name'] . "</td>
                    <td>" . $value['question'] . "</td>
             
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


</div>
</div>
<?php $this->load->view('adminpanel/footer'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>