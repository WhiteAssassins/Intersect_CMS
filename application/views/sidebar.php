<?php 
require FCPATH.'vendor/autoload.php';
use GuzzleHttp\Client;
?>
  <a href="#" data-activates="slide-out" class="btn btn-dark p-3 button-collapse"><i
    class="fas fa-bars"></i></a>

<div id="slide-out" class="side-nav2 side special-color-dark" style="width: 240px; transform: translateX(0px);">
  <ul class="custom-scrollbar ps">
    <li>
      <div class="logo-wrapper waves-light waves-effect waves-light">
        <a class="white-text" href="<?php echo base_url('home');?>">
        <h2 style="    padding-left: 40px;
    padding-top: 20px;"><?php $serverinfo = $this->Apiserverinfo->serverinfo();  echo $serverinfo['GameName']; ?></h2>
    </a>
      </div>
    </li>
    <li>
      <ul class="collapsible collapsible-accordion">
      <li><a href="<?php echo base_url('home');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-home"></i> {home}</a>
        </li>
        <li><a href="<?php echo base_url('admin');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-tachometer-alt"></i> {dashboard}</a>
        </li>
        <li><a href="<?php echo base_url('admin/commands');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-terminal"></i> {commands}</a>
        </li>
        <li><a href="<?php echo base_url('admin/shop');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-shopping-cart"></i> {shop}</a>
        </li>
        <li><a href="<?php echo base_url('admin/news');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-newspaper"></i> {news}</a>
        </li>
        <li><a href="<?php echo base_url('admin/objects');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-box"></i> {objects}</a>
        </li>
        <li><a href="<?php echo base_url('admin/maps');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-map"></i> {maps}</a>
        </li>
        <li><a href="<?php echo base_url('admin/events');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-calendar"></i> {events}</a>
        </li>
        <li><a href="<?php echo base_url('admin/quests');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-question"></i> {quests}</a>
        </li>
        <li><a href="<?php echo base_url('logs');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-stream"></i> {logs}</a>
        </li>
        <li><a href="<?php echo base_url('admin/adminaccounts');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-user-alt"></i> {adminaccounts}</a>
        </li>
        <li><a href="<?php echo base_url('admin/tickets');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-ticket-alt"></i> {tickets}</a>
        </li>
        <li><a href="<?php echo base_url('config');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-cog"></i> {config}</a>
        </li>
        <li><a href="https://github.com/WhiteAssassins/Intersect_CMS" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-code-branch"></i> {updates}<span class="badge badge-danger ml-2"><?php $version = '0.7.5'; try{$client = new Client();  $response = $client->request('GET', 'http://novo.aewhitedevs.com/api/cms'); $body = json_decode($response->getBody(), true); if($body['version'] > $version){ echo $body['version'].' {available}'; } }catch(\GuzzleHttp\Exception\ServerException $se){return $se->getMessage(); }catch(Exception $e){}?></span></a>
        </li>
        <li><a href="<?php echo base_url('home/logout');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-sign"></i> {disconnect}</a>
        </li>


        


      </ul>
    </li>
</div>


