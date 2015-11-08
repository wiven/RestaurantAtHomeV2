<div class="container-fluid">
    <h3 col-lg-12>Mijn Acties</h3>
    <div class="col-md-6 col-xs-12" >
        <div class="bs-callout bs-callout-success">
        <h4>Nu lopend</h4>
        
        <div class="row">
        <?php for ($x = 0; $x <= 7; $x++) { ?>
        
            <div class="col-xs-12 col-sm-6 col-lg-4 " >
              <div href="#" class="thumbnail" style="height: 150px;">
                <a data-toggle="modal" data-target=".editactionmodal" class="btn btn-default" style="color: #1d9d74; position: absolute; top: 5px; right: 20px;">
                    <i class="fa fa-pencil-square-o fa-2x"></i>
                    Aanpassen
                </a>
                  <h5 style="display:block; position: relative"><strong>OP is OP</strong></h5>
                  <p></br>
                      van: 14/10/2015 tot:15/10/2015
                  </p>
                  <p>
                      #artikelen over: <strong>5</strong>
                  </p>
              </div>
            </div>
            
        <?php }?>
        </div>
        </div>
    </div>
    
    
    <div class="col-md-6 col-xs-12">
        
        <div class="bs-callout bs-callout-warning">
        <h4>Komende acties</h4>
        
        
        <div class="row">
        <?php for ($x = 0; $x <= 7; $x++) { ?>
        
            <div class="col-xs-12 col-sm-6 col-lg-4 " >
              <div href="#" class="thumbnail" style="height: 150px;">
                <a data-toggle="modal" data-target=".editactionmodal" class="btn btn-default" style="color: #ec9416; position: absolute; top: 5px; right: 20px;">
                    <i class="fa fa-pencil-square-o fa-2x"></i>
                    Aanpassen
                </a>
                  <h5 style="display:block; position: relative"><strong>OP is OP</strong></h5>
                  <p></br>
                      van: 14/10/2015 tot:15/10/2015
                  </p>
                  <p>
                      #artikelen over: <strong>5</strong>
                  </p>
              </div>
            </div>
            
        <?php }?>
        </div>
        </div>
    </div>
    
    <div class="col-xs-12">
        <div class="bs-callout bs-callout-default">
        <h4>Voorbije acties</h4>
        </diV>
    </div>
    
    
    
    
    <div class="modal fade editactionmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">"Op is Op"<small> - aanpassen</small></h4>
      </div>
      <div class="modal-body">
        
          <div class="container-fluid">
              <!-- Add content -->
              
              
          </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Annuleer</button>
        <button type="button" class="btn btn-primary btn-lg">Opslaan</button>
      </div>
    </div>
  </div>
</div>
    
</div>