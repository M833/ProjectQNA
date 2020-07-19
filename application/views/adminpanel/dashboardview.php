<?php $this->load->view("adminpanel/header"); ?>

<!DOCTYPE html>
<html lang="en">



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<style>
    .comment-main {
        background-color: #74C2E1;
        box-shadow: 1px 2px 6px 2px #005B9A;
    }

    .comment-main ul {
        list-style: none;
    }

    .sub-cmt-img {
        width: 55px !important;
        height: 55px !important;
        border-radius: 50%;
    }

    .main-cmt-img {
        width: 40px !important;
        height: 40px !important;
        border-radius: 50%;
    }

    .border-bottom {
        font-size: 13px;
        border-bottom: 1px solid #d3d3d3;
    }

    .user-comment {
        background-color: #f3f3f3 !important;
        box-shadow: 0px 5px 8px -4px #c1c1c1;
    }

    .user-comment-desc,
    .user-comment span {
        color: #a0a0a0;
    }

    .user-comment-desc p {
        font-size: 12px;
        display: inline-block;
        float: left;
    }

    .send-icon i {
        font-size: 20px;
        background: #f3f3f3;
        padding: 6px 5px;
        border-radius: 50%;
        color: #74C2E1;
        height: 35px;
        width: 35px;
    }

    .user-comment:before {
        content: "";
        height: 0;
        width: 0;
        top: 0;
        left: -10px;
        position: absolute;
        border-style: solid;
        border-width: 13px 0 0 13px;
        border-color: #f3f3f3 transparent transparent transparent;
    }

    #voting {
        width: 30px;
        height: 40px;
    }

    #aupvote {
        width: 30px;
        height: 20px;
        cursor: pointer;

    }

    #adownvote {
        width: 30px;
        height: 20px;
        background: url('downvote.jpg') 0 0 no-repeat;
        cursor: pointer;
    }
</style>



<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <h2>View Questions!</h2>

    <?php
    if ($result) {
        foreach ($result as $key => $value) {
            echo ' 
                    </tr>

                    <div>
                        <ul class="p-0">
                            <li>
                
                                <div class="row comment-box p-1 pt-3 pr-4">
                                    <div class="col-lg-2 col-3 user-img text-center">
                                    ' . $value['first_name'] . ' </div>
                                    <div class="col-lg-10 col-9 user-comment bg-light rounded pb-1">
                                        <div class="row">
                                            <div class=/"col-lg-8 col-6 border-bottom pr-0/">  '  . $value['question'] . '
                                                <p class="w-100 p-2 m-0"></p>
                                            </div>
                                            <div class="col-lg-4 col-6 border-bottom">
                                                <p class="w-100 p-2 m-0"><span class="float-right"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>' . $value['created_on'] . '</span></p>
                                            </div>
                                        </div>
                                        <div class="user-comment-desc p-1 pl-2">
                                            <p class="m-0 mr-2"><span><i class="fa fa-thumbs-up mr-1" aria-hidden="true"></i></span></i>490</p>
                                            <p class="m-0 mr-2"><span><i class="fa fa-thumbs-down mr-1" aria-hidden="true"></i></span></i>450</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-11 offset-lg-1">
                                        <ul class="p-0">
                                        
                                                <div class="row comment-box p-1 pt-2 pr-4">
                                                    <div class="col-lg-3 col-3 user-img"> User
                                                    </div>
                                                    <div class="col-lg-9 col-9 user-comment bg-light rounded pb-1 mt-2">
                                                        <div class="row">
                                                            <div class="col-lg-7 col-6 border-bottom pr-0">
                                                                <p class="w-100 p-2 m-0">" . $value["answer"] . "</p>
                                                            </div>
                                                            <div class="col-lg-5 col-6 border-bottom">
                                                                <p class="w-100 p-2 m-0"><span class="float-right"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>" . $value["acreated_on"] . "</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="user-comment-desc p-1 pl-2">
                                                        <input type="hidden" name="uid" value="<?= $uid ?>">

                                                           <a href="<?= base_url() . "admin/dashboard/vote" ?>" <p class="m-0 mr-2"><span><i class="fa fa-thumbs-up mr-1" aria-hidden="true"></i></span></i>" . $value["aupvote"] . "</p>></a>
                                                           <a href="<?= base_url() . "admin/dashboard/vote" ?> <p class="m-0 mr-2"><span><i class="fa fa-thumbs-down mr-1" aria-hidden="true"></i></span></i>"" . $value["aupvote"] . "</p></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        }
                                        </ul> 
                                    </div>
                                </div>
                
                                <hr>
                                <div class="row" method="post">
                                    <div class="col-lg-10 col-10">
                                        <input type="text" class="form-control" placeholder="write comments ...">
                                    </div>
                                    <div class="col-lg-2 col-2 send-icon">
                                        <a><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                        </ul>
                    </div>

       
                
                    </tr>';
        }
    } else {
        echo "<tr><td colspan='6'>No Records found</td><tr>";
    }

    ?>

</main>

<body></body>

</html>
<?php $this->load->view('adminpanel/footer'); ?>
<script type="text/javascript">
    var likes = $value['aupvote'];
    var dislikes = $value['adownvote'];

    function like() {
        alert("Liked");
        likes += 1;
        document.getElementById("likes").innerHTML = likes;
    }

    function dislike() {
        alert("Disliked");
        dislikes += 1;
        document.getElementById("dislikes").innerHTML = dislikes;
    }
</script>