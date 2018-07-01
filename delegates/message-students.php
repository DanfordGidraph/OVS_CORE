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

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  CSS Main     -->
    <link href="assets/css/message.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" id="colorChanger" data-color="purple" data-image="assets/img/sidebar-5.jpg">

            <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

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
                    <li>
                        <a href="vote-candidates.php">
                            <i class="pe-7s-box1"></i>
                            <p>Start Voting</p>
                        </a>
                    </li>
                    <li class="active" >
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

                <div id="frame" class="row" style="height:500px;width:100%;">
                    <div class="col-lg-3 col-md-3 col-sm-12" id="sidepanel">
                        <div id="profile">
                            <div class="wrap">
                                <img id="profile-img" src="https://api.adorable.io/avatars/50/abott@adorable.png" class="online" alt="" />
                                <p>
                                    <?php echo $user_name; ?>
                                </p>
                            </div>
                        </div>
                        <div id="contacts">
                          <ul id="contacts_ul_inbox">

                          </ul>
                        </div>
                    </div>
                    <div class="content col-lg-8 col-md-8 col-sm-12">
                        <div id="contact-profile-inbox" class="contact-profile">

                        </div>
                        <div id="messages" class="messages" style="padding-left:5px;float:left;">
                          <div class="wrap" style="display:flex;flex-direction:column;border:1px blue dotted;">
                            <div class="wrap" style="flex:1;height:100%;width:100%;margin-left:5px" id="inbox_message">

                            </div>
                            <div class="wrap" style="flex:1;height:100%;width:100%;margin-left:5px;margin-bottom:100px;" id="reply-message">
                              <input type="text" name="subject-input" placeholder="Subject" value="" class="form-control" id="reply-subject">
                              <textarea class="form-control" placeholder="Type your message here" id="message-textarea" name="reply-message" rows="8" cols="80"></textarea>
                              <button style="float:right;max-height:50px;margin-top:5px; margin-bottom:10px;" type="button" name="replyBtn"class="btn btn-lg btn-primary" onclick="javascript:sendMessage()">
                                Send Reply
                                <i class="fa fa-lg fa-paper-plane" style="margin-left:10px;" ></i>
                              </button>
                            </div>
                          </div>

                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>

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
<!-- JS for this page -->
<script src="assets/js/message.js" type="text/javascript"></script>
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
    var messagesCarrier = new Array()
    var senders = {}
    $(document).ready(()=>{
      sendNoteSuccess('top','left','info','Fetching the messages. Be patient', 4000)
      database.ref('delegate_students/'+"<?php echo $user_id; ?>"+'/messages/').on('value',(snapShot)=>{
          if(snapShot.val()){
            var myMessages = snapShot.val()
            Object.keys(myMessages).forEach((message_key)=>{
              if(message_key != 'counter'){
                var currentMessage = myMessages[message_key]
                var sender = currentMessage.sender_id.toString()
                messagesCarrier[sender] = new Array()
                senders[sender]=''
              }
            })
            Object.keys(myMessages).forEach((message_key)=>{
              if(message_key != 'counter'){
                var currentMessage = myMessages[message_key]
                // console.log(currentMessage);
                var sender = currentMessage.sender_id.toString()
                var date_sent = currentMessage.send_date
                var message_subject = currentMessage.subject
                var message_body = currentMessage.message
                var secondKey = message_key.replace('-','')
                messagesCarrier[sender][secondKey] = {
                  date_sent: date_sent,
                  message_subject:message_subject,
                  message_body:message_body
                }
              }
            })
            populateContacts()
            // console.log(messagesCarrier);
          }
      })
    })
    function populateContacts(){
      Object.keys(senders).forEach((sender_key)=>{
        database.ref('regular_students/'+sender_key+'/full_name/').on('value',(snap)=>{
            if(snap.val()){
              var name = snap.val()
              var contactItemInbox = '<li class="contact" onclick="javascript:readMessage(this)">'+
                                        '<div class="wrap">'+
                                            '<img src="https://api.adorable.io/avatars/50/abott@adorable.png" alt="" />'+
                                            '<div class="meta">'+
                                                '<p class="name">'+name.toLowerCase().capitalize()+'</p>'+
                                            '</div>'+
                                            '<input type="hidden" value="'+sender_key+'"  />'+
                                        '</div>'+
                                    '</li>'
            $('#contacts_ul_inbox').append($.parseHTML($.trim(contactItemInbox)))
          }
        })
      })
    }

    function readMessage(elem){
      $('.active').attr('class', 'contact')
      $(elem).attr('class', 'active contact')
      let userName = $(elem).find('p').text()
      let profPic = $(elem).find('img').attr('src')
      var delKey = $(elem).find('input').attr('value')
      var currentChat = '<img id="chatting_contact_img_inbox" src="'+profPic+'" alt="" />'+
                        '<p id="chatting_contact_inbox">'+userName+'</p>'+
                        '<input value='+delKey+' id="currentChatKey" hidden />'
      $('#contact-profile-inbox').empty()
      $('#contact-profile-inbox').append(currentChat)

      var delKey = $(elem).find('input').attr('value')
      // console.log(delKey);
      $('#inbox_message').empty()
      var arr = messagesCarrier[delKey]
      Object.keys(arr).forEach((message_key)=>{
        var messageCurrent = arr[message_key]
        var messageElem = '<div class="article info" style=" border-radius:10px; background:white;color:#000;margin-top:-20px;padding:10px">'+
                            '<h4 class="title" >Message Sent On '+messageCurrent.date_sent+'<h4>'+
                            '<h5 style="margin-top:5px;"><stron>Subject: </strong> '+messageCurrent.message_subject+'<h5>'+
                            '<p class="info" style="text-decoration:none;">'+messageCurrent.message_body+'</p>'+
                            '<div style="height:15px; border-bottom: 2px solid black; margin-bottom:10px;margin-top:25px;"></div>'+
                          '</div>'

        $('#inbox_message').append(messageElem)
      })



    }
    function backToInbox(){
      window.location.href = 'message-delegates.php'
    }
    function sendMessage(){
        var send_date = new Date().toISOString().slice(0,10)
        var sender_id = "<?php echo $user_id; ?>"
        var message = $('#message-textarea').val()
        var subject = $('#reply-subject').val()
        var studentKey = document.getElementById('currentChatKey').value
        console.log(studentKey)
        if(message != '' && subject != ''){
          document.getElementById('message-textarea').value = ''
          document.getElementById('reply-subject').value = ''
          database.ref('regular_students/'+studentKey+'/messages/').push({
            sender_id:sender_id,
            subject: subject,
            message:message,
            send_date:send_date
          }).then(()=>{

             sendNoteSuccess('top','left','success','Message sent successfuly', 4000)
          }).catch((err)=>{
              sendNoteError('top','right','danger','Firebase Push Error: '+err.message, 6000)
          })
        }else{
          sendNoteError('top','right','danger','You must add a subject and a message', 6000)
        }

    }

</script>

<!-- <script src="assets/js/ovs.js" type="text/javascript"></script> -->

</html>
