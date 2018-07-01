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

    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/chat.css" rel="stylesheet" />


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
                    <a href="home.html" class="simple-text">
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
                    <li>
                        <a href="candidates.php">
                            <i class="pe-7s-users"></i>
                            <p>Candidates</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="chat-candidates.php">
                            <i class="pe-7s-chat"></i>
                            <p>Candidates Chatroom</p>
                        </a>
                    </li>
                    <li>
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
                    <li >
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
                                    <p>
                                        <i class="pe-7s-power"></i>Log out</p>
                                </button>
                            </li>
                            <li class="separator hidden-lg"></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div style="background: url('assets/img/main_background.jpg');background-size:cover;" class="content">
                <div class="container-fluid">
                    <div id="frame" style="height:500px;width:100%;">
                        <div id="sidepanel">
                            <div id="profile">
                              <div class="wrap">
                                  <img id="profile-img" src="https://api.adorable.io/avatars/250/abott@adorable.png" class="online" alt="" />
                                  <p>
                                      <?php echo $user_name; ?>
                                  </p>
                                  <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                                  <div id="expanded">
                                      <label for="reg">
                                          <i class="fa fa-id-card "></i>
                                      </label>
                                      <input name="reg" type="text" readonly value="<?php echo $user_reg; ?>" />

                                      <label for="email">
                                          <i class="fa fa-envelop "></i>
                                      </label>
                                      <input name="email" type="text" readonly value="<?php echo $user_email; ?>" />
                                  </div>
                              </div>
                            </div>
                            <div id="contacts">
                                <ul id="contacts_ul" >
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <div id="contact-profile" class="contact-profile">

                            </div>
                            <div id="messages" style="width:100%;margin:15px 15px;" class="messages">
                                <ul id="messages_list" style="background:white;padding:15px;overflow-y:scroll;overflow-x:wrap;margin-right:10px;height:350px;">

                                </ul>
                            </div>
                            <div id="message-input" class="message-input" style="padding:5px;margin:15px;border:solid gray 1px;margin-top:10px;">
                                <div class="wrap">
                                    <input id="message-text" type="text" style="font-size:15px;" style="border-radius:15px;" class="form-control" placeholder="Write your message..." />
                                    <button class="submit" style="margin-right:10px;margin-left:-10px;">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </button>
                                </div>
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
                                <a href="home.html">
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
                        <a href="http://ovs-core.zaidimarvels.co.ke.co.ke">ZaidiMarvels</a>
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
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/ovs.js"></script>
<!--  logout script   -->
<script src="assets/js/logout.js"></script>

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
    var chatDetails = {}

      $(".messages").animate({ scrollTop: $(document).height() }, "fast");

      $("#profile-img").click(function () {
          $("#status-options").toggleClass("active");
      });

      $(".expand-button").click(function () {
          $("#profile").toggleClass("expanded");
          $("#contacts").toggleClass("expanded");
      });

      function newMessage(key) {
          message = $(".message-input input").val();
          if ($.trim(message) == '') {
              return false;
          }

          database.ref('delegate_students/'+"<?php echo $user_id; ?>"+'/chats/'+key+'/').push({
            type:'sent',
            message:message
          }).then(()=>{
            database.ref('candidate_students/'+key+'/chats/'+"<?php echo $user_id; ?>"+'/').push({
              type:'replies',
              message:message
            }).then(()=>{
              // console.log("I am logging");
                document.getElementById('message-text').value = ''
              sendNoteSuccess('top','left','success','Sent', 500)
            }).catch((err)=>{
              sendNoteSuccess('top','right','danger','Trouble sending your message', 5000)
            })
          }).catch((err)=>{
            sendNoteSuccess('top','right','danger','Trouble sending your message', 5000)
          })
          // console.log(chatDetails["<?php echo $user_id; ?>"].toString());
          // $('#sent-message-img').attr('src',chatDetails["<?php echo $user_id; ?>"].toString())
      }

      $('.submit').click(function () {
        var key = document.getElementById('keyHolder').value.toString().toUpperCase()
          newMessage(key);
      });

      $(document).ready(()=>{
        sendNoteSuccess('top','left','info','Fetching the contacts. Be patient', 4000)
        database.ref('candidate_students/').on('value',(snapShot)=>{
            if(snapShot.val()){
              $('#contacts_ul').empty()
              $('#contacts_ul_inbox').empty()
              var candidatesObj = snapShot.val()
              Object.keys(candidatesObj).forEach((candidate_key)=>{
                if(candidate_key != 'counter'){
                  var currentCand = candidatesObj[candidate_key]
                  chatDetails[candidate_key] = currentCand
                  var contactItemOutbox = '<li class="contact" onclick="javascript:chatWith(this)">'+
                                        '<div class="wrap">'+
                                            '<img style="width:50px;height:50px;border-radius:50%;" src="'+currentCand.profile_photo+'" alt="" />'+
                                            '<div class="meta">'+
                                                '<p class="name">'+currentCand.full_name.toLowerCase().capitalize()+'</p>'+
                                            '</div>'+
                                            '<input type="hidden" value="'+candidate_key+'"  />'+
                                        '</div>'+
                                    '</li>'+
                                    '<div class="clearfix"></div>'
                    $('#contacts_ul').append($.parseHTML($.trim(contactItemOutbox)))
                }
              })
            }
        })
        database.ref('delegate_students/'+"<?php echo $user_id; ?>"+'/profile_photo/').on('value',(snap)=>{
            if(snap.val()){
              chatDetails["<?php echo $user_id; ?>"] = snap.val()
              $('#profile-img').attr('src',chatDetails["<?php echo $user_id; ?>"].toString())
              sendNoteSuccess('top','left','info','Done Fetching. Enjoy chatting away!', 1000)
            }else {
              chatDetails["<?php echo $user_id; ?>"] = "https://api.adorable.io/avatars/250/abott@adorable.png"
              sendNoteSuccess('top','left','info','Done Fetching. Enjoy chatting away!', 1000)
            }
        })
      })
      function chatWith(elem){
          $('.active').attr('class','contact')
          $(elem).attr('class','active contact')
          // #contacts > ul > li:nth-child(1) > div > div > p.name
          let userName = $(elem).find('p').text()
          let profPic = $(elem).find('img').attr('src')
          let candKey = $(elem).find('input').attr('value').toString().toUpperCase()
          // console.log(userName +'  '+profPic)
          var currentChat = '<img style="width:60px;height:60px;border-radius:50%;" id="chatting_contact_img" src="'+profPic+'" alt="" />'+
                            '<p style="margin-top:20px;font-size:25px;" id="chatting_contact">'+userName+'</p>'+
                            '<input id="keyHolder" type="hidden" value="'+candKey+'"  />'

          $('#contact-profile').empty().append(currentChat)
          getChats(candKey,profPic)

      }
      function getChats(candidate_key,profPic){
        database.ref('delegate_students/'+"<?php echo $user_id; ?>"+'/chats/'+candidate_key+'/').on('value',(snapShot)=>{
            if(snapShot.val()){
              var chatsObj = snapShot.val()
              // console.log(chatsObj);
              $('#messages_list').empty()
              Object.keys(chatsObj).forEach((chat)=>{
                var individualChat = chatsObj[chat]
                if(individualChat.type == 'sent'){
                  var chatItem = '<li class="sent">'+
                                    '<img src="'+chatDetails["<?php echo $user_id; ?>"].toString()+'" alt="" />'+
                                    '<p>'+individualChat.message+'</p>'+
                                 '</li>'
                 $('#messages_list').append(chatItem)
                 var elem = document.getElementById('messages_list');
                 elem.scrollTop = elem.scrollHeight;
               }else{
                 var chatItem = '<li class="replies">'+
                                   '<img src="'+profPic+'" alt="" />'+
                                   '<p>'+individualChat.message+'</p>'+
                                '</li>'
                $('#messages_list').append(chatItem)
                var elem = document.getElementById('messages_list');
                elem.scrollTop = elem.scrollHeight;
               }

              })
            }else{
              $('#messages_list').empty()
              sendNoteSuccess('top','left','info','Currently no chats with this candidate. Initiate?', 5000)
            }
        })
      }
      $(window).on('keydown', function (e) {
          if (e.which == 13) {
            var key = document.getElementById('keyHolder').value.toString().toUpperCase()
              newMessage(key);
              return false;
          }
      })
    let changeColor = (color) => {
        let elem = document.getElementById('colorChanger')
        elem.setAttribute('data-color', color)
    }
</script>

</html>
