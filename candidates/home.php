<?php
session_start();
if(!isset($_SESSION['candidate_id'])){
    header('Location: http://ovs-core.zaidimarvels.co.ke/', true, 301);
	exit();
}else if($_SESSION['profile'] != 'complete'){
    header('Location: http://ovs-core.zaidimarvels.co.ke/candidates/complete-profile.php', true, 301);
	exit();
}
echo json_encode($_SESSION['profile']);
$user_name = $_SESSION['candidate_name'];
$user_email = $_SESSION['candidate_email'];
$password = $_SESSION['firebase_pass'];
$user_id = $_SESSION['candidate_id'];
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


    <!-- <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script> -->
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
    <link href="assets/css/main.css" rel="stylesheet" />


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
                    <li class="active">
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
            <nav style="background:#030303" class="navbar navbar-default navbar-fixed">
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
                                    <p style="color:white">
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


            <div style="background: url('assets/img/main_background.jpg');background-size:cover;" class="container-fluid">

                <div class="carousel fade-carousel slide" style="height:400px;width:100%" data-ride="carousel" data-interval="4000" id="bs-carousel">
                    <!-- Overlay -->
                    <div class="overlay" style="height:400px;width:100%; z-index:-1;"></div>

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#bs-carousel" data-slide-to="1"></li>
                        <li data-target="#bs-carousel" data-slide-to="2"></li>
                        <li data-target="#bs-carousel" data-slide-to="3"></li>
                        <li data-target="#bs-carousel" data-slide-to="4"></li>
                        <li data-target="#bs-carousel" data-slide-to="5"></li>
                        <li data-target="#bs-carousel" data-slide-to="6"></li>
                        <li data-target="#bs-carousel" data-slide-to="7"></li>
                        <li data-target="#bs-carousel" data-slide-to="8"></li>
                        <li data-target="#bs-carousel" data-slide-to="9"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" style="height:400px;width:100%">
                        <div class="item slides active" style="height:400px;width:100%">
                            <div class="slide-1">
                                <img src="assets/img/carousel/carousel_1.jpg" style="height:400px;width:100%" />
                            </div>
                            <div class="hero" style="z-index:20;">
                                <hgroup>
                                    <h1>Elections Convenience</h1>
                                    <h3>Get access to your ballot voice anywhere</h3>
                                </hgroup>
                            </div>
                        </div>
                        <div class="item slides " style="height:400px;width:100%">
                            <div class="slide-2">
                                <img src="assets/img/carousel/carousel_2.jpg" style="height:400px;width:100%" />
                            </div>
                            <div class="hero" style="z-index:20;">
                                <hgroup>
                                    <h1>The Big Picture</h1>
                                    <h3>There is always a plan in motion</h3>
                                </hgroup>
                            </div>
                        </div>
                        <div class="item slides " style="height:400px;width:100%">
                            <div class="slide-3">
                                <img src="assets/img/carousel/carousel_3.jpg" style="height:400px;width:100%" />
                            </div>
                            <div class="hero" style="z-index:20;">
                                <hgroup>
                                    <h1>No more queues</h1>
                                    <h3>The old is gone, the new has come</h3>
                                </hgroup>
                            </div>
                        </div>
                        <div class="item slides " style="height:400px;width:100%">
                            <div class="slide-4">
                                <img src="assets/img/carousel/carousel_4.jpg" style="height:400px;width:100%" />
                            </div>
                            <div class="hero" style="z-index:20;">
                                <hgroup>
                                    <h1>touch of a button</h1>
                                    <h3>it only takes a click to be heard</h3>
                                </hgroup>
                            </div>
                        </div>
                        <div class="item slides " style="height:400px;width:100%">
                            <div class="slide-5">
                                <img src="assets/img/carousel/carousel_5.jpg" style="height:400px;width:100%" />
                            </div>
                            <div class="hero" style="z-index:20;">
                                <hgroup>
                                    <h1></h1>
                                    <h3>everyone is capable, even you!</h3>
                                </hgroup>
                            </div>
                        </div>
                        <div class="item slides " style="height:400px;width:100%">
                            <div class="slide-6">
                                <img src="assets/img/carousel/carousel_6.jpg" style="height:400px;width:100%" />
                            </div>
                            <div class="hero" style="z-index:20;">
                                <hgroup>
                                    <h1>Making leaders</h1>
                                    <h3>a modern experience delivered to you</h3>
                                </hgroup>
                            </div>
                        </div>
                        <div class="item slides " style="height:400px;width:100%">
                            <div class="slide-7">
                                <img src="assets/img/carousel/carousel_7.jpg" style="height:400px;width:100%" />
                            </div>
                            <div class="hero" style="z-index:20;">
                                <hgroup>
                                    <h1>cast your vote</h1>
                                    <h3>yes! your future is at stake</h3>
                                </hgroup>
                            </div>
                        </div>
                        <div class="item slides " style="height:400px;width:100%">
                            <div class="slide-8">
                                <img src="assets/img/carousel/carousel_8.jpg" style="height:400px;width:100%" />
                            </div>
                            <div class="hero" style="z-index:20;">
                                <hgroup>
                                    <h1>revolutionize</h1>
                                    <h3>making the process a whole lot transparent</h3>
                                </hgroup>
                            </div>
                        </div>
                        <div class="item slides " style="height:400px;width:100%">
                            <div class="slide-9">
                                <img src="assets/img/carousel/carousel_9.jpg" style="height:400px;width:100%" />
                            </div>
                            <div class="hero" style="z-index:20;">
                                <hgroup>
                                    <h1>your vote</h1>
                                    <h3>holds leaders responsible</h3>
                                </hgroup>
                            </div>
                        </div>
                        <div class="item slides " style="height:400px;width:100%">
                            <div class="slide-10">
                                <img src="assets/img/carousel/carousel_10.jpg" style="height:400px;width:100%" />
                            </div>
                            <div class="hero" style="z-index:20;">
                                <hgroup>
                                    <h1>grab a pal</h1>
                                    <h3>show them the new way is the only way</h3>
                                </hgroup>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slick-carousel" class="" style="height:175px;width:95%;margin:auto;margin-top:10px;">

                    <button type="button" class="slick-prev">Previous</button>
                    <button type="button" class="slick-next">Next</button>
                </div>
            </div>
            <form hidden id='hiddenForm'>
            </form>

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
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js" type="text/javascript"></script>
<!--  logout script   -->
<script src="assets/js/logout.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.10.0/firebase.js"></script>
<script type="text/javascript">
    $(document).ready(()=>{
        $('#slick-carousel').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: true,
        })
    })
