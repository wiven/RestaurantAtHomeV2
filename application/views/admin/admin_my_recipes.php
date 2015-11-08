


    <div class="container-fluid">
      <div class="page-header">
        <h2>Mijn Gerechten</h2>
        
        <div class="pull-right" style="position:relative; bottom: 40px;">
        <input  checked data-toggle="toggle" type="checkbox" data-on="Grote afbeeldingen" data-off="Kleine afbeeldingen" data-size="small" data-width="150" data-offstyle="success">
        </div>
    </div>
        
    

    <ul style="margin-bottom: 20px;" role="group" class="nav nav-pills nav-justified">
            <li class="active"  role="group"><a style="border: 1px solid #e0e0e0; margin: 5px;" data-toggle="pill" role="tab" aria-controls="voorgerechten" href="#voorgerechten"><h4>VOORGERECHTEN</h4></a></li>
            <li class="" role="group"><a  style="border: 1px solid #e0e0e0; margin: 5px;" data-toggle="pill" role="tab" aria-controls="hoofdgerechten" href="#hoofdgerechten"><h4>HOOFDGERECHTEN</h4></a></li>
            <li class="" role="group"><a  style="border: 1px solid #e0e0e0; margin: 5px;" data-toggle="pill" role="tab" aria-controls="desserts" href="#desserts"><h4>DESSERTS</h4></a></li>
            <li class="" role="group"><a  style="border: 1px solid #e0e0e0; margin: 5px;" data-toggle="pill" role="tab" aria-controls="dranken" href="#dranken"><h4>DRANKEN</h4></a></li>

    </ul>
        

        
        
        
        <div id="recipes" >
        <?php for ($x = 0; $x <= 7; $x++) { ?>
        <div class="col-lg-3 col-md-4 col-sm-6" style=" height:250px; margin-top: 15px; margin-bottom: 15px;" >
            <a href="#" data-toggle="modal" data-target=".editrecipemodal" class="recipeditclick" style="text-decoration: none;">
                <div style="width: 100%; height: 100%; border: 2px solid transparent;" class="recipe">
                    <img src='http://dev.restaurantathome.be/public/img/duck.jpg' height='100%;' width='100%'/>
                    <div class="pull-right editbutton" style="margin: 7px; color: #1d9d74; position:relative; bottom: 250px; background: rgb(255, 255, 255); background: rgba(255, 255, 255, .7); border: 2px solid white; padding: 4px 10px 4px 10px; border-radius:4px;">
                        <i class="fa fa-pencil-square-o fa-2x"></i>
                        Aanpassen
                    </div>

                    <div class="title" style="    background: rgb(45, 35, 30); background: rgba(45, 35, 30, .7); bottom: 43px; display: block; padding: 10px; position: relative; width: 100%; color:#e2e8f0; font-size:16px;">
                        Gerechttitel mate
                    </div>
                </div>
            </a>
        </div>
        
        <?php } ?>
        </div>

        


<div class="modal fade editrecipemodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">"Gerechttitel vlees"<small> - aanpassen</small></h4>
      </div>
      <div class="modal-body">
        
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6 col-xs-12">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                        <div>
                          <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>
                      
                  </div>
                  <div class="col-md-6 col-xs-12">
                      <h4>Gerechttitel&nbsp;<i class="fa fa-wrench contentedit"></i></h4>
                      
                  </div> 
              </div>
          </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Annuleer</button>
        <button type="button" class="btn btn-primary btn-lg">Opslaan</button>
      </div>
    </div>
  </div>
</div>
    </div><!-- /.container-fluid -->