<?php include "header.php"; ?>
    <h2>My profile</h3>
    <form class="form-horizontal" action="/update" method="post">
    <h3>Basic information</h3>
    <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
            <input type="text" <?php if (isset($user) && $user != '') {?>disabled value="useremail@mailserver.com"<?php } ?>   id="inputEmail" placeholder="Email">           
            <span class="help-inline hide">Email already registered</span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword1">New password</label>
        <div class="controls">
            <input type="password" id="inputPassword1" placeholder="Password">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword2">Re-enter new password</label>
        <div class="controls">
            <input type="password" id="inputPassword2" placeholder="Password">
        </div>
    </div>
<?php if (isset($user) && $user != '') {?>
    <div id="saveInfoChangesBlock" class="form-actions update-account hide">
        <button type="submit" id="saveInfoChanges" class="btn btn-primary">Save</button>
    </div>
<?php } ?>     

    <h3>Select a payment plan:</h3>
    <ul id="currentPlan" class="unstyled row">
        <li  class="span3"><label><strong>Pay as you go</strong> <input data-price="0" data-current="1" name="payplan" value="1" type="radio" /></label></li>
        <li  class="span3"><label><strong>$100 + $3 for free</strong> <input data-price="100" data-current="0" name="payplan" value="2" checked type="radio" /></label></li>
        <li  class="span3"><label><strong>$1000 + $55 for free</strong> <input data-price="1000" data-current="0" name="payplan" value="3" type="radio" /></label></li>
        <li  class="span3"><label><strong>$10 000 + $1000 for free</strong> <input data-price="10000" data-current="0" name="payplan" value="4" type="radio" /> </label></li>
    </ul>    

    <h3 id="currentSpaceHeader">Select storage space:</h3>
    <ul id="currentSpace" class="unstyled row">
    	<li  class="span4">
            <label><strong>250Gb for free</strong> <input data-price="0" data-current="1" name="storage" value="1" checked type="radio" /></label>
            <small>files deleted after 1 month storage</small>
        </li>
    	<li  class="span4">
            <label><strong>1TB for $18,99 per month</strong> <input data-price="18.99" data-current="0" name="storage" value="2" type="radio" /></label>
            <small>files never deleted</small>
        </li>
    	<li  class="span4">
            <label><strong>10TB for $169,99 per month</strong> <input data-price="169.99" data-current="0" name="storage" value="3" type="radio" /> </label>
            <small>files never deleted</small>
        </li>
    </ul>    

    <h3>Total</h3>
    <p id="updatePrice">$0</p>
    

    <h3><button id="toggleBilling" class="btn"><i class="icon-chevron-up <?php if (!(isset($user) && $user != '')) {?>icon-chevron-down<?php } ?>"></i></button> Billing information</h3>
    <div id="billing" <?php if (isset($user) && $user != '') {?>class="hide"<?php } ?> >
    <p><small>We will charge your credit card $2 upon submission of this form in order to validate your card.</small></p>

    <div class="row">
        <div class="span6 offset3">
            <p><input type="text" class="span6" placeholder="Card number" /></p>
            <p> 
            <select class="span1">
                <?php for ($i = 1; $i < 13; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
            <select class="span1">
                <?php for ($i = 2013; $i < 2021; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
            
            <input type="text" class="span2 pull-right" placeholder="Security code"  />
            </p>
            <p><input type="text" class="span6" placeholder="Name on card"/></p>
            <p><input type="text" class="span6" placeholder="Institution" /></p>
            <p><input type="text" class="span6" placeholder="Street address" /></p>
            <p>
            <input type="text" class="span3" placeholder="City" />
            <input type="text" class="span3 pull-right" placeholder="State/Province" />
            </p>
            <p>
            <input type="text" class="span3" placeholder="ZIP/Postal code" />
            
            <select class="span3 pull-right">
                <?php include "countrylist.php"; ?>
            </select>
            </p>
        </div>

    </div>
    </div>
    
    <div class="form-actions update-account">
<?php if (isset($user) && $user != '') {?>
        <button type="submit" id="updateAccount" class="btn btn-primary hide">Upgrade</button>
        <button type="submit" id="saveChanges" class="btn btn-primary">Save</button>
<?php } else { ?>
        <button type="submit" id="registerAccount" class="btn btn-primary">Register</button>  
<?php } ?> 
    </div>
    </form>
    <div class="alerts">
        <div id="saveSuccess" class="alert alert-success hide">Saved successfully</div>
        <div id="updateFail" class="alert alert-error hide">Oops, it seems there are problems with your billing account. Check it!</div>
    </div>
<?php if (isset($user) && $user != '') {?>
    <h3>Account history</h3>
    <table id="history" class="table table-hover">
        <tr>
            <th>Date</th>
            <th>Price</th>
            <th>Task</th>
        </tr>
        <tr>
            <td>01/05/13 10:00</td>
            <td>-$76,1</td>
            <td>19Gb mapping vs Homo sapiens</td>
        </tr>
    </table>
<?php } ?> 
<?php include "footer.php"; ?>