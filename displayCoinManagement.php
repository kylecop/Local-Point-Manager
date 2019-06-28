<?php 

function displayCoinManagement(){
?>
<div class="container">
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Coin Management</button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Coin Management</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

<form action="/index.php" method="get">
  <div class="form-group row">
    <div class="col-4"></div> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="user" id="user_0" type="radio" class="custom-control-input" value="Madilynn" required="required"> 
        <label for="user_0" class="custom-control-label">Madilynn</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="user" id="user_1" type="radio" class="custom-control-input" value="Miguel" required="required"> 
        <label for="user_1" class="custom-control-label">Miguel</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="user" id="user_2" type="radio" class="custom-control-input" value="Makayla" required="required"> 
        <label for="user_2" class="custom-control-label">Makayla</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-4"></div> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="action" id="action_0" type="radio" required="required" class="custom-control-input" value="add"> 
        <label for="action_0" class="custom-control-label">Add</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="action" id="action_1" type="radio" required="required" class="custom-control-input" value="remove"> 
        <label for="action_1" class="custom-control-label">Remove</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="action" id="action_2" type="radio" required="required" class="custom-control-input" value="transfer"> 
        <label for="action_2" class="custom-control-label">Transfer</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4"></label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="amount_0" type="radio" class="custom-control-input" value="20" required="required"> 
        <label for="amount_0" class="custom-control-label">20</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="amount_1" type="radio" class="custom-control-input" value="40" required="required"> 
        <label for="amount_1" class="custom-control-label">40</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="amount_2" type="radio" class="custom-control-input" value="60" required="required"> 
        <label for="amount_2" class="custom-control-label">60</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="amount_3" type="radio" required="required" class="custom-control-input" value="other"> 
        <label for="amount_3" class="custom-control-label">Other</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 col-form-label" for="other_amount">Other Amount</label> 
    <div class="col-8">
      <input id="other_amount" name="other_amount" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

<?php

}


?>
