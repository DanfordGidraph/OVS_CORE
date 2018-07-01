<?php
session_start();
if(!isset($_SESSION['candidate_id'])){
    header('Location: http://ovs-core.zaidimarvels.co.ke/', true, 301);
	exit();
}else if($_SESSION['profile'] != 'complete'){
    header('Location: http://ovs-core.zaidimarvels.co.ke/candidates/complete-profile.php', true, 301);
	exit();
}
// echo json_encode($_SESSION);
include_once('assets/php/vendor/Unirest.php');
$user_name = $_SESSION['candidate_name'];
$user_email = $_SESSION['candidate_email'];
$password = $_SESSION['firebase_pass'];
$user_id = $_SESSION['candidate_id'];
$user_reg = $_SESSION['candidate_reg'];
$user_school = $_SESSION['candidate_school'];
$json = Unirest\Request::post("https://andruxnet-random-famous-quotes.p.mashape.com/?cat=famous",
  array(
    "X-Mashape-Key" => "wK0n0U0lmqmshL5zYIuwMYQsIRrCp1zH6ltjsnx871O0m0bni6",
    "Content-Type" => "application/x-www-form-urlencoded",
    "Accept" => "application/json"
  )
);

$quotable = $json->body->quote;
$author = $json->body->author;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Online Voting System</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/profile.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="home.php" class="simple-text">
                        O.V.S Core
                    </a>
                </div>

                <ul class="nav">
                    <li >
                        <a href="home.php">
                            <i class="pe-7s-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="profile.php">
                            <i class="pe-7s-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li  >
                        <a href="candidates.php">
                            <i class="pe-7s-users"></i>
                            <p>Candidates</p>
                        </a>
                    </li>
                    <li>
                        <a href="chat-delegates.php">
                            <i class="pe-7s-chat"></i>
                            <p>Chatroom</p>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="vote-candidates.php">
                            <i class="pe-7s-box1"></i>
                            <p>Start Voting</p>
                        </a>
                    </li> -->

                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav style="background-color:#101010" class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a style="color:white" class="navbar-brand" href="#">
                            <i class="pe-7s-study"></i>Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-info" data-toggle="dropdown">
                                    <p>
                                        Theme
                                        <b class="caret"></b>
                                    </p>

                                </a>
                                <ul class="dropdown-menu" style=" background:#101010; min-width:150px; max-width:150px; display:flex; flex-direction:column;">
                                    <li style="flex:1; margin-bottom: -10px;" class="btn btn-sm btn-primary" onclick="javascript:changeColor('blue')">
                                        <p>
                                            <i class="pe-7s-drop"></i>
                                            Blue
                                        </p>
                                    </li>
                                    <li style="flex:1; margin-bottom: -10px;" class="btn btn-sm btn-success" onclick="javascript:changeColor('green')">
                                        <p>
                                            <i class="pe-7s-drop"></i>
                                            Green
                                        </p>
                                    </li>
                                    <li style="flex:1; margin-bottom: -10px;" class="btn btn-sm btn-info" onclick="javascript:changeColor('azure')">
                                        <p>
                                            <i class="pe-7s-drop"></i>
                                            Azure
                                        </p>
                                    </li>
                                    <li style="flex:1; margin-bottom: -10px;" class="btn btn-sm btn-warning" onclick="javascript:changeColor('orange')">
                                        <p>
                                            <i class="pe-7s-drop"></i>
                                            Orange
                                        </p>
                                    </li>
                                    <li style="flex:1;" class="btn btn-sm btn-danger" onclick="javascript:changeColor('red')">
                                        <p>
                                            <i class="pe-7s-drop"></i>
                                            Red
                                        </p>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <button class="btn btn-danger"  onclick="javascript:logoutUser()">
                                    <p>
                                        <i class="pe-7s-power"></i>Log out</p>
                                </button>
                            </li>
                            <li class="separator hidden-lg"></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div id="content" class="content">
                <div class="container-fluid">
                    <div class="row">

                          <div class="col-sm-12 col-md-8" id="details_col">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Your Profile</h4>
                                    </div>
                                    <div class="content">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Registration Number</label>
                                                        <input type="text" readonly class="form-control" placeholder="Registration Number" value="<?php echo $user_reg; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email Address</label>
                                                        <input type="email" readonly value="<?php echo $user_email; ?>" class="form-control" placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control" readonly placeholder="Company" value="<?php echo $user_name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>School</label>
                                                      <input type="text" class="form-control" placeholder="Home Address" readonly value="<?php echo $user_school; ?>">
                                                  </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                  <label for="skills_input">Skills</label>
                                                  <input class="form-control incomplete" type="text" name="skills_input" id="skills_input"  value="">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>About Me</label>
                                                        <textarea id="about_me"  class="form-control" name="message" rows="8" style="margin-bottom:10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" name="edit-profile-btn" class="btn btn-xl btn-primary pull-right"
                                              onclick="javascript:saveProfileEdits()">Save Edits
                                              <i class="fa fa-save fa-lg" ></i>
                                            </button>
                                        </form>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="card card-user">
                                <div class="image">
                                    <img src="assets/img/card_bg.jpg" alt="..." />
                                </div>
                                <div class="content">
                                    <div class="author">
                                        <a href="#">
                                            <img id="avatar-img" class="avatar border-gray" style="width:250px;height:250px" src="" alt="..." />

                                            <h4 class="title"><?php echo $user_name; ?>
                                            <br />
                                            </h4>
                                            <h5 id="aspiring-pos" ><br/></h5>

                                        </a>
                                    </div>
                                    <p class="description text-center"> <?php echo $quotable; ?>
                                    </p>
                                    <small class="text-center"><?php echo $author; ?></small>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Online Voting System
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        Powered by &copy;
                        <a href="http://www.ovs-core.zaidimarvels.co.ke">ZaidiMarvels</a>
                        <script>document.write(new Date().getFullYear())</script>, Elegant Web Solutions
                    </p>
                </div>
            </footer>

        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  logout script   -->
