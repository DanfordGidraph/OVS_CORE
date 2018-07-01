<?php
session_start();
if(!isset($_SESSION['delegate_id'])){
    header('Location: http://ovs-core.zaidimarvels.co.ke/', true, 301);
	exit();
}else if($_SESSION['profile'] != 'complete'){
    header('Location: http://ovs-core.zaidimarvels.co.ke/delegates/complete-profile.php', true, 301);
	exit();
}
// echo json_encode($_SESSION);
$user_name = $_SESSION['delegate_name'];
$user_email = $_SESSION['delegate_email'];
$password = $_SESSION['firebase_pass'];
$user_id = $_SESSION['delegate_id'];
$user_reg = $_SESSION['delegate_reg'];
$user_school = $_SESSION['delegate_school'];
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
                    <li >
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
                    <li >
                        <a href="candidates.php">
                            <i class="pe-7s-users"></i>
                            <p>Candidates</p>
                        </a>
                    </li>
                    <li>
                        <a href="chat-candidates.php">
                            <i class="pe-7s-chat"></i>
                            <p>Candidates Chatroom</p>
                        </a>
                    </li>
                    <li class="active" >
                        <a href="vote-candidates.php">
                            <i class="pe-7s-box1"></i>
                            <p>Start Voting</p>
                        </a>
                    </li>
                    <li>
                        <a href="message-students.php">
                            <i class="pe-7s-mail-open-file"></i>
                            <p>Students Messages</p>
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


            <div style="background-color:#303030" class="content">
                <div class="container-fluid">
                  <div class="row">
                      <div id="delegates_details" style="margin-right:30px;z-index:10" class="col-lg-8 col-md-8 col-sm-12 card">
                          <div id="slick-carousel">

                          </div>
                      </div>

                      <div id="voting_status" class="col-lg-3 card">
                          <div class="voted_title">
                              <h3 style="align-self:center; font-size:25px">A Vote is A Voice!</h3>
                          </div>
                          <div id="voted_wrap" class="voted">
                              <div class="voted-delegate row" id="vote_slot_3" >
                                  <div class="col-lg-4">
                                      <img id="vote_tick_1" src="assets/img/vote_no_tick.png" alt="">
                                  </div>
                                  <div class="col-lg-8">
                                      <div class="delegate-name">
                                          <h5  id="delegate_name_1"></h5>
                                      </div>
                                  </div>
                              </div>
                              <div class="separator" style="height:20px; border-bottom:#303030 solid 3px"></div>
                              <div class="voted-delegate row" id="vote_slot_3" >
                                  <div class="col-lg-4">
                                      <img id="vote_tick_2" src="assets/img/vote_no_tick.png" alt="">
                                  </div>
                                  <div class="col-lg-8">
                                      <div class="delegate-name">
                                          <h5  id="delegate_name_2"></h5>
                                      </div>
                                  </div>
                              </div>
                              <div class="separator" style="height:20px; border-bottom:#303030 solid 3px"></div>
                              <div class="voted-delegate row"  id="vote_slot_3">
                                  <div class="col-lg-4">
                                      <img id="vote_tick_3" src="assets/img/vote_no_tick.png" alt="">
                                  </div>
                                  <div class="col-lg-8">
                                      <div class="delegate-name">
                                          <h5  id="delegate_name_3"></h5>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="separator" style="height:10px; border-bottom:#303030 solid 3px"></div>

                          <div class="row" style="display:flex;flex-direction:row">
                              <button class="btn btn-primary col-sm-6 col-lg-6 col-md-6" onclick="javascript:clearSelection()" style="background:#0277BD;flex:1; border-radius:10px;width:100%;height:100%;margin:5px;color:white">
                                  Cancel
                                  <i class="fa fa-ban fa-lg"></i>
                              </button>
                              <button class="btn btn-primary col-sm-6 col-lg-6 col-md-6" onclick="javascript:submitVote()" style="background:#0277BD;flex:1; border-radius:10px;width:100%;height:100%;margin:5px;color:white">
                                  Submit
                                  <i class="fa fa-archive fa-lg"></i>
                              </button>
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
<!--  logout script   -->
<script src="assets/js/logout.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- main script for whole site -->
<script src="assets/js/ovs.js"></script>
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
      retrieveCandidates()
    })

    function retrieveCandidates(){
      sendNoteSuccess('top','left','info','Fetching the candidates. Be Patient',5000)
      $('#slick-carousel').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          easing:'swing',
      })
      databaseRef.ref('candidate_students/').once('value',(snapshot)=>{
          if(snapshot){
            var candidatesObj = snapshot.val()
            $('#slick-carousel').slick('unslick')
            Object.keys(candidatesObj).forEach((candidate_key)=>{
              var currentCand = candidatesObj[candidate_key]
              // console.log(currentCand);
              var likes = currentCand.likes.counter || 0
              var carouselElem = '<div>'+
                                    '<div style="display:flex;flex-direction:column" class="delegate-card">'+
                                        '<div style="flex:12" class="del-container">'+
                                            '<a href="#">'+
                                                '<img src="'+currentCand.profile_photo+'" alt="cover" class="cover img-circle" style="border:3px white solid" />'+
                                            '</a>'+
                                            '<div class="back-cover">'+
                                                '<div class="details">'+
                                                    '<div class="titles" style="flex:6">'+
                                                        '<div class="title1">'+currentCand.full_name+'</div>'+
                                                        '<div class="title2"> An Outstanding Comerade </div>'+
                                                    '</div>'+
                                                    '<div class="vote-count" style="flex:3">'+
                                                        '<div class="circle-tile ">'+
                                                            '<a href="#">'+
                                                                '<div class="circle-tile-heading green">'+
                                                                    '<i class="fa fa-archive fa-fw fa-3x"></i>'+
                                                                '</div>'+
                                                            '</a>'+
                                                            '<div class="circle-tile-content dark-blue">'+
                                                                '<div class="circle-tile-description text-faded"> Votes</div>'+
                                                                '<div id="vote_count" class="circle-tile-number txt-primary ">'+currentCand.votes.counter+'</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="about-delegate row">'+
                                                '<div style="padding-top:2.5%;" class="col-lg-3 col-sm-12">'+
                                                    '<div style="display:flex; flex-direction:row">'+
                                                      '<div class="btn btn-primary " style="flex:1" data="'+candidate_key+'" onclick="javascript:like(this)">'+
                                                          'Like'+
                                                          '<i class="fa fa-thumbs-up fa-lg"></i>'+
                                                      '</div>'+
                                                      '<div class="btn btn-success " style="flex:1" onclick="javascript:message()">'+
                                                          'Message'+
                                                          '<i class="fa fa-paper-plane fa-lg"></i>'+
                                                      '</div>'+
                                                    '</div>'+
                                                    '<span >'+
                                                        '👍'+likes+' Likes'+
                                                    '</span>'+
                                                '</div>'+

                                                '<div class="col-lg-9 col-sm-12 text ellipsis" >'+
                                                    '<span class="article text-concat">'+currentCand.about_candidate+'</span>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div style="padding-left:15%" class="row">'+
                                            '<div class="col-lg-4 col-sm-4 col-md-4" >'+
                                                '<div class="btn btn-primary previous" onclick="javascript:goPrev()" >'+
                                                    '<i class="fa fa-arrow-left fa-lg"></i>'+
                                                    'Previous'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-lg-4 col-sm-4 col-md-4" >'+
                                                '<div id="'+candidate_key+'" name="'+currentCand.full_name+'" class="btn btn-warning" onclick="javascript:voteCandidate(this)">'+
                                                    'Vote for Me ✔'+
                                                    '<i class="fa fa-archive fa-lg"></i>'+
                                                '</div>'+
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

    $(document).ready(function () {
        $('#slick-carousel').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            easing:'swing',
        })

    })
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
            databaseRef.ref(delegatePath).update({
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
    function message(){
      window.location.href = 'http://ovs-core.zaidimarvels.co.ke/delegates/chat-candidates.php'
    }
    var voteSlotOne = document.getElementById('vote_slot_1')
    var voteSlotTwo = document.getElementById('vote_slot_2')
    var voteSlotThree = document.getElementById('vote_slot_3')
    var filledSlots = { slotOne: false, slotTwo: false, slotThree: false }
    var votedKeys = {first:'',second:'',third:''}
    var votedCandidates = { candidateOne: '', candidateTwo: '', candidateThree: '' }

    function voteCandidate(elem){
        var candName = elem.getAttribute('name')
        var candKey = elem.getAttribute('id')
        // console.log(candName);
        if (candName != votedCandidates.candidateOne && candName != votedCandidates.candidateTwo && candName != votedCandidates.candidateThree) {
            if (filledSlots.slotOne == false) {
                $('#vote_tick_1').attr('src', 'assets/img/vote_tick.png')
                $('#delegate_name_1').text(candName)
                filledSlots.slotOne = true
                votedCandidates.candidateOne = candName
                votedKeys.first = candKey
            } else if (filledSlots.slotTwo == false) {
                $('#vote_tick_2').attr('src', 'assets/img/vote_tick.png')
                $('#delegate_name_2').text(candName)
                filledSlots.slotTwo = true
                votedCandidates.candidateTwo = candName
                votedKeys.second = candKey
            } else if (filledSlots.slotThree == false) {
                $('#vote_tick_3').attr('src', 'assets/img/vote_tick.png')
                $('#delegate_name_3').text(candName)
                filledSlots.slotThree = true
                votedCandidates.candidateThree = candName
                votedKeys.third = candKey
            } else {
                alert('You Have Already Selected 3 Delegates. If You wish to selct different contestants, please click on Cancel button')
            }
        } else {
            alert('You cannot vote for the same candidate more than once. Consider Liking instead. Its Unlimited!')
        }
    }

    var clearSelection = () => {
        $('#vote_tick_1').attr('src', 'assets/img/vote_no_tick.png')
        $('#delegate_name_1').text('')
        $('#vote_tick_2').attr('src', 'assets/img/vote_no_tick.png')
        $('#delegate_name_2').text('')
        $('#vote_tick_3').attr('src', 'assets/img/vote_no_tick.png')
        $('#delegate_name_3').text('')
        filledSlots.slotOne = false
        votedCandidates.candidateOne = ''
        filledSlots.slotTwo = false
        votedCandidates.candidateTwo = ''
        filledSlots.slotThree = false
        votedCandidates.candidateThree = ''
    }


    function goNext() {
        $("#slick-carousel").slick('slickNext');
    }
    function goPrev() {
        $("#slick-carousel").slick('slickPrev');
    }

    let changeColor = (color) => {
        let elem = document.getElementById('colorChanger')
        elem.setAttribute('data-color', color)
    }

    function submitVote(){

      if(filledSlots.slotOne == true && filledSlots.slotTwo == true && filledSlots.slotThree == true){
        sendNoteSuccess('top','left','info','We are validating and submiting your vote. Just a moment. Thank you',6000)
        var userId = "<?php echo $user_id; ?>"
        console.log(userId);
          databaseRef.ref('delegate_students/'+userId+'/voted/').once('value',(mySnap)=>{
            if(mySnap.val() == false){
              Object.keys(votedKeys).forEach((key)=>{
                var candidate = votedKeys[key]
                var votesObjValue = {
                  voter: "<?php echo $user_name; ?>",
                }
                // console.log(timeStamp)
                databaseRef.ref('candidate_students/'+candidate+'/votes/').once('value',(snapShot)=>{
                  // console.log('logging delegate votes snapShot');
                  // console.log(snapShot);
                  if(snapShot.val()){
                    var currentVotesCount = snapShot.val().counter
                    var newVotesCount = currentVotesCount+1
                    databaseRef.ref('candidate_students/'+candidate+'/votes/').update({
                        counter:newVotesCount
                    })
                    .then(()=>{
                      databaseRef.ref('candidate_students/'+candidate+'/votes/').push({
                          voter_details:votesObjValue
                      })
                    })
                    .catch((err)=>{
                      sendNoteError('top','right','danger','Firebase Vote Object update Error: '+err.message, 4000)
                    })
                  }
                })
                .catch((err)=>{
                  sendNoteError('top','right','danger',`Firebase delegate: ${candidate} Vote read Error: `+err.message, 4000)
                })
              })
              databaseRef.ref('totals_candidates/').once('value',(snap)=>{
                  if(snap.val()){
                    var currentTotalsObj = snap.val()
                    var totalCount = currentTotalsObj.counter
                    var newCount = totalCount + 3
                    console.log(newCount);
                    databaseRef.ref('totals_candidates/').update({
                      counter: newCount
                    }).then(()=>{
                          sendNoteSuccess('top','left','success','Updated Totals successfuly', 4000)
                          databaseRef.ref('delegate_students/'+userId+'/').update({
                            voted:true
                          })
                          .then(()=>{
                            sendNoteSuccess('top','left','success','Voted delegate successfuly', 4000)
                            clearSelection()
                          })
                          .catch((err)=>{
                          sendNoteError('top','right','danger','Firebase Student Vote status update Error: '+err.message, 4000)
                          })
                    }).catch((err)=>{
                      sendNoteError('top','right','danger','Firebase Totals Read Error: '+err.message, 4000)
                    })
                  }else{
                    databaseRef.ref('/').update({
                      totals_candidates:{counter:3}
                    }).then(()=>{
                        sendNoteSuccess('top','left','success','Updated Totals successfuly', 4000)
                        databaseRef.ref('delegate_students/'+userId+'/').update({
                          voted:true
                        })
                        .then(()=>{
                          sendNoteSuccess('top','left','success','Voted delegate successfuly', 4000)
                          clearSelection()
                        })
                        .catch((err)=>{
                        sendNoteError('top','right','danger','Firebase Student Vote status update Error: '+err.message, 4000)
                        })
                    }).catch((err)=>{
                        sendNoteError('top','right','danger','Firebase Totals Read Error: '+err.message, 4000)
                    })
                  }
              })

            }
            else{
                sendNoteError('top','right','danger','We are sorry, It would appear you already cast your vote. Thank you for the comeradeship but we got it from here',6000)
            }
          })
          .catch((err)=>{
            sendNoteError('top','right','danger','Firebase Student Vote status reading Error: '+err.message, 4000)
          })
      }else{
        sendNoteError('top','right','danger','It seems you have not selected at least three deleates as required. Please do',6000)
      }

    }
</script>

</html>
