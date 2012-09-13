<?php
require_once("FoursquareAPI.class.php");
class FoursquareUtil{
  var $client_id = "MSBRNCBKQ0UOGZMWSSCOKZ3THCF0EIWDEK2HWRJWI5QYMIQK";//TODO refactor to drupal config
  var $client_secret = "UKQ0LRLZPHBHWLNCDFUJ15UONKAXWZCO1KIXL4SFZIFJHDBQ";
  var $foursquare;
  
  function __construct(){
    $this->foursquare = new FoursquareAPI($this->client_id,$this->client_secret);
  }
  private function cache_id($id){
    return "burgergdl_fsq_$id";
  }
  private function save_cache($id, $data){
    cache_set($id, $data, 'cache', CACHE_TEMPORARY);
  }
  function get_photos($venue_id){
    $cache_key = $this->cache_id($venue_id);
    $cache_obj = cache_get($cache_key);
    if($cache_obj){
      return $cache_obj->data;
    }
    
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
    $this->save_cache($cache_key, $photo_arr);
    return $photo_arr;
  }
  
  function get_tips($venue_id){
    $foursquare = $this->foursquare;
    $response = $foursquare->GetPublic("venues/$venue_id/tips");
    $tips = json_decode($response)->response->tips->items;
    foreach ($tips as $tip) {
      var_dump($tip->text);
    }
  }
  
}
