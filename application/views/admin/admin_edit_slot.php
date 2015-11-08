
<div class="col-lg-3 col-md-3 col-sm-4">
    <div class="bs-callout bs-callout-primary">
        <h4>Selecteer Datum</h4>
        <div class="input-group">
            <input type="text" id="datepicker" class="form-control" placeholder="Datum" readonly="true" aria-describedby="addon1" style="cursor: default; background-color: #fff;">
            <span class="input-group-addon" id="addon1"><i class="fa fa-calendar"></i></span>
        </div>
    </div>
    
    
    <div class="bs-callout bs-callout-default">
        <div class="">
            <button class="btn btn-default" data-toggle="modal" data-target="#WeekShed" style="white-space: normal;">Standaard weekschema aanpassen</button>
        </div>
    </div>
    
    <div class="bs-callout bs-callout-danger" style="text-align: center;">
        <h4>Info</h4>
        <p style="text-align: left;">
            Merk op dat er rechts ofwel enkel de geselecteerde datum zal staan, ofwel bij een druk op de knop het standaard weekschema.<br />
            Het weekschema wordt per dag aangepast bij een druk op de knop met corresponderende dag.
            
        </p>
    </div>
</div>

<div class="col-lg-9 col-md-9 col-sm-8">
  
    
    <div class="panel panel-info" style="margin-top:20px;">
        <div class="panel-heading">27 April 2015</div>
        <div class="panel-body">
          
            <div class="row">
                <?php for($i=1;$i<7;$i++){?>
                <div class="col-xs-12 col-md-4 col-sm-12 col-lg-3" style="padding-left:5px; padding-right:5px; ">
                    <div class="thumbnail" style="height:206px;">
                        <h4>Shift &sharp;<?php echo $i?></h3>
                        <div style="width:100%; display:block;"> 
                            <div class="input-group bootstrap-timepicker" >
                                <span class="input-group-addon" id="addon2">Begin: </span>
                                <input id="timepicker1" type="text" class="form-control timepicker" aria-describedby="addon2" style="width:62px;">
                            </div>
                        </div>

                        <div style="width:100%; display:block; position: relative;">
                            <div style="position: absolute; right: 0;">
                                <div class="input-group bootstrap-timepicker" >
                                    <span class="input-group-addon" id="addon2">Einde: </span>
                                    <input id="timepicker" type="text" class="form-control timepicker" aria-describedby="addon2" style="width:62px;">
                                </div>
                            </div>
                        </div>


                        <div style="width:100%; display:block; margin-top: 60px; background-color:#5cb85c; border-radius:4px; padding:4px;">
                            <span for="sph" style="padding:8px; color:white;">Aantal slots per uur (sph):</span>
                            <div style="width: 170px; margin:0 auto;">
                                <input id="sph" type="text" value="" name="slotph" >
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                <div class="col-xs-12 col-md-4 col-sm-12 col-lg-3" style="height:200px; position: relative; display: block;"><button style="position:absolute; bottom:0;" class="btn btn-primary">+ Shift toevoegen</button></div>
            </div>
        </div>
    </div>

    
    
    <div class="panel panel-warning" style="margin-top:20px;">
        <div class="panel-heading">
            <h4>Standaard weekschema</h4>
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default">Maandag</button>
                <button type="button" class="btn btn-primary">Dinsdag</button>
                <button type="button" class="btn btn-default">Woensdag</button>
                <button type="button" class="btn btn-default">Donderdag</button>
                <button type="button" class="btn btn-default">Vrijdag</button>
                <button type="button" class="btn btn-warning">Zaterdag</button>
                <button type="button" class="btn btn-warning">Zondag</button>
              </div>
        </div>
        <div class="panel-body">
          
            <div class="row">
                <?php for($i=1;$i<7;$i++){?>
                <div class="col-xs-12 col-md-4 col-sm-12 col-lg-3" style="padding-left:5px; padding-right:5px;">
                    <div class="thumbnail">
                        <h4>Shift &sharp;<?php echo $i?></h3>
                        <div style="width:100%; display:block;"> 
                            <div class="input-group bootstrap-timepicker" >
                                <span class="input-group-addon" id="addon2">Begin: </span>
                                <input id="timepicker1" type="text" class="form-control timepicker" aria-describedby="addon2" style="width:62px;">
                            </div>
                        </div>

                        <div style="width:100%; display:block; position: relative;">
                            <div style="position: absolute; right: 0;">
                                <div class="input-group bootstrap-timepicker" >
                                    <span class="input-group-addon" id="addon2">Einde: </span>
                                    <input id="timepicker" type="text" class="form-control timepicker" aria-describedby="addon2" style="width:62px;">
                                </div>
                            </div>
                        </div>


                        <div style="width:100%; display:block; margin-top: 60px; background-color:#5cb85c; border-radius:4px; padding:4px;">
                            <span for="sph" style="padding:8px; color:white;">Aantal slots per uur (sph):</span>
                            <div style="width: 170px; margin:0 auto;">
                                <input id="sph" type="text" value="" name="slotph" >
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                <div class="col-xs-12 col-md-4 col-sm-12 col-lg-3" style="height:200px; position: relative; display: block;"><button style="position:absolute; bottom:0;" class="btn btn-primary">+ Shift toevoegen</button></div>
            </div>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="WeekShed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>