<?php
session_start();
if(!isset($_SESSION['candidate_id'])){
    header('Location: http://ovs-core.zaidimarvels.co.ke/', true, 301);
	exit();
}else if($_SESSION['profile'] != 'incomplete'){
    header('Location: http://ovs-core.zaidimarvels.co.ke/candidates/home.php', true, 301);
	exit();
}
// echo json_encode($_SESSION);
$user_name = $_SESSION['candidate_name'];
$user_email = $_SESSION['candidate_email'];
$password = $_SESSION['firebase_pass'];
$user_id = $_SESSION['candidate_id'];
$user_reg = $_SESSION['candidate_reg'];
$user_school = $_SESSION['candidate_school'];
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
    <link href="assets/css/complete-profile.css" rel="stylesheet" />


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

                    <li class="active" >
                        <a href="notifications.php">
                            <i class="pe-7s-bell"></i>
                            <p>Complete Profile</p>
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
              <div class="row col-md-12" id="profile_details">
                <div class="col-sm-12 col-md-4" id="image_col">
                  <label style="color:gray;align-self:center;font-size:20px" for="profile_img">Your Profile Photo</label>
                  <img src="assets/img/placeholder.png" alt="profile picture" id="profile_img">
                  <input class="form-control" accept="image/jpeg" type="file" id="profile_pic" value="">
                </div>
                <div class="col-sm-12 col-md-8" id="details_col">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Complete Profile</h4>
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
                                        <label for="position_input">Vying For</label>
                                        <select class="form-control" style="float:right" name="position_input" id="position_input" value="" >
                            							<option value="" disabled selected>Select the position you are vying </option>
                            							<option value="Chairman">Chairman</option>
                                          <option value="Secretary General">Secretary General</option>
                            							<option value="Academic Secretary">Academic Secretary</option>
                                          <option value="Finance Secretary">Accounting Secretary</option>
                                          <option value="External Affairs Secretary">External Affairs Secretary</option>
                                          <option value="Entertainment Secretary">Entertainment Secretary</option>
                                          <option value="Religeous Affairs Secretary">Religeous Affairs Secretary</option>
                                          <option value="Sports Secretary">Sports Secretary</option>
                            						</select>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                        <label for="skills_input">Skills</label>
                                        <input class="form-control incomplete" style="border:1px red dotted;" onchange="javascript:removeBorder(this.id)" type="text" name="skills_inpu" id="skills_input" placeholder="e.g accounting, swimming, programming etc" value="">
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label>About Me</label>
                                              <textarea id="about_me" style="border:1px red dotted;" onchange="javascript:removeBorder(this.id)" class="form-control incomplete counted" name="message" placeholder="Type in your Bio" rows="4" style="margin-bottom:10px;"></textarea>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                              <button onclick="javascript:completeProfile()" class="btn btn-info btn-fill pull-right">Save Profile</button>
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
<script src="https://www.gstatic.com/firebasejs/4.10.0/firebase.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  logout script   -->
<script src="assets/js/logout.js"></script>
<!-- manage message counter -->
<script type="text/javascript" src="assets/js/message.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<!-- <script src="assets/js/ovs.js"></script> -->

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
var storageRef = firebaseRef.storage()

    var changeColor = (color) => {
        var elem = document.getElementById('colorChanger')
        elem.setAttribute('data-color', color)
    }
    function removeBorder(elem){
      var val = document.getElementById(elem).value
      if(val != ''){
        document.getElementById(elem).setAttribute('style','border:1px solid gray;')
      }else{
        document.getElementById(elem).setAttribute('style','border:1px dotted red;')
      }
    }
    $("#profile_pic").change(function () {
         if (this.files && this.files[0]) {
             var reader = new FileReader();
             reader.onload = function (e) {
                 $('#profile_img').attr('src', e.target.result);
             }
             reader.readAsDataURL(this.files[0]);
         }
     });
    function completeProfile() {
      var stud_name = ("<?php echo $user_name; ?>").split(' ').join('_')
      var reg_num = "<?php echo $user_reg; ?>"
      var skills = document.getElementById('skills_input').value
      var about = document.getElementById('about_me').value
      var positionElem = document.getElementById('position_input')
      var position = positionElem.options[positionElem.selectedIndex].value
      var profilePic = document.querySelector('#profile_pic').files[0];
      var fileName = stud_name+'_profile_pic.jpg'
      var metaData = {contentType: profilePic.type}
      if(skills == ''){
        sendNoteError('top','right','danger','Please add at least two skills you have',5000)
      }else if(about == ''){
        sendNoteError('top','right','danger','Please add at least a few lines about yourself',5000)
      }else if(position == ''){
        sendNoteError('top','right','danger','You must select a position for which you are vying to procees',5000)
      }else{
      var serializedData = [
        {name:'skills', value:skills},
        {name:'about', value:about},
        {name:'reg_number', value:reg_num},
        {name:'position', value:position}
      ]
      var request = $.ajax({
        type:'post',
        url:'assets/php/profileComplete.php',
        contentType: 'application/x-www-form-urlencoded',
        dataType:'json',
        data: serializedData,
      })
      request.done((response, textStatus, jqXHR) => {
          // console.log(response)
          sendNoteSuccess('top', 'left', 'info','Uploading your Awesome profile... Just a moment', 4000)
          if (response.status == 'success') {
            // console.log(fileName);
            firebase.storage().ref().child('images/'+fileName).put(profilePic,metaData).then((snapShot)=>{
              var imgUrl = snapShot.downloadURL
              // console.log(imgUrl)
              databaseRef.ref('candidate_students/'+ "<?php echo $user_id;  ?>" +'/').update({
                profile_photo: imgUrl,
                candidate_skills:skills,
                about_candidate: about,
                vying_position: position
              }).then(()=>{
                sendNoteSuccess('top', 'left', 'success','Your details have been successfully updated', 4000)
                setTimeout(()=>{
                  window.location.href = 'http://ovs-core.zaidimarvels.co.ke/candidates/home.php'
                },2000)
              }).catch((error)=>{
                sendNoteError('top', 'left', 'danger', 'database update error: '+error.message, 4000)
              })
            }).catch((err)=>{
              sendNoteError('top', 'left', 'danger', 'storage upload error: '+err, 4000)
            })
          } else {
              sendNoteError('top', 'left', 'danger', 'ajax post error: '+response.reason, 4000)
          }
      })
      request.fail((jqXHR, textStatus, errorThrown) => {
          sendNoteError('top', 'right', 'danger', `Request Failure: ${textStatus}: `+errorThrown, 6000)
      })
      // var hr = new XMLHttpRequest()
      // hr.open('POST', 'assets/php/profileComplete.php', true)
      // hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
      // hr.onreadystatechange = () => {
      //     if (hr.readyState == 4 && hr.status == 200) {
      //         var data = JSON.parse(hr.responseText)
      //         console.log(data.status)
      //         if(data.status == true){
      //             sendNoteSuccess('top','right','warning','Signup Successful. Now you can Login to Vote',3000)
      //             // setTimeout(()=>{
      //             //     window.location.href = 'index.html'
      //             // },2000)
      //         }
      //     }
      // }
      // hr.send("skills=" + skills + "&about=" + about + "&reg_number=" + reg_num )
      }
    }
</script>

</html>
