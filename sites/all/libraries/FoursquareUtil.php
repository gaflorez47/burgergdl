<?php
require_once("FoursquareAPI.class.php");
class FoursquareUtil{
  var $client_id = "MSBRNCBKQ0UOGZMWSSCOKZ3THCF0EIWDEK2HWRJWI5QYMIQK";//TODO refactor to drupal config
  var $client_secret = "UKQ0LRLZPHBHWLNCDFUJ15UONKAXWZCO1KIXL4SFZIFJHDBQ";
  var $foursquare;
  
  function __construct(){
    $this->foursquare = new FoursquareAPI($this->client_id,$this->client_secret);
  }
  private function cache_id($id, $name){
    return "burgergdl_fsq_$id/$name";
  }
  private function save_cache($id, $data){
    cache_set($id, $data, 'cache', CACHE_TEMPORARY);
    return $data;
  }
  private function get_cache($cache_key){
    $cache_obj = cache_get($cache_key);
    if($cache_obj){
      return $cache_obj->data;
    }
    return null;
  }
  function get_photos($venue_id){
    $cache_key = $this->cache_id($venue_id, 'photos');
    $cache_obj = $this->get_cache($cache_key);
    if($cache_obj){return $cache_obj;}
    
    $foursquare = $this->foursquare;
    $response = $foursquare->GetPublic("venues/$venue_id/photos");
    $photos = json_decode($response)->response->photos;
    $photo_groups = $photos->groups;
    $photo_arr = array();
    foreach ($photo_groups as $photo_group) {
      $items = $photo_group->items;
      foreach ($items as $item) {
        $url = $item->url;
       // echo "<img src='$url' width='100' height='100'/>";
        $photo_arr[] = $url;
      }
    }
    return $this->save_cache($cache_key, $photo_arr);
  }
  
  function get_tips($venue_id){
    $cache_key = $this->cache_id($venue_id, 'tips');
    $cache_obj = $this->get_cache($cache_key);
    if($cache_obj){return $cache_obj;}
    
    $foursquare = $this->foursquare;
    $response = $foursquare->GetPublic("venues/$venue_id/tips");
    $tips = json_decode($response)->response->tips->items;
    return $this->save_cache($cache_key, $tips);
  }
  
  function get_location($venue_id){
    $cache_key = $this->cache_id($venue_id, 'location');
    $cache_obj = $this->get_cache($cache_key);
    if($cache_obj){return $cache_obj;}
    
    $response = $this->foursquare->GetPublic("venues/$venue_id");
    $location = json_decode($response)->response->venue->location;
    return $this->save_cache($cache_key, $location);
    

  }
  
}
