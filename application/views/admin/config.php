<?php 
    $conf = $this->db->get('config');
    $conf1 = $conf->result_array();
    foreach ($conf1 as $key){
?>

<style>
    input::-webkit-color-swatch {
    border: none;
}
</style>
<div class="container my-1">
    <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="media white z-depth-1 rounded cards-novo">
                    <div class="media-body p-1">
                        <div class="md-form "> 
                            <form method="POST" action="<?php echo base_url('config/editcolors'); ?>" class="form-admin">
                                <h4 class="text-center font-weight-bold mb-4 pb-2">{gradient}</h4>
                                    <div class="row">
                                        <input name="color1" type="color" value="<?php echo $key['color1']; ?>" style="height: 2em;width: 2em;padding: 0.5em;border-radius: 0.15em;cursor: pointer;background-color:<?php echo $key['color1']; ?>;border-color: transparent;margin-left: 30px;">
                                        <input name="color2" type="color" value="<?php echo $key['color2']; ?>" style="height: 2em;width: 2em;padding: 0.5em;border-radius: 0.15em;cursor: pointer;background-color:<?php echo $key['color2']; ?>;border-color: transparent;margin-left: 130px;">
                                    </div>
                                <button type="submit" class="btn btn-outline-info waves-effect" style="margin-left: 65px;">{change}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="media white z-depth-1 rounded cards-novo">
                    <div class="media-body p-1">
                        <div class="md-form "> 
                            <form method="POST" action="<?php echo base_url('config/analitycs'); ?>" class="form-admin">
                                <h4 class="text-center font-weight-bold mb-4 pb-2">{analytics}</h4>
                                <input type="text" id="prefixInside" class="form-control" name="google" placeholder="G-TAG" value="<?php echo $key['analytics']; ?>">
                                <button type="submit" class="btn btn-outline-info waves-effect" style="margin-left: 65px;">{change}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="media white z-depth-1 rounded cards-novo">
                    <div class="media-body p-1">
                        <div class="md-form "> 
                            <form method="POST" action="<?php echo base_url('config/download'); ?>" class="form-admin">
                                <h4 class="text-center font-weight-bold mb-4 pb-2">{configdownloadbutton}</h4>
                                <input type="text" id="prefixInside" class="form-control" name="link" placeholder="Link Descarga" value="<?php echo $key['download']; ?>">
                                <button type="submit" class="btn btn-outline-info waves-effect" style="margin-left: 65px;">{change}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="media white z-depth-1 rounded cards-novo">
                    <div class="media-body p-1">
                        <div class="md-form "> 
                                <h4 class="text-center font-weight-bold mb-4 pb-2">{maintenance}</h4>
                                <?php if($key['mant'] == 0){?>
                                <a  href="<?php echo base_url('config/mantact'); ?>" type="button" class="btn btn-outline-success waves-effect" style="margin-left: 70px;">{activate}</a>
                                <?php }else{ ?>
                                <a href="<?php echo base_url('config/mantdes'); ?>" type="button" class="btn btn-outline-danger waves-effect" style="margin-left: 65px;">{deactivate}</a>        
                                <?php } ?>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="media white z-depth-1 rounded cards-novo">
                    <div class="media-body p-1">
                        <div class="md-form "> 
                            <h4 class="text-center font-weight-bold mb-4 pb-2">{changelegal}</h4>
                            <a href="<?php echo base_url('config/legal'); ?>" type="submit" class="btn btn-outline-info waves-effect" style="margin-left: 65px;">{change}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="media white z-depth-1 rounded cards-novo">
                    <div class="media-body p-1">
                        <div class="md-form "> 
                            <h4 class="text-center font-weight-bold mb-4 pb-2">{changeterms}</h4>
                            <a href="<?php echo base_url('config/terms'); ?>" type="submit" class="btn btn-outline-info waves-effect" style="margin-left: 65px;">{change}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="media white z-depth-1 rounded cards-novo">
                    <div class="media-body p-1">
                        <div class="md-form "> 
                            <h4 class="text-center font-weight-bold mb-4 pb-2">{changeprivacity}</h4>
                            <a href="<?php echo base_url('config/privacity'); ?>" type="submit" class="btn btn-outline-info waves-effect" style="margin-left: 65px;">{change}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="media white z-depth-1 rounded cards-novo">
                    <div class="media-body p-1">
                        <div class="md-form "> 
                            <h4 class="text-center font-weight-bold mb-4 pb-2">{editmenus}</h4>
                            <a href="<?php echo base_url('config/menus'); ?>" type="submit" class="btn btn-outline-info waves-effect" style="margin-left: 65px;">{change}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="media white z-depth-1 rounded cards-novo">
                    <div class="media-body p-1">
                        <div class="md-form "> 
                            <h4 class="text-center font-weight-bold mb-4 pb-2">{editlang}</h4>
                            <form method="POST"  action="<?php echo base_url('config/changelang'); ?>"  class="form-admin">
                                <select class="mdb-select md-form" name="lang">
                                    <option value="" disabled selected>{chooselang}</option>
                                    <option value="es">ES</option>
                                    <option value="en">EN</option>
                                    <option value="tr">TR</option>
                                    <option value="jp">JP</option>
                                    <option value="de">DE</option>
                                    <option value="ru">RU</option>
                                </select>
                                <button href="<?php echo base_url('config/lang'); ?>" type="submit" class="btn btn-outline-info waves-effect" style="margin-left: 65px;">{change}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php } ?>
