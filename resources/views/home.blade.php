<!DOCTYPE html>
<html>
<head>
  <title>YB|Home</title>
  <link rel="icon" href="ind/fav.png" type="image/png" >
  <script type="text/javascript" src="js/intro.min.js"></script>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/introjs.min.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="css/animate.css">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>


  <title>Yearbook</title>
  <script>
  </script>

  <style type="text/css">
  .btn{
    font-size: 15px !important;    
    margin-top: 10px;   
    padding: 5px;   
  }

</style>
</head>
@include('navbar2')
<br>
<body>

  <div class="container" style="border: 1px solid grey;">


    @if(session('message'))
    <script type="text/javascript">
      alert('<?php echo(session('message'));?>');
    </script>
    @endif



    <div id="modal2" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="text-align: center;">
          <div class="modal-header">

            <h4 class="modal-title">Upload Picture and Caption</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="/upload_pic_moto" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              @if (count($errors) > 0)
              <script type="text/javascript">
                alert('<?php foreach($errors->all() as $error) { echo "$error"; } ?>');
              </script>
              @endif
              <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;" onchange="readURL(this);">
              <img src="<?php if (!empty(Auth::user()->pro_pic)){echo Auth::user()->pro_pic; } else { echo 'ind/shot.jpg';}?>" alt="" class="rounded-circle img-responsive" id="OpenImgUpload" style="cursor: pointer;width: 180px;height: 180px;">
              <div class="input-field col sm-12 lg-12 md-12">
                <div class="form-group">
                  <label for="comment">Caption (Max 50 characters)</label>
                  <textarea name="motto" id="icon_prefix2" class="form-control" placeholder="Enter Your Caption Here (Max 50 characters)" style="text-align: center;color: black;" maxlength="50" rows="5" id="comment"><?php if (!empty(Auth::user()->view_self)) { echo Auth::user()->view_self;}else {echo 'Enter Your Caption Here';}?></textarea>
                </div>

              </div>
              <input type="submit" name="save" value="Save" class="waves-effect waves-light btn" style="width: 150px;" id="imgsave">
            </form>
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal2" style=" padding-top: 0;padding-left: 25px;padding-right: 25px;">Upload Profile Picture and Caption
        </button>
      </div>
      <div class="col-lg-4 offset-lg-4">


        <button id="btnn1" class="waves-effect waves-light btn" style="float: right;width: 150px;padding: 0 ;margin-right: 20px;" onclick="javascript:introJs().start();">Tutorial<i class="material-icons" >help</i></button>
        <button id="btnn2" class="btn-floating" style="float: right;padding: 0;margin-right: 20px;display: none;" onclick="javascript:introJs().start();" title="Tutorial"><i class="material-icons" >help</i></button>

      </div>
    </div>

    <br>
    <div  class="row align-items-center justify-content-center" >
      <figure>
        <a data-toggle="modal" data-target="#modal2" ref="#">
          <img src="<?php if (!empty(Auth::user()->pro_pic)){echo Auth::user()->pro_pic; } else { echo 'ind/your.jpg';}?>" class="rounded-circle img-responsive" width="200px" height="200px" data-step="1" data-intro="Click on image to Upload Profile pic and Caption"> 
        </a>
        <figcaption style="text-align: center;"><h4> 
          <?php echo Auth::user()->name;  ?>
        </h4></figcaption>
        <figcaption style="text-align: center;"><h5>"
          <?php if (!empty(Auth::user()->view_self)) { echo Auth::user()->view_self;}
          else{
            echo "Upload your Caption for the Yearbook";
          }
          ?> "
        </h5></figcaption>
      </figure>
      <br>


    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="dropdown">
          <button type="button" style="width: 100%;height: 100%;" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            User
          </button>
          <div class="dropdown-menu">
            <a  class="dropdown-item" href="/details">Edit Details</a>
            <a  class="dropdown-item" href="/profile_index">My Profile</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">

        <a class="btn  btn-primary" href='search/' style="width: 100%;height: 80%;" data-intro="Search your friend and write about them">Batch Sento</a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <a class='btn btn-primary' href='/writeup' style="width: 100%;height: 80%;" data-step="4" data-intro="Share your interesting memories with us">Write Article</a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <a class='btn btn-primary' href='/upload' style="width: 100%;height: 80%;" data-step="5" data-intro="Upload some Funny photos of you and your friend">Upload Photo</a>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <a class='btn btn-primary' style="width: 100%;height: 80%;font-size: 2px;" href="http://www.sac.iitkgp.ac.in/team.php">Contact Us</a>
      </div>
    </div>
     <br/>
    <div class="row">
      <div  class="col s12 l6 card-panel grey lighten-5 z-depth-1" align="center" style="min-height: 270px;padding: 10px;height: 100%;"><h5>Yearbook</h5><div style="padding-right: 15px;padding-left: 15px;"><p style="text-align: justify;"> The yearbook is an opus of memories that you would carry along graduating from the institute. The wonderful years spent in the campus are engraved and expressed via photographs and writeups in this departing souvenir from IIT KGP. 
      With an assortment of your thoughts and snaps from various experiences through the years, the book truly collaborates your time in KGP and is a walk down your memory lane every time you look through it.</p> </div></div>
      <div class="col l6 s12 card-panel grey lighten-5 z-depth-1" align="center" style="min-height: 270px;padding: 10px;"><h5>Previous Yearbooks</h5> <br>
        <div class="col l4 s4"><img src="ind/year16.jpg" width="100%" alt=""/></div>
        <div class="col l4 s4"> <img src="ind/year2015.jpg" width="100%"  alt=""/></div>
        <div class="col l4 s4"> <img src="ind/year2014.jpg" width="100%"  alt=""/></div>
      </div>

    </div>
  </div>

  <script type="text/javascript">
            /*
              This script is used to check if the profile pic and caption is uplaoded or not
              If not then triggers the modal to upload the pic and caption
              */
              var back = "<?php if (!empty(Auth::user()->view_self)) echo 1;else echo 0; ?>" ;
              var back2 = "<?php echo Auth::user()->pro_pic; ?>" ;
              $(document).ready(function() {
                $('.modal-trigger').leanModal();

                if ( (!back)||!(back2) ) {
                  $("#modal1").openModal();
                } else {
                }

              });

            </script>


            <script type="text/javascript">


              $('#photo').click(function(){
                $('#photo').submit();
              });
              $('#writeup').click(function(){
                $('#writeup').submit();
              });
              $('#views').click(function(){
                $('#views').submit();
              });

              $('#OpenImgUpload').click(function(){ $('#fileToUpload').trigger('click'); });
              function readURL(input) {

                if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                    $('#OpenImgUpload')
                    .attr('src', e.target.result)
                  };

                  reader.readAsDataURL(input.files[0]);
                }
              }

              $(document).ready(function() {
                $('select').material_select();
              });

              function update(){
                $('.edit_button').click(function(){
                  $('.edit').show();$(".upload").hide();$(".edit_button").hide();
                });
              }

            </script>


          </body>
          </html>

<!--
<?php/*
  if($line['email']==NULL||$line['phone']==NULL){
    echo '<script>$(".upload").hide();$(".edit_button").hide();</script>';


  }else{
    echo '<script>$(".edit").hide();</script>';
  }

if (isset($_GET['motto'])&&!empty($_GET['motto'])){
   $motto=$_GET['motto'];
}
*/
?>
-->