//Initialize Firebase
    var databaseConfig = {
    apiKey: "AIzaSyDf6TwRt1WQf6TdJaBjRT69b9xseZmoFJg",
    authDomain: "onlinevotersys.firebaseapp.com",
    databaseURL: "https://onlinevotersys.firebaseio.com",
    projectId: "onlinevotersys",
    storageBucket: "",
    messagingSenderId: "473955500102"
}
    let firebaseRef = firebase.initializeApp(databaseConfig)
    let databaseRef = firebaseRef.database()

    $(document).ready(() => {

        let email = "<?php echo $user_email; ?>"
        let pass = "<?php echo $password; ?>"
        // console.log(email + '  ' + pass)
        firebaseRef.auth().signInWithEmailAndPassword(email,pass).then(()=>{
            // sendNoteSuccess('top','left','success','Firebase Login successfuly',3000)
            setTimeout(() => {
                updateFirebaseInitial()

            }, 300);
        }).catch((err)=>{
            sendNoteError('top','right','danger','Error Loging In: '+err.message,3000)
        })
    })

    let changeColor = (color) => {
        let elem = document.getElementById('colorChanger')
        elem.setAttribute('data-color', color)
    }


function updateFirebaseInitial(){
    let user_id = "<?php echo $user_id; ?>"
    databaseRef.ref('candidate_students/'+user_id+'/').once('value',(snapshot)=>{
        if(!snapshot.val()){
            databaseRef.ref('candidate_students/'+user_id+'/').update({
                status:'online',
                likes:{counter:0},
                full_name:"<?php echo $user_name; ?>",
                voted:false,
                messages:{counter:0,message_bodies:{}},
                chats:{counter:0,chats_bodies:{}},
                votes:{counter:0,votes_bodies:{}},
                preliminary_votes: {counter:0}
            }).then(()=>{
                sendNoteSuccess('top','left','success','Details Updated successfuly',3000)
                  retrieveCandidates()
            }).catch((err)=>{
                sendNoteError('top','right','danger','Error updating: '+err.message,3000)
            })
        }else{
            // sendNoteSuccess('top','left','success','Details up to date',3000)
            retrieveCandidates()
        }
    }).catch((err)=>{
        sendNoteError('top','right','danger','Error updating: '+err.message,3000)
    })
}

    function retrieveCandidates(){
      databaseRef.ref('totals_candidates/').on('value',(snap)=>{
        if(snap.val()){
          total = snap.val().counter
          // console.log(total)
          var totalsInput = $('<input/>', {
           id: 'totals',
           'value': total,
          })
          $('#hiddenForm').append(totalsInput)
        }
      })

      databaseRef.ref('candidate_students/').on('value',(snapshot)=>{
        $('#slick-carousel').slick('unslick')
            if(snapshot.val()){
              var candidatesObj = snapshot.val()
              // console.log(candidatesObj)
                $('#slick-carousel').slick('unslick')
                Object.keys(candidatesObj).forEach((candidate)=>{
                      var individualCand = candidatesObj[candidate]
                      // console.log(individualCand)
                      var pic = individualCand.profile_photo
                      var name = individualCand.full_name
                      var votes = individualCand.votes.counter
                      var tots = document.getElementById('totals').value
                      // console.log(pic+name+votes+tots);
                      var percent;
                      if (votes == 0){
                        percent = 0
                      }else{
                        percent = ((votes/tots) * 100).toFixed(2) || 0
                      }

                      var slickElem = '<div class="twPc-div ">'+
                                          '<a class="twPc-bg twPc-block"></a>'+
                                          '<div>'+
                                              '<a title="candidate" href="candidates.php" class="twPc-avatarLink">'+
                                                  '<img alt="candidate pic" src="'+individualCand.profile_photo+'" class="twPc-avatarImg">'+
                                              '</a>'+
                                              '<div class="twPc-divUser">'+
                                                  '<div class="twPc-divName">'+
                                                      '<a href="candidates.php">'+individualCand.full_name+'</a>'+
                                                  '</div>'+
                                              '</div>'+

                                              '<div class="twPc-divStats">'+
                                                  '<ul class="twPc-Arrange">'+
                                                      '<li class="twPc-ArrangeSizeFit-votes">'+
                                                          '<a href="candidates.php" title="885 Following">'+
                                                              '<span class="twPc-StatLabel twPc-block">Votes</span>'+
                                                              '<span class="twPc-StatValue">🗳'+individualCand.votes.counter+'</span>'+
                                                          '</a>'+
                                                      '</li>'+
                                                      '<li class="twPc-ArrangeSizeFit-votes">'+
                                                          '<a href="candidates.php" title=" Following">'+
                                                              '<span class="twPc-StatLabel twPc-block">Likes</span>'+
                                                              '<span class="twPc-StatValue">👍'+individualCand.likes.counter+'</span>'+
                                                          '</a>'+
                                                      '</li>'+
                                                      '<li class="twPc-ArrangeSizeFit-percent">'+
                                                          '<a href="candidates.php" title=" Followers">'+
                                                              '<span class="twPc-StatLabel twPc-block">Percentage</span>'+
                                                              '<span class="twPc-StatValue">'+percent+'%</span>'+
                                                          '</a>'+
                                                      '</li>'+
                                                  '</ul>'+
                                              '</div>'+
                                          '</div>'+
                                          '</div>'
                              $('#slick-carousel').append(slickElem)

                })
                $('#slick-carousel').slick({
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    arrows: true,
                  })
              }
      })


      }

</script>
<script type="text/javascript"  src="assets/js/firebase-handler.js" ></script>
<!-- slick Carousel Plugin -->
<script src="assets/js/slick.min.js" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0" type="text/javascript"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/ovs.js"></script>

</html>
