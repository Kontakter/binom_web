<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>iBinom</title>
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/lib/b/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="/styles.css" media="screen">
        
        <script src="/lib/jquery-1.9.1.min.js"></script>
        <script src="/lib/b/js/bootstrap.min.js"></script>
        <script src="/lib/dropzone.js"></script>
        <script src="/lib/app.js"></script>
    </head>            
    <body>
    
       <!--Login  Modal -->
        <div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Sign in</h3>
          </div>
          <div class="modal-body">
            <form action="/" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                  <input type="text" id="inputEmail" placeholder="Email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                  <input type="password" id="inputPassword" placeholder="Password">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <label class="checkbox">
                    <input type="checkbox"> Remember me
                  </label>
                  <button type="submit" class="btn">Sign in</button> <a href="/account/new">Sign up</a>
                </div>
              </div>
            </form>
          </div>
        </div>
    
       <!-- Exceed   Modal -->
        <div id="exceedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>You exceed your storage space limit, please update your plan or delete some files. </h3>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              <button class="btn btn-primary">Ok</button>
          </div>
        </div>
    
        <!-- Delete   Modal -->
        <div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Are you sure?</h3>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
          </div>
        </div>
    
    
        <!-- Text  Modal -->
        <div id="textModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3></h3>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Ok</button>
          </div>
        </div>
    
    
        <div class="container">
            <div class="row">
                <div class="span2">
					<h1><a href="/" class="logo">iBinom</a></h1>
                </div>
                <div class="span2 pull-right contacts">
                    <p>
                    <?php if (isset($user) && $user != '') {?>
                    <i class="icon-user"></i> <a href="/account"><?php echo $user; ?> ($00)</a>
                    <?php } else { ?>
                    <a id="signIn" href="#">Sign in</a>
                    <?php } ?>
                    </p>                
                </div>
            </div>