<script src="assets/js/logout.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<script src="https://www.gstatic.com/firebasejs/4.10.0/firebase.js"></script>

<script type="text/javascript">
// Initialize Firebase
    var databaseConfig = {
    apiKey: "AIzaSyDf6TwRt1WQf6TdJaBjRT69b9xseZmoFJg",
    authDomain: "onlinevotersys.firebaseapp.com",
    databaseURL: "https://onlinevotersys.firebaseio.com",
    projectId: "onlinevotersys",
    storageBucket: "onlinevotersys.appspot.com",
    messagingSenderId: "473955500102"
    }
    var firebaseRef = firebase.initializeApp(databaseConfig)
    var database = firebaseRef.database()
    String.prototype.capitalize = function(){
       return this.replace( /(^|\s)([a-z])/g , function(m,p1,p2){ return p1+p2.toUpperCase(); } );
    };
    $(document).ready(()=>{
      database.ref('candidate_students/'+"<?php echo $user_id; ?>"+'/about_candidate/').on('value',(snap)=>{
        if(snap.val()){
          var about = snap.val()
          $('#about_me').append(about)
        }
      })
      database.ref('candidate_students/'+"<?php echo $user_id; ?>"+'/candidate_skills/').on('value',(snap)=>{
        if(snap.val()){
          var skills = snap.val()
          $('#skills_input').attr('value',skills)
        }
      })
      database.ref('candidate_students/'+"<?php echo $user_id; ?>"+'/profile_photo/').on('value',(snap)=>{
        if(snap.val()){
          var profPic = snap.val()
          $('#avatar-img').attr('src',profPic)
        }
      })
      database.ref('candidate_students/'+"<?php echo $user_id; ?>"+'/vying_position/').on('value',(snap)=>{
        if(snap.val()){
          var position = snap.val()
          $('#aspiring-pos').append('Aspiring : '+position)
        }
      })
    })

    function saveProfileEdits() {
      var skills = document.getElementById('skills_input').value
      var about = document.getElementById('about_me').value
      if(skills != '' && about != ''){
        database.ref('candidate_students/'+"<?php echo $user_id; ?>"+'/').update({
          candidate_skills: skills,
          about_candidate: about
        }).then(()=>{
          sendNoteSuccess('top','left','info','Profile Updated Succefully',2000)
        }).catch((err)=>{
          sendNoteSuccess('top','right','danger','Sorry... Failed to update profile, Please try again.',4000)
        })
      }else {
        sendNoteSuccess('top','right','danger','The skills and about sections cannot be blank',4000)
      }
    }

</script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<!-- <script src="assets/js/ovs.js"></script> -->

</html>
