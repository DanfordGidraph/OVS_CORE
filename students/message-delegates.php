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
$user_reg = $_SESSION['student_reg'];
$user_school = $_SESSION['student_school'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>O.V.S Core</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script> -->
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/message.css" rel="stylesheet" />


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
                    <li class="active">
                        <a href="message-delegates.php">
                            <i class="pe-7s-mail-open-file"></i>
                            <p>Message Delegate</p>
                        </a>
                    </li>
                    <li>
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

            <div style="background: url('assets/img/main_background.jpg');background-size:cover;" class="content">
                <div class="container-fluid">
                      <div class="row" style="min-width:100%">
                          <div class="board">
                              <div class="board-inner">
                                  <ul class="nav nav-tabs" id="myTab">
                                      <div class="liner"></div>
                                      <li id="outbox_tab" class="active">
                                          <a href="#outbox" data-toggle="tab" title="Outbox">
                                              <span class="round-tabs one">
                                                  <i class="fa fa-envelope fa-lg"></i>
                                              </span>
                                          </a>
                                      </li>
                                      <li id="inbox_tab" >
                                          <a href="#inbox" data-toggle="tab" title="Inbox">
                                              <span class="round-tabs two">
                                                <i class="fa fa-inbox fa-lg"></i>
                                              </span>
                                          </a>
                                      </li>
                                  </ul>
                              </div>

                              <div class="tab-content">
                                  <div class="tab-pane fade in active" style="height: auto;width:100%;" id="outbox">
                                      <div id="frame" class="row" style="margin-left:2px;" >
                                          <div id="sidepanel" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
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
                                                  <ul id="contacts_ul">

                                                  </ul>
                                              </div>
                                          </div>
                                          <div  class="content col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                              <div id="contact-profile" class="contact-profile">

                                              </div>
                                              <div id="messages" class="messages" style="padding-left:20px;">
                                                  <div class="wrap">
                                                      <form>
                                                          <div class="form-group">
                                                              <label for="subject">Subject</label>
                                                              <input class="form-control" id="subject-input" name="subject" type="text" placeholder="Subject" value="">
                                                              <span class="focus-input"></span>
                                                              <small>Example.
                                                                <strong> Leadership Issues in The University</strong>
                                                              </small>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="message-textarea">Message</label>
                                                              <textarea id="message-textarea" class="form-control counted" name="message" placeholder="Type in your message" rows="14" style="margin-bottom:10px;" value="">
                                                              </textarea>
                                                              <span class="focus-input"></span>
                                                              <h6 class="pull-right" id="counter">1000 characters remaining</h6>
                                                          </div>
                                                          <button id="posting-button" class="btn btn-info" disabled="true" type="button" onclick="javascript:sendMessage()">
                                                              Post Message
                                                              <i class="fa fa-paper-plane fa-lg"></i>
                                                          </button>
                                                      </form>
                                                  </div>
                                              </div>

                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane fade" id="inbox">
                                      <div id="frame"  style="height:500px;width:100%;">
                                          <div class="" id="sidepanel">
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
                                                <ul id="contacts_ul_inbox">

                                                </ul>
                                              </div>
                                          </div>
                                          <div class="content">
                                              <div id="contact-profile-inbox" class="contact-profile">

                                              </div>
                                              <div id="messages" class="messages" style="padding-left:20px;">
                                                  <div class="wrap" id="inbox_message">

                                                  </div>
                                              </div>

                                          </div>
                                      </div>
                                  </div>
                                  <div class="clearfix"></div>
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
                        <a href="http://ovs-core.zaidimarvels.co.ke.co.ke">ZaidiMarvels</a>
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, Elegant Web Solutions
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
<!-- JS for this page -->
<script src="assets/js/message.js" type="text/javascript"></script>
<!--  logout script   -->
<script src="assets/js/logout.js"></script>
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
    var database = firebaseRef.database()
    String.prototype.capitalize = function(){
       return this.replace( /(^|\s)([a-z])/g , function(m,p1,p2){ return p1+p2.toUpperCase(); } );
    };
    $(function(){
      $('a[title]').tooltip();
      });
    $(document).ready(()=>{
      $("#outbox_tab").click(function(e){
         e.preventDefault();
         $("#inbox").removeClass("active");
         $("#inbox").hide()
         $("#outbox").addClass("active");
         $("#outbox").show()
     });
     $("#inbox_tab").click(function(e){
         e.preventDefault();
         $("#outbox").removeClass("active");
         $("#outbox").hide()
         $("#inbox").addClass("active");
         $("#inbox").show()
     });
    })
    $(document).ready(()=>{
      sendNoteSuccess('top','left','info','Fetching the contacts. Be patient', 4000)
      database.ref('delegate_students/').on('value',(snapShot)=>{
          if(snapShot.val()){
            $('#contacts_ul').empty()
            $('#contacts_ul_inbox').empty()
            var delegatesObj = snapShot.val()
            Object.keys(delegatesObj).forEach((delegate_key)=>{
              var currentDel = delegatesObj[delegate_key]
              var contactItemOutbox = '<li class="contact" onclick="javascript:messageWith(this)">'+
                                    '<div class="wrap">'+
                                        '<img style="max-width:50px;max-height:50px" class="img-circle img" src="'+currentDel.profile_photo+'" alt="" />'+
                                        '<div class="meta">'+
                                            '<p class="name">'+currentDel.full_name.toLowerCase().capitalize()+'</p>'+
                                        '</div>'+
                                        '<input type="hidden" value="'+delegate_key+'"  />'+
                                    '</div>'+
                                '</li>'
                $('#contacts_ul').append($.parseHTML($.trim(contactItemOutbox)))
              var contactItemInbox = '<li class="contact" onclick="javascript:readMessage(this)">'+
                                    '<div class="wrap">'+
                                        '<img style="max-width:50px;max-height:50px" class="img-circle img" src="'+currentDel.profile_photo+'" alt="" />'+
                                        '<div class="meta">'+
                                            '<p class="name">'+currentDel.full_name.toLowerCase().capitalize()+'</p>'+
                                        '</div>'+
                                        '<input type="hidden" value="'+delegate_key+'"  />'+
                                    '</div>'+
                                '</li>'
                $('#contacts_ul_inbox').append($.parseHTML($.trim(contactItemInbox)))
            })
          }
      })
    })

    function readMessage(elem){
      $('.active').attr('class', 'contact')
      $(elem).attr('class', 'active contact')
      let userName = $(elem).find('p').text()
      let profPic = $(elem).find('img').attr('src')
      var currentChat = '<img id="chatting_contact_img_inbox" src="'+profPic+'" alt="" />'+
                        '<p id="chatting_contact_inbox">'+userName+'</p>'
      $('#contact-profile-inbox').empty()
      $('#contact-profile-inbox').append(currentChat)

      var delKey = $(elem).find('input').attr('value')
      console.log(delKey);
      database.ref('regular_students/'+"<?php echo $user_id; ?>"+'/messages/').on('value',(snap)=>{
        if(snap.val()){
          $('#inbox_message').empty()
          var messagesObj = snap.val()
          Object.keys(messagesObj).forEach((message)=>{
              var individualMessage = messagesObj[message]
              if(individualMessage.sender_id){
                if(individualMessage.sender_id == delKey){
                  var messageText = individualMessage.message
                  var sendTime = individualMessage.send_date
                  var subject = individualMessage.subject
                  var messageElem = '<div class="article info" style="background:wheat;color:#000">'+
                                      '<h4 class="title" >Message from '+sendTime+'<h4>'+
                                      '<h5 style="margin-top:5px;"><stron>Subject: </strong> '+subject+'<h5>'+
                                      '<p class="info" style="text-decoration:none;">'+messageText+'</p>'+
                                      '<div class="btn btn-lg btn-success" onclick="javascript:backToInbox()" style="float:right;max-height:45px; min-width:50px;background:black;">'+
                                          '<p><i class="fa fa-paper-plane fa-lg" style="margin-right:10px" ></i>Reply</p>'+
                                      '</div>'+
                                      '<div style="height:15px; border-bottom: 2px solid black; margin-bottom:10px;margin-top:45px;"></div>'+
                                    '</div>'

                  $('#inbox_message').append(messageElem)
                }
              }
          })
        }
      })
    }
    function messageWith(elem) {
        $('.active').attr('class', 'contact')
        $(elem).attr('class', 'active contact')
        // #contacts > ul > li:nth-child(1) > div > div > p.name
        let userName = $(elem).find('p').text()
        let profPic = $(elem).find('img').attr('src')
        let delKey = $(elem).find('input').attr('value')
        // console.log(userName + '  ' + profPic)
        var currentChat = '<img id="chatting_contact_img" src="'+profPic+'" alt="" />'+
                          '<p id="chatting_contact" data="'+delKey+'">'+userName+'</p>'
        $('#contact-profile').empty()
        $('#contact-profile').append(currentChat)
        var postingElem  = document.getElementById('posting-button')
        console.log(postingElem);
        postingElem.removeAttribute('disabled')
    }
    function backToInbox(){
      window.location.href = 'message-delegates.php'
    }
    function sendMessage(){
        var send_date = new Date().toISOString().slice(0,10)
        var sender_id = "<?php echo $user_id; ?>"
        var message = $('#message-textarea').val()
        var subject = $('#subject-input').val()
        var keyElem = document.getElementById('chatting_contact')
        var delegateKey = keyElem.getAttribute('data').toString()
        if(message != '' && subject != ''){
          database.ref('delegate_students/'+delegateKey+'/messages/').push({
            sender_id:sender_id,
            message:message,
            subject:subject,
            send_date:send_date
          }).then(()=>{
            $('#message-textarea').empty()
             $('#subject-input').empty()
             sendNoteSuccess('top','left','success','Message sent successfuly', 4000)
          }).catch((err)=>{
              sendNoteError('top','right','danger','Firebase Push Error: '+err.message, 6000)
          })
        }else{
          sendNoteError('top','right','daner','You must add at least a subject and a message', 6000)
        }

    }
</script>

<!-- main script for whole site -->
<script src="assets/js/ovs.js" type="text/javascript"></script>

</html>
