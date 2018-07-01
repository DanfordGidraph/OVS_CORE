<?php
session_start();
if(!isset($_SESSION['student_id'])){
    header('Location: http://ovs-core.zaidimarvels.co.ke/', true, 301);
	exit();
}
// echo json_encode($_SESSION);
$user_name = $_SESSION['student_name'];
$user_email = $_SESSION['student_email'];
$password = $_SESSION['firebase_pass'];
$user_id = $_SESSION['student_id'];
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

    <!-- Slick Carousel  -->
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/vote.css" rel="stylesheet" />
    <link href="assets/css/preliminary-vote.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" id="colorChanger" data-color="purple" data-image="assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="home.php" class="simple-text">
                        O.V.S Core
                    </a>
                </div>

                <ul class="nav">
                    <li>
                        <a href="home.php">
                            <i class="pe-7s-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            <i class="pe-7s-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="delegates.php">
                            <i class="pe-7s-users"></i>
                            <p>Delegates</p>
                        </a>
                    </li>
                    <li >
                        <a href="candidates.php">
                            <i class="fa fa-lg fa-users"></i>
                            <p>Candidates</p>
                        </a>
                    </li>
                    <li>
                        <a href="vote-delegates.php">
                            <i class="pe-7s-box1"></i>
                            <p>Start Voting</p>
                        </a>
                    </li>
                    <li>
                        <a href="message-delegates.php">
                            <i class="pe-7s-mail-open-file"></i>
                            <p>Message Delegate</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="preliminary-voting.php">
                            <i class="fa fa-calendar fa-lg"></i>
                            <p>Preliminary Voting</p>
                        </a>
                    </li>
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
                                <button class="btn btn-danger" onclick="javascript:logoutUser()">
                                    <p><i class="pe-7s-power"></i>Log out</p>
                                </button>
                            </li>
                            <li class="separator hidden-lg"></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div style="background: url('assets/img/main_background.jpg');background-size:cover;" class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div id="delegates_details" style="margin-right:10px;z-index:10" class="card">
                            <div id="slick-carousel">

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
                                <a href="home.php">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="http://ovs-core.zaidimarvels.co.ke.co.ke/">
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

<!-- slick Carousel Plugin -->
<script src="assets/js/slick.min.js" type="text/javascript"></script>
<!-- readmore Plugin -->
<script src="assets/js/readmore.min.js" type="text/javascript"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

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
    var databaseRef = firebaseRef.database()

    $(document).ready(function () {
      $('#slick-carousel').empty()
      retrieveDelegates()
    })
    function retrieveDelegates(){
      sendNoteSuccess('top','left','info','Fetching the delegates. Be Patient',5000)
      $('#slick-carousel').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          easing:'swing',
      })
      var total_prem_votes = 0;
      databaseRef.ref('totals_candidates_preliminary/counter/').once('value',(snap)=>{
        total_prem_votes = snap.val() || 0
      })
      databaseRef.ref('candidate_students/').once('value',(snapshot)=>{
          if(snapshot){
            var candidatesObj = snapshot.val()
            $('#slick-carousel').slick('unslick')
            Object.keys(candidatesObj).forEach((candidate_key)=>{
              var currentCand = candidatesObj[candidate_key]
              // console.log(currentCand);
              var likes = currentCand.likes.counter || 0
              var premVotes = currentCand.preliminary_votes.counter || 0
              var percent = (premVotes/total_prem_votes) * 100
              var carouselElem = '<div>'+
                                    '<div style="display:flex;flex-direction:column" class="delegate-card">'+
                                        '<div style="display:flex;flex-direction:row;">'+
                                          '<div style="flex:8;" class=" del-container">'+
                                              '<a href="#">'+
                                                  '<img src="'+currentCand.profile_photo+'" alt="cover" class="cover img-circle" style="border:3px white solid" />'+
                                              '</a>'+
                                              '<div class="back-cover">'+
                                                  '<div class="details">'+
                                                      '<div class="titles" style="flex:6">'+
                                                          '<div class="title1">'+currentCand.full_name+'</div>'+
                                                          '<div class="title2"> Vying for: '+currentCand.vying_position+' </div>'+
                                                      '</div>'+
                                                  '</div>'+
                                              '</div>'+
                                              '<div class="about-delegate row">'+
                                                  '<div style="padding-top:2.5%;" class="col-lg-3 col-sm-12">'+
                                                      '<div style="display:flex; flex-direction:row">'+
                                                        '<div class="btn btn-primary " style="flex:1" data="'+candidate_key+'" onclick="javascript:like(this)">'+
                                                            'Like  '+
                                                            '<i class="fa fa-thumbs-up fa-lg"></i>'+
                                                        '</div>'+

                                                      '</div>'+
                                                  '</div>'+

                                                  '<div style="padding:5px" class="col-lg-8 col-sm-12 text ellipsis" >'+
                                                      '<span  class="article text-concat">'+currentCand.about_candidate+'</span>'+
                                                  '</div>'+
                                              '</div>'+
                                          '</div>'+
                                          '<div style="flex:2;display:flex;flex-direction:column;">'+
                                              '<div style="flex:1;margin-top:-30px;" >'+
                                                  '<button style="width:75%;margin-left:12%" type="button" class="btn btn-success ribbon">Preliminary Votes</button>'+
                                                  '<div style="padding-left:15%" >'+
                                                    '<h3 class="text text-success" style="margin-left:20%;font-size:30px" > '+premVotes+'</h3>'+
                                                  '<i style="margin-left:30%;color:#398439" class="info fa fa-archive fa-4x"></i>'+
                                                  '</div>'+
                                              '</div>'+
                                              '<div style="flex:1;margin-top:-15px;" >'+
                                                  '<button style="width:75%;margin-left:12%;" type="button" class="btn btn-info ribbon">Percentage</button>'+
                                                  '<div style="padding-left:15%" >'+
                                                    '<h3 class="text text-info" style="margin-left:10%;font-size:30px" > '+percent.toFixed(2) +' %</h3>'+
                                                  '<i style="margin-left:30%;color:#53dab6;font-size:50px;" class="pe-7s-display1"></i>'+
                                                  '</div>'+
                                              '</div>'+
                                              '<div style="flex:1;margin-top:-15px;" >'+
                                                  '<button style="width:75%;margin-left:12%;" type="button" class="btn btn-primary ribbon">Likes</button>'+
                                                  '<div style="padding-left:15%" >'+
                                                    '<h3 class="text text-primary" style="margin-left:20%;font-size:30px;" > '+likes+'</h3>'+
                                                  '<i style="margin-left:30%;color:#2e6da4" class="fa fa-thumbs-up fa-4x"></i>'+
                                                  '</div>'+
                                              '</div>'+

                                          '</div>'+
                                        '</div>'+
                                        '<div style="padding-left:5%" class="row">'+
                                            '<div class="col-lg-4 col-sm-4 col-md-4" >'+
                                                '<div class="btn btn-primary previous" onclick="javascript:goPrev()" >'+
                                                    '<i class="fa fa-arrow-left fa-lg"></i>'+
                                                    'Previous'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-lg-4 col-sm-4 col-md-4" >'+

                                            '</div>'+
                                            '<div class="col-lg-4 col-sm-4 col-md-4" >'+
                                                '<div class="btn btn-success nexter" onclick="javascript:goNext()">'+
                                                    'Next'+
                                                    '<i class="fa fa-arrow-right fa-lg"></i>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+

                                '</div>'

              $('#slick-carousel').append($.parseHTML($.trim(carouselElem)))
            })
            $('#slick-carousel').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                easing:'swing',
            })
          }else{
            sendNoteError('top','right','danger','There are no matching details in Firebase',4000)
          }
      }).catch((err)=>{
          sendNoteError('top','right','danger','Firebase Error: '+err.message,5000)
      })

    }
    function goNext() {
        $("#slick-carousel").slick('slickNext');
    }
    function goPrev() {
        $("#slick-carousel").slick('slickPrev');
    }
    function message(){
      window.location.href = 'http://ovs-core.zaidimarvels.co.ke/students/message-delegates.php'
    }
    function like(elem){
      var key = elem.getAttribute('data')
      console.log(key);
      var likesPath = 'candidate_students/'+key.toString()+'/likes/'
      var candidatePath = 'candidate_students/'+key.toString()+'/'
      databaseRef.ref(likesPath).once('value',(snap)=>{
          var likesObj = snap.val()
          if(likesObj){
            var currentLikes = likesObj.counter
            databaseRef.ref(likesPath).update({
              counter: currentLikes+1,
            }).then(()=>{
              sendNoteSuccess('top','left','success','Thanks for liking: ',1000)
            }).catch((err)=>{
              sendNoteError('top','right','danger','Firebase liking Error: '+err.message,5000)
            })
          }else{
            databaseRef.ref(candidatePath).update({
              likes:{
                counter:1
              }
            }).then(()=>{
              sendNoteSuccess('top','left','success','Thanks for liking: ',5000)
            }).catch((err)=>{
              sendNoteError('top','right','danger','Firebase liking Error: '+err.message,5000)
            })
          }
      }).catch((err)=>{
          sendNoteError('top','right','danger','Firebase likes Error: '+err.message,5000)
      })
    }

    let changeColor = (color) => {
        let elem = document.getElementById('colorChanger')
        elem.setAttribute('data-color', color)
    }


    function voteDelegate(elem){

    }

    var clearSelection = () => {

    }

</script>
<!--  logout script   -->
<script src="assets/js/logout.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- main script for whole site -->
<script src="assets/js/ovs.js"></script>
</html>
